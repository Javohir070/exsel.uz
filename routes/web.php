<?php


use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IlmiybnTaminlangaController;
use App\Http\Controllers\IlmiyLoyihaController;
use App\Http\Controllers\IlmiyUnvonController;
use App\Http\Controllers\IqtisodiyMoliyaviyController;
use App\Http\Controllers\ItmController;
use App\Http\Controllers\TashkilotController;
use App\Http\Controllers\TashkilotUserlarController;
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




Route::get('/', [HomeController::class,'index'])->middleware('auth')->name('home.index');
Route::middleware('auth')->group(function () {
    Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::get('/export', [ExportController::class, 'export']);
    Route::get('/exportilmiy', [IlmiyLoyihaController::class, 'exportilmiy']);
    // Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/exportashkiot', [TashkilotController::class, 'exporttashkilot']);
    Route::get('/exporxodimlar', [XodimlarController::class, 'exporxodimlar']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profileview', [UserController::class, 'profileview'])->name('profileview.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/tashkilotlar',[TashkilotController::class,'tashkilotlar'])->name('tashkilotlar.index');
    Route::get('/tashqoshish',[TashkilotController::class,'tashkilot_create'])->name('tashqoshish.create');
    Route::get('/xodim',[XodimlarController::class,'barcha_xodimlar'])->name('xodim.barchaXodimlar');
    Route::get('/iqtisodiylar',[IqtisodiyMoliyaviyController::class,'iqtisodiylar'])->name('iqtisodiylar.index');
    Route::get('/tashkilotrahbarilar',[TashkilotRahbariController::class,'tashkilotrahbarilar'])->name('tashkilotrahbarilar.index');
    Route::get('/ilmiyloyihalar',[IlmiyLoyihaController::class, 'ilmiyloyihalar'])->name('ilmiyloyihalar.index');
    Route::get('/xujaliklar',[xujalikController::class, 'xujaliklar'])->name('xujaliklar.index');
    Route::get('/ilmiydarajalar',[IlmiybnTaminlangaController::class, 'ilmiydarajalar'])->name('ilmiydarajalar.index');
    Route::get('/search', [TashkilotController::class, 'search'])->name('search');
    Route::get('/searchloyiha', [IlmiyLoyihaController::class, 'searchloyiha'])->name('searchloyiha');
    Route::get('/searchxodimlar', [XodimlarController::class, 'searchxodimlar'])->name('searchxodimlar');
    Route::get('/searchuser', [UserController::class, 'searchuser'])->name('searchuser');
    Route::get('/adminlar',[TashkilotMalumotlarController::class, 'adminlar'])->name('tashkilotmalumotlar.adminlar');
    //itm
    Route::get('/itmtashkilot',[ItmController::class, 'tashkilot'])->name('itm.tashkilot');
    Route::get('/itmiqtisodiy',[ItmController::class, 'iqtisodiy'])->name('itm.iqtisodiy');
    Route::get('/itmtashkilotrahbari',[ItmController::class, 'tashkilotrahbari'])->name('itm.tashkilotrahbari');
    Route::get('/itmxodimlar',[ItmController::class, 'xodimlar'])->name('itm.xodimlar');
    Route::get('/itmilmiyloyiha',[ItmController::class, 'ilmiyloyiha'])->name('itm.ilmiyloyiha');
    Route::get('/itmxujalik',[ItmController::class, 'xujalik'])->name('itm.xujalik');
    Route::get('/itmilmiydaraja',[ItmController::class, 'ilmiydaraja'])->name('itm.ilmiydaraja');
    Route::get('/itmadminlar',[ItmController::class, 'ItmAdminlar'])->name('itm.adminlar');
    //end itm 
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
        'tashkilot.userlar' => TashkilotUserlarController::class
    ]);
});
Route::group(['middleware' => ['role:super-admin|admin']], function() {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('/ilmiyunvon', IlmiyUnvonController::class);
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

});

require __DIR__.'/auth.php';
