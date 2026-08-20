<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Laboratory;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;
use App\Exports\LaboratoryExport;
use App\Exports\LaboratoryAsbobuskunaExport;
use Maatwebsite\Excel\Facades\Excel;

class LaboratoryController extends Controller
{
    private function authUser(): User
    {
        return auth()->user();
    }

    private function isLaboratoryScoped(): bool
    {
        return (bool) $this->authUser()->laboratory_id;
    }

    private function scopeByLaboratoryOrTashkilot($query, string $laboratoryColumn = 'laboratory_id')
    {
        $user = $this->authUser();

        if ($user->laboratory_id) {
            return $query->where($laboratoryColumn, $user->laboratory_id);
        }

        return $query->where('tashkilot_id', $user->tashkilot_id);
    }

    public function index()
    {
        $laboratorys = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->with('user')->get();
        $laboratoryList = $laboratorys;

        $masullar = User::where('tashkilot_id', auth()->user()->tashkilot_id)
            ->role('labaratoriyaga_masul')
            ->with('masulLaboratories')
            ->get();

        return view('admin.labaratoriya.index', [
            'laboratorys' => $laboratorys,
            'laboratoryList' => $laboratoryList,
            'masullar' => $masullar,
        ]);
    }

    public function laboratoriyalari(Request $request)
    {

        $query = Laboratory::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('yil') && $request->yil !== 'all') {
            $query->where('tash_yil', $request->yil);
        }

        $laboratoriyalari = $query->paginate(20);

