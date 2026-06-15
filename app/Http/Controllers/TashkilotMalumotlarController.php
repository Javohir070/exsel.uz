<?php

namespace App\Http\Controllers;

use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\Asbobuskunafile;
use App\Models\Asbobuskunaexpert;
use App\Models\Dalolatnoma;
use App\Models\Doktaranturaexpert;
use App\Models\Fakultetlar;
use App\Models\Ilmiymaqolalar;
use App\Models\Ilmiyrahbarlar;
use App\Models\Ilmiytezislar;
use App\Models\Intellektual;
use App\Models\Intellektualmulk;
use App\Models\IqtisodiyMoliyaviy;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Loyihaijrochilar;
use App\Models\Monografiyalar;
use App\Models\Startup;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use App\Models\TashkilotRahbari;
use App\Models\Tekshirivchilar;
use App\Models\Tijorat;

class TashkilotMalumotlarController extends Controller
{

    public function index()
    {
        $tashkilotlar = Tashkilot::withCount('xodimlar')->orderBy('xodimlar_count', 'desc')->paginate(25);

        return view("admin.tashkilotmalumotlar.xodimlarsoni", ['tashkilotlar' => $tashkilotlar]);
    }

    public function adminlar()
    {
        $adminlar = Tashkilot::withCount('user')->orderByDesc('user_count')->paginate(25);

        return view("admin.tashkilotmalumotlar.adminlarsoni", ['adminlar' => $adminlar]);
    }

