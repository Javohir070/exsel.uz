<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStajirovkaExpertRequest;
use App\Http\Requests\UpdateStajirovkaExpertRequest;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\User;
use App\Notifications\StajirovkaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class StajirovkaexpertController extends Controller
{
    public function store(StoreStajirovkaExpertRequest $request)
    {
        $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();
        $stajirovka = Stajirovka::findOrFail($request->stajirovka_id);

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['tashkilot_id'] = $stajirovka->tashkilot_id;
        $data['fish'] = $user->name;
        $data['quarter'] = 3;
        $data['year'] = date('Y');
        
        $stajirovkaexpert = Stajirovkaexpert::create($data);

        Notification::send($user, new StajirovkaNotification($stajirovkaexpert));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function edit(Stajirovkaexpert $stajirovkaexpert)
    {
        $stajirovka = Stajirovka::findOrFail($stajirovkaexpert->stajirovka_id);
        return view("admin.stajirovka.expertedit", ['stajirovkaexpert' => $stajirovkaexpert, 'stajirovka' => $stajirovka]);
    }


    public function update(UpdateStajirovkaExpertRequest $request, Stajirovkaexpert $stajirovkaexpert)
    {
        if ($request->holati == 0) {
            $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();
            $stajirovkaexpert->update([
                'holati' => 'rad etildi',
            ]);
            $admins =User::findOrFail($stajirovkaexpert->user_id);
            Notification::send($admins, new StajirovkaNotification($stajirovkaexpert));
            return redirect()->route('stajirovka.show', $stajirovkaexpert->stajirovka_id)->with("status", 'Ma\'lumotlar rad etildi.');
        } else {
            $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();

            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $data['fish'] = $user->name;
            $data['holati'] = 'yuborildi';

            $stajirovkaexpert->update($data);

            Notification::send($user, new StajirovkaNotification($stajirovkaexpert));
            return redirect()->route('stajirovka.show', $stajirovkaexpert->stajirovka_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }

    }

    public function destroy(Stajirovkaexpert $stajirovkaexpert)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($stajirovkaexpert->file) {
            Storage::delete($stajirovkaexpert->file);
        }

        // stajirovkaexpertni o'chirish
        $stajirovkaexpert->delete();

        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }
}
