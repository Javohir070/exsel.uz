<?php

use App\Http\Controllers\AsbobuskunaController;
use App\Http\Controllers\AsbobuskunaexpertController;
use App\Http\Controllers\AsbobuskunafileController;
use App\Http\Controllers\DalolatnomaController;
use App\Http\Controllers\DoktaranturaController;
use App\Http\Controllers\DoktaranturaexpertController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FakultetlarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IlmiybnTaminlangaController;
use App\Http\Controllers\IlmiyLoyihaController;
use App\Http\Controllers\IlmiymaqolalarController;
use App\Http\Controllers\IlmiyrahbarlarController;
use App\Http\Controllers\IlmiytezislarController;
use App\Http\Controllers\IlmiyUnvonController;
use App\Http\Controllers\IntellektualController;
use App\Http\Controllers\IntellektualmulkController;
use App\Http\Controllers\IqtisodiyMoliyaviyController;
use App\Http\Controllers\ItmController;
use App\Http\Controllers\KafedralarController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\LoyihaijrochilarController;
use App\Http\Controllers\LoyihaiqtisodiController;
use App\Http\Controllers\MonografiyalarController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StajirovkaController;
use App\Http\Controllers\StajirovkaexpertController;
use App\Http\Controllers\TashkilotController;
use App\Http\Controllers\TashkilotUserlarController;
use App\Http\Controllers\TekshirivchilarController;
use App\Http\Controllers\XujalikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TashkilotRahbariController;
use App\Http\Controllers\XodimlarController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TashkilotIlmiyController;
use App\Http\Controllers\TashkilotIlmiydarajaController;
use App\Http\Controllers\TashkilotMalumotlarController;
use App\Http\Controllers\TashkilotXodimlarController;
use App\Http\Controllers\TashkilotXujalikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [SiteController::class, 'index'])->name('frontend.home');
// Route::get('/views/{id}/{page:slug}', [SiteController::class, 'views'])->name('views');

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home.index');