    public function show($tashkilotmalumotlar)
    {
        $tashkilot = Tashkilot::with('region')
            ->withCount([
                'user',
                'xodimlar',
                'tashkilotrahbaris',
                'ilmiyloyhalar',
                'xujaliklar',
                'ilmiydarajalar',
                'iqtisodiylar',
                'stajirovkalar',
                'asbobuskunalar',
                'laboratorys',
                'fakultetlar',
                'kafedralar',
                'doktaranturalar',
                'asbobuskunaexpert',
                'stajirovkaexperts',
                'tekshirivchilar',
                'doktaranturaexperts',
                'akademlar',
                'akademexperts',
            ])
            ->findOrFail($tashkilotmalumotlar);

        $extraCounts = [
            'dalolatnoma' => Dalolatnoma::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'monografiyalar' => Monografiyalar::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'intellektualmulk' => Intellektualmulk::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'ilmiymaqolalar' => Ilmiymaqolalar::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'ilmiytezislar' => Ilmiytezislar::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'intellektual' => Intellektual::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'tijorat' => Tijorat::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'startup' => Startup::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'ilmiyrahbarlar' => Ilmiyrahbarlar::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'loyihaijrochilar' => Loyihaijrochilar::where('tashkilot_id', $tashkilotmalumotlar)->count(),
            'asbobuskunafile' => Asbobuskunafile::where('tashkilot_id', $tashkilotmalumotlar)->count(),
        ];

        $cards = [
            ['label' => 'Ilmiy loyihalar', 'count' => $tashkilot->ilmiyloyhalar_count, 'section' => 'ilmiyloyiha', 'icon' => 'list', 'bg' => '#E4F0FB', 'color' => '#1C3FAA'],
            ['label' => "Xo'jalik shartnomalari", 'count' => $tashkilot->xujaliklar_count, 'section' => 'xujalik', 'icon' => 'layers', 'bg' => '#FFF9EF', 'color' => '#E0B973'],
            ['label' => 'Ilmiy stajirovka', 'count' => $tashkilot->stajirovkalar_count, 'section' => 'stajirovka', 'icon' => 'git-pull-request', 'bg' => '#EBFBEB', 'color' => '#00A705'],
            ['label' => 'Asbob-uskunalar', 'count' => $tashkilot->asbobuskunalar_count, 'section' => 'asbobuskuna', 'icon' => 'printer', 'bg' => '#FFF0F0', 'color' => '#E64242'],
            ['label' => 'Laboratoriyalar', 'count' => $tashkilot->laboratorys_count, 'section' => 'laboratory', 'icon' => 'thermometer', 'bg' => '#F0F4FF', 'color' => '#5B6EE1'],
            ['label' => 'Kafedralar', 'count' => $tashkilot->kafedralar_count, 'section' => 'kafedralar', 'icon' => 'file-text', 'bg' => '#F0FFF4', 'color' => '#42e681'],
            ['label' => 'Fakultetlar', 'count' => $tashkilot->fakultetlar_count, 'section' => 'fakultetlar', 'icon' => 'book-open', 'bg' => '#F5F0FF', 'color' => '#7C5CE1'],
            ['label' => 'Adminlar', 'count' => $tashkilot->user_count, 'section' => 'adminlar', 'icon' => 'users', 'bg' => '#deeedb', 'color' => '#42e681'],
            ['label' => 'Xodimlar', 'count' => $tashkilot->xodimlar_count, 'section' => 'xodimlar', 'icon' => 'users', 'bg' => '#c8ecec', 'color' => '#29ca67'],
            ['label' => 'Ilmiy izlanuvchilar', 'count' => $tashkilot->doktaranturalar_count, 'section' => 'doktarantura', 'icon' => 'user-check', 'bg' => '#E8ECFF', 'color' => '#718CE6'],
            ['label' => 'Tashkilot rahbari', 'count' => $tashkilot->tashkilotrahbaris_count, 'section' => 'tashkilotrahbari', 'icon' => 'award', 'bg' => '#FFF5E6', 'color' => '#E0A050'],
            ['label' => 'Iqtisodiy-moliyaviy', 'count' => $tashkilot->iqtisodiylar_count, 'section' => 'iqtisodiy', 'icon' => 'dollar-sign', 'bg' => '#E6F7FF', 'color' => '#1890FF'],
            ['label' => 'Ilmiy darajalar', 'count' => $tashkilot->ilmiydarajalar_count, 'section' => 'ilmiydaraja', 'icon' => 'bar-chart-2', 'bg' => '#F0FAFF', 'color' => '#36A2EB'],
            ['label' => 'Akadem loyihalar', 'count' => $tashkilot->akademlar_count, 'section' => 'akadem', 'icon' => 'briefcase', 'bg' => '#FFF0F5', 'color' => '#E06090'],
            ['label' => 'Dalolatnomalar', 'count' => $extraCounts['dalolatnoma'], 'section' => 'dalolatnoma', 'icon' => 'file', 'bg' => '#F5F5F5', 'color' => '#666666'],
            ['label' => 'Monografiyalar', 'count' => $extraCounts['monografiyalar'], 'section' => 'monografiyalar', 'icon' => 'book', 'bg' => '#FFF8E6', 'color' => '#C9A020'],
            ['label' => 'Intellektual mulk', 'count' => $extraCounts['intellektualmulk'], 'section' => 'intellektualmulk', 'icon' => 'shield', 'bg' => '#E8F5E9', 'color' => '#43A047'],
            ['label' => 'Ilmiy maqolalar', 'count' => $extraCounts['ilmiymaqolalar'], 'section' => 'ilmiymaqolalar', 'icon' => 'edit-3', 'bg' => '#E3F2FD', 'color' => '#1976D2'],
            ['label' => 'Ilmiy tezislar', 'count' => $extraCounts['ilmiytezislar'], 'section' => 'ilmiytezislar', 'icon' => 'file-minus', 'bg' => '#FCE4EC', 'color' => '#C2185B'],
            ['label' => 'Ilmiy rahbarlar', 'count' => $extraCounts['ilmiyrahbarlar'], 'section' => 'ilmiyrahbarlar', 'icon' => 'user-plus', 'bg' => '#EDE7F6', 'color' => '#5E35B1'],
            ['label' => 'Loyiha ijrochilari', 'count' => $extraCounts['loyihaijrochilar'], 'section' => 'loyihaijrochilar', 'icon' => 'users', 'bg' => '#E0F2F1', 'color' => '#00897B'],
            ['label' => 'Tijorat loyihalar', 'count' => $extraCounts['tijorat'], 'section' => 'tijorat', 'icon' => 'trending-up', 'bg' => '#FFF3E0', 'color' => '#EF6C00'],
            ['label' => 'Startup loyihalar', 'count' => $extraCounts['startup'], 'section' => 'startup', 'icon' => 'zap', 'bg' => '#F3E5F5', 'color' => '#8E24AA'],
            ['label' => 'Intellektual', 'count' => $extraCounts['intellektual'], 'section' => 'intellektual', 'icon' => 'cpu', 'bg' => '#ECEFF1', 'color' => '#455A64'],
            ['label' => 'Tekshirivchilar', 'count' => $tashkilot->tekshirivchilar_count, 'section' => 'tekshirivchilar', 'icon' => 'check-square', 'bg' => '#E8F5E9', 'color' => '#2E7D32'],
            ['label' => 'Asbob-uskuna ekspertiza', 'count' => $tashkilot->asbobuskunaexpert_count, 'section' => 'asbobuskunaexpert', 'icon' => 'tool', 'bg' => '#FFEBEE', 'color' => '#C62828'],
            ['label' => 'Stajirovka ekspertiza', 'count' => $tashkilot->stajirovkaexperts_count, 'section' => 'stajirovkaexpert', 'icon' => 'clipboard', 'bg' => '#E0F7FA', 'color' => '#00838F'],
            ['label' => 'Doktarantura ekspertiza', 'count' => $tashkilot->doktaranturaexperts_count, 'section' => 'doktaranturaexpert', 'icon' => 'check-circle', 'bg' => '#F1F8E9', 'color' => '#558B2F'],
            ['label' => 'Akadem ekspertiza', 'count' => $tashkilot->akademexperts_count, 'section' => 'akademexpert', 'icon' => 'star', 'bg' => '#FFFDE7', 'color' => '#F9A825'],
            ['label' => 'Asbob-uskuna fayllari', 'count' => $extraCounts['asbobuskunafile'], 'section' => 'asbobuskunafile', 'icon' => 'paperclip', 'bg' => '#FAFAFA', 'color' => '#757575'],
        ];

        return view('admin.tashkilotmalumotlar.tashkilot', [
            'tashkilot' => $tashkilot,
            'id' => $tashkilotmalumotlar,
            'cards' => $cards,
        ]);
    }

