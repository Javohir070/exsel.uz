<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class ItmController extends Controller
{
    public function index()
    {
        //
    }

    public function tashkilot()
    {
        $tashkilot = Tashkilot::where('tashkilot_turi', 'itm')->orderBy('name', 'asc')->paginate(37);
        return view('admin.itm.tashkilotlar',['tashkilot'=>$tashkilot]);
    }

    public function xodimlar()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('xodimlar')->get();
        $xodimlar = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->xodimlar;
        });

        $xodimlarCollection = collect($xodimlar);

    // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $xodimlarCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedXodimlar = new LengthAwarePaginator(
            $currentPageItems,
            $xodimlarCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.xodimlar',['xodimlar'=>$paginatedXodimlar]);
    }

    public function tashkilotrahbari()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('tashkilotrahbaris')->get();
        $tashkilotrahbari = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->tashkilotrahbaris;
        });

        $tashkilotrahbariCollection = collect($tashkilotrahbari);

    // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $tashkilotrahbariCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedTashkilotrahbari = new LengthAwarePaginator(
            $currentPageItems,
            $tashkilotrahbariCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.tashkilotrahbarilar',['tashkilotrahbari'=>$paginatedTashkilotrahbari]);
    }


    public function iqtisodiy()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('iqtisodiylar')->get();
        $iqtisodiys = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->iqtisodiylar;
        });

         // Iqtisodiylarni kolleksiyaga o'girish
        $iqtisodiysCollection = collect($iqtisodiys);

        // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $iqtisodiysCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedIqtisodiys = new LengthAwarePaginator(
            $currentPageItems,
            $iqtisodiysCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.iqtisodiylar',['iqtisodiys'=>$paginatedIqtisodiys]);
    }


    public function ilmiyloyiha()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('ilmiyloyhalar')->get();
        $ilmiyloyihas = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->ilmiyloyhalar;
        });

            // Ilmiy loyihalarni kolleksiyaga o'girish
        $ilmiyloyihasCollection = collect($ilmiyloyihas);

        // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $ilmiyloyihasCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedIlmiyloyihas = new LengthAwarePaginator(
            $currentPageItems,
            $ilmiyloyihasCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.ilmiyloyihalar',['ilmiyloyihas'=>$paginatedIlmiyloyihas]);
    }

    public function xujalik()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('xujaliklar')->get();
        $xujaliks = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->xujaliklar;
        });

        $xujaliksCollection = collect($xujaliks);

        // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $xujaliksCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedXujaliks = new LengthAwarePaginator(
            $currentPageItems,
            $xujaliksCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.xujalik',['xujaliks'=>$paginatedXujaliks]);
    }

    public function ilmiydaraja()
    {
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with('ilmiydarajalar')->get();
        $ilmiydarajas = $tashkilots->flatMap(function ($tashkilot) {
            return $tashkilot->ilmiydarajalar;
        });

        $ilmiydarajasCollection = collect($ilmiydarajas);

        // Paginatsiya parametrlarini aniqlash
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20; // Har bir sahifadagi elementlar soni
        $currentPageItems = $ilmiydarajasCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Paginatsiya obyekti yaratish
        $paginatedIlmiydarajas = new LengthAwarePaginator(
            $currentPageItems,
            $ilmiydarajasCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return view('admin.itm.ilmiydaraja',['ilmiydarajas'=>$paginatedIlmiydarajas]);
    }

    public function ItmAdminlar(){
        $itmadminlar = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->whereHas('tashkilot', function ($query) {
            $query->where('tashkilot_turi', 'itm');
        })->paginate(20);

        return view('admin.itm.itmadminlar',['itmadminlar' => $itmadminlar]);
    }
}