Route::middleware('auth')->group(function () {

    //start generate pdf
    Route::get('generate-pdf/{ilmiyId}', [App\Http\Controllers\PDFController::class, 'generatePDF']);
    Route::get('generate-pdfsajiyor/{Id}', [App\Http\Controllers\PDFController::class, 'generatePDFsajiyor']);
    Route::get('generate-pdfasbobuskuna/{Id}', [App\Http\Controllers\PDFController::class, 'generatePDFAsbobuskuna']);
    Route::get('generate-pdfdoktarantura/{Id}', [App\Http\Controllers\PDFController::class, 'generatePDFDoktarantura']);
    // end generate pdf

    //start Search
    // Route::get('/search', [SearchController::class, 'search'])->name('search');
    // end Search

    //start profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //end profile

    //xodimlar
    Route::post('/import', [XodimlarController::class, 'import'])->name('import');
    Route::get('/reformat-phones', [XodimlarController::class, 'reformatPhones']);
    Route::get('/xodim', [XodimlarController::class, 'barcha_xodimlar'])->name('xodim.barchaXodimlar');
    Route::get('/searchxodimlar', [XodimlarController::class, 'searchxodimlar'])->name('searchxodimlar');
    Route::get('/searchxodim', [XodimlarController::class, 'searchEmployees'])->name('searchxodim');
    //end xodimlar

    //tashkilot
    Route::get('/tashkilotlar', [TashkilotController::class, 'tashkilotlar'])->name('tashkilotlar.index');
    Route::get('region/{id}', [TashkilotController::class, 'tashkilot_region'])->name('tashkilot_region');
    Route::get('/tashqoshish', [TashkilotController::class, 'tashkilot_create'])->name('tashqoshish.create');
    Route::get('/adminlar', [TashkilotMalumotlarController::class, 'adminlar'])->name('tashkilotmalumotlar.adminlar');
    //end tashkilot

    //tashkilotrahbari
    Route::get('/tashkilotrahbarilar', [TashkilotRahbariController::class, 'tashkilotrahbarilar'])->name('tashkilotrahbarilar.index');
    //end tashkilotrahbari

    //iqtisodiy
    Route::get('/iqtisodiylar', [IqtisodiyMoliyaviyController::class, 'iqtisodiylar'])->name('iqtisodiylar.index');
    //end iqtisodiy

    //ilmiyloyiha
    Route::post('/ilmiyloyiha-import', [IlmiyLoyihaController::class, 'IlmiyLoyiha_import'])->name('IlmiyLoyiha_import');
    Route::get('/ilmiyloyihalar', [IlmiyLoyihaController::class, 'ilmiyloyihalar'])->name('ilmiyloyihalar.index');
    Route::get('/searchloyiha', [IlmiyLoyihaController::class, 'searchloyiha'])->name('searchloyiha');
    Route::get('scientific-project', [IlmiyLoyihaController::class, 'scientific_project'])->name('scientific_project.index');
    Route::get('/search-ilmiy', [IlmiyLoyihaController::class, 'search_ilmiy_loyhalar'])->name('search_ilmiy_loyhalar');
    Route::get('masul', [IlmiyLoyihaController::class, "masul"])->name("masul.index");
    Route::get('ilmiy-loyihalar', [IlmiyLoyihaController::class, "ilmiy_loyihalar_all"])->name("ilmiy_loyihalar_all.index");
    Route::get('ilmiy/{id}', [IlmiyLoyihaController::class, "ilmiy_loyihalar"])->name("ilmiy_loyihalar.index");
    Route::get('turi/{id}', [IlmiyLoyihaController::class, 'tashkilot_turi'])->name('tashkilot_turi');
    //end ilmiyloyiha

    //xujalik
    Route::get('/xujaliklar', [xujalikController::class, 'xujaliklar'])->name('xujaliklar.index');
    //end xujalik

    //ilmiydarajalar
    Route::get('/ilmiydarajalar', [IlmiybnTaminlangaController::class, 'ilmiydarajalar'])->name('ilmiydarajalar.index');
    //end ilmiydarajalar

    //UserController
    Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::get('/profileview', [UserController::class, 'profileview'])->name('profileview.index');
    Route::get('/searchuser', [UserController::class, 'searchuser'])->name('searchuser');
    Route::resource('users', UserController::class);
    Route::post('/ilmiy-loyhagamasul', [UserController::class, 'ilmiy_loyha_rahbari'])->name('ilmiyLoyha_rahbari.index');
    Route::get('/masullar-rahbarlar', [UserController::class, 'ilmiy_loyha_masullar'])->name('ilmiy_loyha_edit.index');
    Route::get('/kafedra-rol', [UserController::class, 'kafedra_rol'])->name('kafedra_rol.index');
    Route::get('/asbobuskuna-rol', [UserController::class, 'asbobuskuna_rol'])->name('asbobuskuna_rol.index');
    Route::post('/kafedrarol', [UserController::class, 'kafedrarol_store'])->name('kafedrarol.store');
    //end UserController

    //DoktaranturaController
    Route::get('/search-doktarantura', [DoktaranturaController::class, 'search_doktarantura'])->name('search_doktarantura');
    Route::get('/search-dok', [DoktaranturaController::class, 'search_dok'])->name('search_dok');
    Route::get('doktarantura-turi/{id}', [DoktaranturaController::class, 'tashkilot_turi_doktarantura'])->name('tashkilot_turi_doktarantura');
    Route::get('php-import/{stir}', [DoktaranturaController::class, 'importDoktaranturaData'])->name('php_import');
    Route::get('ilmiy-rahbarlar-import/{stir}', [DoktaranturaController::class, 'importIlmiyRahbarlarData'])->name('ilmiy_rahbarlar_import');
    Route::get('ilmiy-izlanuvchi/{id}', [DoktaranturaController::class, 'ilmiyIzlanuvchi_show'])->name('ilmiyIzlanuvchi_show');
    Route::put('ilmiy-izlanuvchi/{id}/edit', [DoktaranturaController::class, 'update'])->name('ilmiyIzlanuvchi_edit');
    Route::get('doktaranturalar', [DoktaranturaController::class, 'doktaranturalar'])->name('doktaranturalar');
    Route::get('/doktarantura/export', [DoktaranturaController::class, 'exportDoktaranturaexpert'])->name('exportDoktaranturaexpert');
    Route::get('/doktarantura/{id}/export', [DoktaranturaController::class, 'exportDoktarantura']);
    //end DoktaranturaController

    //itm
    Route::get('/itmtashkilot', [ItmController::class, 'tashkilot'])->name('itm.tashkilot');
    Route::get('/itmiqtisodiy', [ItmController::class, 'iqtisodiy'])->name('itm.iqtisodiy');
    Route::get('/itmtashkilotrahbari', [ItmController::class, 'tashkilotrahbari'])->name('itm.tashkilotrahbari');
    Route::get('/itmxodimlar', [ItmController::class, 'xodimlar'])->name('itm.xodimlar');
    Route::get('/itmilmiyloyiha', [ItmController::class, 'ilmiyloyiha'])->name('itm.ilmiyloyiha');
    Route::get('/itmxujalik', [ItmController::class, 'xujalik'])->name('itm.xujalik');
    Route::get('/itmilmiydaraja', [ItmController::class, 'ilmiydaraja'])->name('itm.ilmiydaraja');
    Route::get('/itmadminlar', [ItmController::class, 'ItmAdminlar'])->name('itm.adminlar');
    Route::get('/itm-xodimlar', [ItmController::class, 'itm_export'])->name('itm.export');
    Route::get('/itm-xujalik', [ItmController::class, 'itm_xujalik_export'])->name('itm.xujalikloyhalar');
    Route::get('/itm-ilmiy', [ItmController::class, 'itm_loyhalar_export'])->name('itm.ilmiyloyhalar');
    //end itm

    // start role
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    // end role

    // start stajirovka
    Route::get('/search-sta', [StajirovkaController::class, 'search_stajirovka'])->name('search_stajirovka');
    Route::post('/stajirovka-import', [StajirovkaController::class, 'stajirovka_import'])->name('stajirovka_import');
    Route::get('stajirovkalar', [StajirovkaController::class, "stajirovkalar"])->name("stajirovkalar.index");
    // Route::get('stajirovka/{id}', [StajirovkaController::class, "stajirovka_tashkilot"])->name("stajirovka_tashkilot.index");
    Route::get('stajirovkas', [StajirovkaController::class, "stajirovkas_all"])->name("stajirovkas_all.index");
    Route::get('stajiro/{id}', [StajirovkaController::class, "stajirov"])->name("stajirov.index");
    Route::get('stajiroka-turi/{id}', [StajirovkaController::class, 'tashkilot_turi_stajiroka'])->name('tashkilot_turi_stajiroka');
    // end stajirovka

    // start asbob uskunalar
    Route::get('/search-asbob', [AsbobuskunaController::class, 'search_asbobuskunalar'])->name('search_asbobuskunalar');
    Route::get('asbobuskuna-masullar', [AsbobuskunaController::class, "asbobuskuna_masullar"])->name("asbobuskuna_masullar.index");
    Route::get('asbobuskunalar', [AsbobuskunaController::class, "asbobuskunalar"])->name("asbobuskunalar.index");
    Route::get('asbobuskunas', [AsbobuskunaController::class, "asbobuskunas_all"])->name("asbobuskunas_all.index");
    Route::get('asbobuskunas/{id}', [AsbobuskunaController::class, "asbobu"])->name("asbobu.index");
    Route::get('/export-asbobuskunalar', [AsbobuskunaController::class, 'export_asbobuskunalar'])->name('export.asbobuskunalar');
    Route::get('tashkilot-turi/{id}', [AsbobuskunaController::class, 'tashkilot_turi_asbobuskuna'])->name('tashkilot_turi_asbobuskuna');
    Route::post('/asbobuskuna-import', [AsbobuskunaController::class, 'asbobuskuna_import'])->name('asbobuskuna_import');
    // end asbob uskunalar

    // labaratoriya uchun
    Route::get('lab-user', [LaboratoryController::class, 'lab_biriktirilgan_xodimlar'])->name('lab_xodimlar.index');
    Route::get('lab-xujalik', [LaboratoryController::class, 'lab_biriktirilgan_xujalik'])->name('lab_xujalik.index');
    Route::get('lab-ilmiyloyhi', [LaboratoryController::class, 'lab_biriktirilgan_ilmiyloyha'])->name('lab_ilmiyloyiha.index');
    Route::put('lab/{labId}/give-xodims', [LaboratoryController::class, 'giveXodimToLab']);
    Route::put('lab/{labId}/give-xujaliks', [LaboratoryController::class, 'giveXujalikToLab']);
    Route::put('lab/{labId}/give-ilmiyloyhas', [LaboratoryController::class, 'giveIlmiyLoyhaToLab']);
    Route::get('laboratoriya', [LaboratoryController::class, 'laboratoriya'])->name('laboratoriya.index');
    Route::get('laboratoriyalari', [LaboratoryController::class, 'laboratoriyalari'])->name('laboratoriyalari.index');
    Route::get('masullar', [LaboratoryController::class, "masullar"])->name("masullar.index");
    Route::get('/export-lab', [LaboratoryController::class, 'export_lab'])->name('export_lab');
    // labaratoriya uchun

    // start home
    Route::get('monitoring', [HomeController::class, "monitoring"])->name("monitoring.index");
    // end home

    //start kafedra mudiri uchun
    Route::get('kafedralar-user', [KafedralarController::class, 'Kafedralar_biriktirilgan_xodimlar'])->name('kafedralar_xodimlar.index');
    Route::get('kafedralar-xujalik', [KafedralarController::class, 'Kafedralar_biriktirilgan_xujalik'])->name('kafedralar_xujalik.index');
    Route::get('kafedralar-ilmiyloyhi', [KafedralarController::class, 'Kafedralar_biriktirilgan_ilmiyloyha'])->name('kafedralar_ilmiyloyiha.index');
    Route::put('kaf/{kafId}/give-xodims', [KafedralarController::class, 'giveXodimToKaf']);
    Route::put('kaf/{kafId}/give-xujaliks', [KafedralarController::class, 'giveXujalikToKaf']);
    Route::put('kaf/{kafId}/give-ilmiyloyhas', [KafedralarController::class, 'giveIlmiyLoyhaToKaf']);
    Route::get('responsible', [KafedralarController::class, "responsible_masullar"])->name("responsible.index");
    Route::get('kafedra', [KafedralarController::class, "kafedra"])->name("kafedra.index");
    Route::get('kafedras', [KafedralarController::class, "kafedras"])->name("kafedras.index");
    Route::get('/export-kafedralar', [KafedralarController::class, 'kafedralar_export'])->name('export.kafedralar');
    // end kafedra mudiri uchun

    //start fakultet
    Route::get('fakultets', [FakultetlarController::class, "fakultets"])->name("fakultets.index");
    Route::get('/export-fakultetlar', [FakultetlarController::class, 'fakultetlar_export'])->name('export.fakultetlar');
    //end fakultet

    //start Dalolatnoma
    Route::get('dalolatnomas', [DalolatnomaController::class, "dalolatnomas"])->name("dalolatnomas.index");
    Route::get('/export-dalolatnomas', [DalolatnomaController::class, "export_dalolatnomas"])->name("dalolatnomas.export");
    // end Dalolatnoma

    //start Monografiyalar
    Route::get('monografiyalars', [MonografiyalarController::class, "monografiyalars"])->name("monografiyalars.index");
    Route::get('/export-monografiyalars', [MonografiyalarController::class, "export_monografiyalars"])->name("monografiyalars.export");
    // end Monografiyalar

    //start Intellectul mulks
    Route::get('intellektualmulks', [IntellektualmulkController::class, "intellektualmulks"])->name("intellektualmulks.index");
    Route::get('/export-intellektualmulks', [IntellektualmulkController::class, "export_intellektualmulks"])->name("intellektualmulks.export");
    // end Intellectul mulks

    //start Ilmiymaqolalar
    Route::get('ilmiymaqolalars', [IlmiymaqolalarController::class, "ilmiymaqolalars"])->name("ilmiymaqolalars.index");
    Route::get('/export-ilmiymaqolalars', [IlmiymaqolalarController::class, "export_ilmiymaqolalars"])->name("ilmiymaqolalars.export");
    // end Ilmiymaqolalar

    //start Ilmiytezislar
    Route::get('ilmiytezislars', [IlmiytezislarController::class, "ilmiytezislars"])->name("ilmiytezislars.index");
    Route::get('/export-ilmiytezislars', [IlmiytezislarController::class, "export_ilmiytezislars"])->name("ilmiytezislars.export");
    //end Ilmiytezislar

    //start Ilmiyrahbarlar
    Route::put('ilmiy-rahbar/{id}/edit', [IlmiyrahbarlarController::class, 'update'])->name('ilmiyrahbar_edit');
    //end Ilmiyrahbarlar

    Route::resources([
        'tashkilot' => TashkilotController::class,
        'xodimlar' => XodimlarController::class,
        'tashkilotrahbari' => TashkilotRahbariController::class,
        'iqtisodiy' => IqtisodiyMoliyaviyController::class,
        'ilmiyloyiha' => IlmiyLoyihaController::class,
        'xujalik' => XujalikController::class,
        'ilmiydaraja' => IlmiybnTaminlangaController::class,
        'tashkilotmalumotlar' => TashkilotMalumotlarController::class,
        'tashkilot.ilmiyloyiha' => TashkilotIlmiyController::class,
        'tashkilot.xodimlar' => TashkilotXodimlarController::class,
        'tashkilot.xujalik' => TashkilotXujalikController::class,
        'tashkilot.ilmiydaraja' => TashkilotIlmiydarajaController::class,
        'tashkilot.userlar' => TashkilotUserlarController::class,
        'laboratory' => LaboratoryController::class,
        'tekshirivchilar' => TekshirivchilarController::class,
        'fakultetlar' => FakultetlarController::class,
        'kafedralar' => KafedralarController::class,
        'dalolatnoma' => DalolatnomaController::class,
        'monografiyalar' => MonografiyalarController::class,
        'intellektualmulk' => IntellektualmulkController::class,
        'ilmiymaqolalar' => IlmiymaqolalarController::class,
        'ilmiytezislar' => IlmiytezislarController::class,
        'asbobuskuna' => AsbobuskunaController::class,
        'asbobuskunafile' => AsbobuskunafileController::class,
        'stajirovka' => StajirovkaController::class,
        'stajirovkaexpert' => StajirovkaexpertController::class,
        'asbobuskunaexpert' => AsbobuskunaexpertController::class,
        'doktarantura' => DoktaranturaController::class,
        'doktaranturaexpert' => DoktaranturaexpertController::class,
        'intellektual' => IntellektualController::class,
        'loyihaiqtisodi' => LoyihaiqtisodiController::class,
        'loyihaijrochilar' => LoyihaijrochilarController::class,
        'ilmiyrahbarlar' => IlmiyrahbarlarController::class,
        'notifications' => NotificationController::class,
    ]);

    Route::get('/tashkilot/{id}/export', [TashkilotController::class, 'exportXodimlar']);
    Route::get('/ilmiyrahbarlar/{id}/export', [IlmiyrahbarlarController::class, 'exportIlmiyrahbarlar']);

});