    public function bolim($tashkilotmalumotlar, string $section)
    {
        $tashkilot = Tashkilot::findOrFail($tashkilotmalumotlar);
        $sections = $this->sections();
        $id = (int) $tashkilotmalumotlar;

        if (! isset($sections[$section])) {
            abort(404);
        }

        $config = $sections[$section];

        if (isset($config['redirect'])) {
            return redirect()->route($config['redirect'], $config['redirect_params']($id));
        }

        $items = $config['model']::where('tashkilot_id', $id)
            ->when(isset($config['with']), fn ($q) => $q->with($config['with']))
            ->latest()
            ->paginate(20);

        return view('admin.tashkilotmalumotlar.bolim', [
            'tashkilot' => $tashkilot,
            'items' => $items,
            'config' => $config,
            'section' => $section,
        ]);
    }

    private function sections(): array
    {
        return [
            'ilmiyloyiha' => [
                'title' => 'Ilmiy loyihalar',
                'redirect' => 'ilmiy_loyihalar_tashkilot.index',
                'redirect_params' => fn (int $id) => ['id' => $id],
            ],
            'xujalik' => [
                'title' => "Xo'jalik shartnomalari",
                'redirect' => 'tashkilot.xujalik.index',
                'redirect_params' => fn (int $id) => ['tashkilot' => $id],
            ],
            'stajirovka' => [
                'title' => 'Ilmiy stajirovka',
                'redirect' => 'stajirov.index',
                'redirect_params' => fn (int $id) => ['id' => $id],
            ],
            'asbobuskuna' => [
                'title' => 'Asbob-uskunalar',
                'redirect' => 'asbobu.index',
                'redirect_params' => fn (int $id) => ['id' => $id],
            ],
            'laboratory' => [
                'title' => 'Laboratoriyalar',
                'model' => Laboratory::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'tash_yil', 'label' => 'Tashkil etilgan yil'],
                    ['key' => 'tavsif', 'label' => 'Tavsif'],
                ],
                'show_route' => 'laboratory.show',
                'show_param' => 'laboratory',
            ],
            'kafedralar' => [
                'title' => 'Kafedralar',
                'model' => Kafedralar::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'tash_yil', 'label' => 'Tashkil etilgan yil'],
                ],
            ],
            'fakultetlar' => [
                'title' => 'Fakultetlar',
                'model' => Fakultetlar::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'tash_yil', 'label' => 'Tashkil etilgan yil'],
                ],
            ],
            'adminlar' => [
                'title' => 'Adminlar',
                'redirect' => 'tashkilot.userlar.index',
                'redirect_params' => fn (int $id) => ['tashkilot' => $id],
            ],
            'xodimlar' => [
                'title' => 'Xodimlar',
                'redirect' => 'tashkilot.xodimlar.index',
                'redirect_params' => fn (int $id) => ['tashkilot' => $id],
            ],
            'doktarantura' => [
                'title' => 'Ilmiy izlanuvchilar',
                'redirect' => 'doktarantura.show',
                'redirect_params' => fn (int $id) => ['doktarantura' => $id],
            ],
            'tashkilotrahbari' => [
                'title' => 'Tashkilot rahbari',
                'model' => TashkilotRahbari::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'email', 'label' => 'Email'],
                    ['key' => 'phone', 'label' => 'Telefon'],
                ],
                'show_route' => 'tashkilotrahbari.show',
                'show_param' => 'tashkilotrahbari',
            ],
            'iqtisodiy' => [
                'title' => 'Iqtisodiy-moliyaviy',
                'model' => IqtisodiyMoliyaviy::class,
                'columns' => [
                    ['key' => 'kadastr_raqami', 'label' => 'Kadastr raqami'],
                    ['key' => 'u_maydoni', 'label' => 'Umumiy maydoni'],
                    ['key' => 'binolar_soni', 'label' => 'Binolar soni'],
                ],
                'show_route' => 'iqtisodiy.show',
                'show_param' => 'iqtisodiy',
            ],
            'ilmiydaraja' => [
                'title' => 'Ilmiy darajalar',
                'redirect' => 'tashkilot.ilmiydaraja.index',
                'redirect_params' => fn (int $id) => ['tashkilot' => $id],
            ],
            'akadem' => [
                'title' => 'Akadem loyihalar',
                'redirect' => 'akadems.index',
                'redirect_params' => fn (int $id) => ['id' => $id],
            ],
            'dalolatnoma' => [
                'title' => 'Dalolatnomalar',
                'model' => Dalolatnoma::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'raqami', 'label' => 'Raqami'],
                    ['key' => 'joyiye_obyekti', 'label' => 'Joylash obyekti'],
                ],
                'show_route' => 'dalolatnoma.show',
                'show_param' => 'dalolatnoma',
            ],
            'monografiyalar' => [
                'title' => 'Monografiyalar',
                'model' => Monografiyalar::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'nashr_yili', 'label' => 'Nashr yili'],
                    ['key' => 'fan_yunalishi', 'label' => 'Fan yo\'nalishi'],
                ],
                'show_route' => 'monografiyalar.show',
                'show_param' => 'monografiyalar',
            ],
            'intellektualmulk' => [
                'title' => 'Intellektual mulk',
                'model' => Intellektualmulk::class,
                'columns' => [
                    ['key' => 'type', 'label' => 'Turi'],
                    ['key' => 'mavzu', 'label' => 'Mavzu'],
                    ['key' => 'fan_yunalishi', 'label' => 'Fan yo\'nalishi'],
                ],
                'show_route' => 'intellektualmulk.show',
                'show_param' => 'intellektualmulk',
            ],
            'ilmiymaqolalar' => [
                'title' => 'Ilmiy maqolalar',
                'model' => Ilmiymaqolalar::class,
                'columns' => [
                    ['key' => 'type', 'label' => 'Turi'],
                    ['key' => 'mavzu', 'label' => 'Mavzu'],
                    ['key' => 'jurnal_nomi', 'label' => 'Jurnal nomi'],
                ],
                'show_route' => 'ilmiymaqolalar.show',
                'show_param' => 'ilmiymaqolalar',
            ],
            'ilmiytezislar' => [
                'title' => 'Ilmiy tezislar',
                'model' => Ilmiytezislar::class,
                'columns' => [
                    ['key' => 'type', 'label' => 'Turi'],
                    ['key' => 'mavzu', 'label' => 'Mavzu'],
                    ['key' => 'kon_qisqa_nomi', 'label' => 'Konferensiya'],
                ],
                'show_route' => 'ilmiytezislar.show',
                'show_param' => 'ilmiytezislar',
            ],
            'ilmiyrahbarlar' => [
                'title' => 'Ilmiy rahbarlar',
                'model' => Ilmiyrahbarlar::class,
                'columns' => [
                    ['key' => 'full_name', 'label' => 'F.I.Sh'],
                    ['key' => 'org', 'label' => 'Tashkilotdan'],
                    ['key' => 'all', 'label' => 'Jami'],
                ],
                'show_route' => 'ilmiyrahbarlar.show',
                'show_param' => 'ilmiyrahbarlar',
            ],
            'loyihaijrochilar' => [
                'title' => 'Loyiha ijrochilari',
                'model' => Loyihaijrochilar::class,
                'columns' => [
                    ['key' => 'fio', 'label' => 'F.I.O'],
                    ['key' => 'science_id', 'label' => 'Science ID'],
                    ['key' => 'shtat_birligi', 'label' => 'Shtat birligi'],
                ],
            ],
            'tijorat' => [
                'title' => 'Tijorat loyihalar',
                'model' => Tijorat::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Loyiha nomi'],
                    ['key' => 'loyiha_rahbari', 'label' => 'Rahbar'],
                    ['key' => 'turi', 'label' => 'Turi'],
                ],
                'show_route' => 'tijorat.show',
                'show_param' => 'tijorat',
            ],
            'startup' => [
                'title' => 'Startup loyihalar',
                'model' => Startup::class,
                'columns' => [
                    ['key' => 'name', 'label' => 'Loyiha nomi'],
                    ['key' => 'loyiha_rahbari', 'label' => 'Rahbar'],
                    ['key' => 'soha', 'label' => 'Soha'],
                ],
                'show_route' => 'startup.show',
                'show_param' => 'startup',
            ],
            'intellektual' => [
                'title' => 'Intellektual',
                'model' => Intellektual::class,
                'columns' => [
                    ['key' => 'ilmiy_loyiha_id', 'label' => 'Loyiha ID'],
                    ['key' => 'mal_jur_amalda', 'label' => 'Mahalliy jurnal'],
                    ['key' => 'xor_jur_amalda', 'label' => 'Xorijiy jurnal'],
                ],
                'show_route' => 'intellektual.show',
                'show_param' => 'intellektual',
            ],
            'tekshirivchilar' => [
                'title' => 'Tekshirivchilar',
                'model' => Tekshirivchilar::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'ekspert_fish', 'label' => 'Ekspert'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
            'asbobuskunaexpert' => [
                'title' => 'Asbob-uskuna ekspertiza',
                'model' => Asbobuskunaexpert::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'ekspert_fish', 'label' => 'Ekspert'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
            'stajirovkaexpert' => [
                'title' => 'Stajirovka ekspertiza',
                'model' => Stajirovkaexpert::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'ekspert_fish', 'label' => 'Ekspert'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
            'doktaranturaexpert' => [
                'title' => 'Doktarantura ekspertiza',
                'model' => Doktaranturaexpert::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'ekspert_fish', 'label' => 'Ekspert'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
            'akademexpert' => [
                'title' => 'Akadem ekspertiza',
                'model' => AkademExpert::class,
                'columns' => [
                    ['key' => 'fish', 'label' => 'F.I.Sh'],
                    ['key' => 'ekspert_fish', 'label' => 'Ekspert'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
            'asbobuskunafile' => [
                'title' => 'Asbob-uskuna fayllari',
                'model' => Asbobuskunafile::class,
                'columns' => [
                    ['key' => 'file', 'label' => 'Fayl'],
                    ['key' => 'status', 'label' => 'Status'],
                ],
            ],
        ];
    }
}