        return view('admin.labaratoriya.all', ['laboratoriyalari' => $laboratoriyalari]);
    }

    public function laboratoriya()
    {
        $user = $this->authUser();

        if ($user->laboratory_id) {
            $laboratorys = Laboratory::where('id', $user->laboratory_id)->get();
        } else {
            $laboratorys = Laboratory::where('tashkilot_id', $user->tashkilot_id)->get();
        }

        $lab_xodimlar = $this->scopeByLaboratoryOrTashkilot(Xodimlar::query())->count();
        $lab_xujalik = $this->scopeByLaboratoryOrTashkilot(Xujalik::query())->count();
        $lab_ilmiyLoyiha = $this->scopeByLaboratoryOrTashkilot(IlmiyLoyiha::query())->count();

        return view('admin.labaratoriya.labaratoriya', [
            'laboratorys' => $laboratorys,
            'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
            'lab_xujalik' => $lab_xujalik,
            'lab_xodimlar' => $lab_xodimlar,
            'laboratory' => $user->laboratory_id,
            'isTashkilotScope' => ! $this->isLaboratoryScoped(),
        ]);
    }


    public function lab_biriktirilgan_xodimlar()
    {
        $lab_xodimlar = $this->scopeByLaboratoryOrTashkilot(Xodimlar::query())->paginate(20);
        $tashkilot_xodimlar = Xodimlar::where('tashkilot_id', $this->authUser()->tashkilot_id)->get();

        return view('admin.labaratoriya.labxodimlar', [
            'lab_xodimlar' => $lab_xodimlar,
            'tashkilot_xodimlar' => $tashkilot_xodimlar,
            'isTashkilotScope' => ! $this->isLaboratoryScoped(),
        ]);
    }

    public function lab_biriktirilgan_ilmiyloyha()
    {
        $ilmiyloyiha = $this->scopeByLaboratoryOrTashkilot(IlmiyLoyiha::query())->paginate(20);
        $tashkilot_ilmiyloyiha = IlmiyLoyiha::where('tashkilot_id', $this->authUser()->tashkilot_id)->get();

        return view('admin.labaratoriya.labilmiyloyhi', [
            'ilmiyloyiha' => $ilmiyloyiha,
            'tashkilot_ilmiyloyiha' => $tashkilot_ilmiyloyiha,
            'isTashkilotScope' => ! $this->isLaboratoryScoped(),
        ]);
    }

    public function lab_biriktirilgan_xujalik()
    {
        $xujalik = $this->scopeByLaboratoryOrTashkilot(Xujalik::query())->paginate(20);
        $tashkilot_xujalik = Xujalik::where('tashkilot_id', $this->authUser()->tashkilot_id)->get();

        return view('admin.labaratoriya.labxujalik', [
            'xujalik' => $xujalik,
            'tashkilot_xujalik' => $tashkilot_xujalik,
            'isTashkilotScope' => ! $this->isLaboratoryScoped(),
        ]);
    }


    public function giveXodimToLab(Request $request)
    {
        // Formdan kelgan xodimlar ID larini olish
        $xodimlarId = $request->input('xodimlarId', []);

        $laboratoryId = $this->authUser()->laboratory_id;

        if (! $laboratoryId) {
            return redirect()->back()->with('status', 'Laboratoriya biriktirilmagan. Biriktirish uchun avval laboratoriyani tanlang.');
        }

        // Tanlangan IDlarga tegishli xodimlarni yangilash
        if (!empty($xodimlarId)) {
            Xodimlar::whereIn('id', $xodimlarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xodimlar muvaffaqiyatli yangilandi!');

    }

    public function giveXujalikToLab(Request $request)
    {
        // Formdan kelgan xodimlar ID larini olish
        $xujaliklarId = $request->input('xujaliklarId', []);

        $laboratoryId = $this->authUser()->laboratory_id;

        if (! $laboratoryId) {
            return redirect()->back()->with('status', 'Laboratoriya biriktirilmagan. Biriktirish uchun avval laboratoriyani tanlang.');
        }

        // Tanlangan IDlarga tegishli xujaliklarni yangilash
        if (!empty($xujaliklarId)) {
            Xujalik::whereIn('id', $xujaliklarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xujaliklar muvaffaqiyatli yangilandi!');
    }


    public function giveIlmiyLoyhaToLab(Request $request)
    {
        // Formdan kelgan xodimlar ID larini olish
        $ilmiyloyhalarId = $request->input('ilmiyloyhalarId', []);

        $laboratoryId = $this->authUser()->laboratory_id;

        if (! $laboratoryId) {
            return redirect()->back()->with('status', 'Laboratoriya biriktirilmagan. Biriktirish uchun avval laboratoriyani tanlang.');
        }

        // Tanlangan IDlarga tegishli ilmiyloyhalarni yangilash
        if (!empty($ilmiyloyhalarId)) {
            IlmiyLoyiha::whereIn('id', $ilmiyloyhalarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'ilmiyloyhalar muvaffaqiyatli yangilandi!');

    }


    public function store(StoreLaboratoryRequest $request)
    {
        $data = $request->validated();
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        Laboratory::create($data);

        return redirect('/laboratory')->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function show(Laboratory $laboratory)
    {
        $lab_xodimlar = Xodimlar::where('laboratory_id', $laboratory->id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', $laboratory->id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', $laboratory->id)->count();


        return view('admin.labaratoriya.show', [
            "laboratory" => $laboratory,
            'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
            'lab_xujalik' => $lab_xujalik,
            'lab_xodimlar' => $lab_xodimlar,
        ]);
    }


    public function edit(Laboratory $laboratory)
    {
        return view("admin.labaratoriya.edit", ["laboratory" => $laboratory]);
    }


    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        $laboratory->update($request->toArray());

        return redirect('/laboratory')->with("status", 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function destroy(Laboratory $laboratory)
    {

        $laboratory->xodimlar()->update(['laboratory_id' => null]);
        $laboratory->ilmiyLoyihalar()->update(['laboratory_id' => null]);
        $laboratory->xujaliklar()->update(['laboratory_id' => null]);

        $laboratory->delete();

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }

    public function export_lab()
    {
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', '300');
        $fileName = 'Laboratory_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new LaboratoryExport, $fileName);
    }

    public function exportAsbobuskunalar()
    {
        $user = $this->authUser();
        $fileName = 'laboratoriya_asbobuskunalari_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(
            new LaboratoryAsbobuskunaExport($user->laboratory_id),
            $fileName
        );
    }


}