Route::group(['middleware' => ['role:super-admin|admin|Ekspert']], function () {

    Route::delete('/tashkilot/{tashkilot}/xodimlar', [XodimlarController::class, 'deleteAll'])->name('xodimlar.deleteAll');
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
    Route::get('/export', [ExportController::class, 'export']);
    Route::get('/export-ilmiylar', [IlmiyLoyihaController::class, 'exportilmiy'])->name('exportilmiy');
    Route::get('/monitoring/export-ilmiylar', [IlmiyLoyihaController::class, 'monitoring_exportilmiy'])->name('monitoring_exportilmiy');
    Route::get('/monitoring/export-stajirovkalar', [StajirovkaController::class, 'monitoring_exportstajirovka'])->name('monitoring_exportstajirovka');
    Route::get('/monitoring/export-intellektual', [IntellektualController::class, 'monitoring_exportintellektual'])->name('monitoring_exportintellektual');
    Route::get('/export-ilmiylar2024', [TekshirivchilarController::class, 'exportilmiyloyiha'])->name('exportilmiyloyiha');
    Route::get('/export-iqtisodiyfaoliyat', [IqtisodiyMoliyaviyController::class, 'iqtisodiyfaoliyat'])->name('iqtisodiyfaoliyat');
    Route::get('/export-tashkiotlar', [TashkilotController::class, 'exportashkilot'])->name('exportashkilot');
    Route::get('/export-xodimlar', [XodimlarController::class, 'exporxodimlar'])->name('exporxodimlar');
    Route::get('/export-xujaliklar', [XujalikController::class, 'exporxujaliklar'])->name('exporxujaliklar');
    Route::resource('/ilmiyunvon', IlmiyUnvonController::class);
    Route::resource('roles', RoleController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

});

require __DIR__ . '/auth.php';
