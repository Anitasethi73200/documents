<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Controllers\ModualController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SenderTypeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VipController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'XSS', '2fa']);
Route::post('/chart', [HomeController::class, 'chart'])->name('get.chart.data')->middleware(['auth', 'XSS']);
Route::get('notification', [HomeController::class, 'notification']);
Route::group(['middleware' => ['auth', 'XSS']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('modules', ModualController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('file', FileController::class);
    Route::resource('section', SectionController::class);
    route::resource('document', DocumentController::class);
    route::resource('share', ShareController::class);
    route::resource('deliverymode', DeliveryController::class);
    route::resource('vip', VipController::class);
    route::resource('sendertype', SenderTypeController::class);
    route::resource('communication', CommunicationController::class);
    route::resource('receipt', ReceiptController::class);
});
Route::get('file_view/{id}', [FileController::class, 'viewfile'])->name('file.view');
Route::get('file_inbox', [FileController::class, 'fileinbox'])->name('file.inbox');
Route::get('file_sent', [FileController::class, 'filesent'])->name('file.sent');
Route::get('file_greennotes', [FileController::class, 'greennotes'])->name('file.greennotes');
Route::get('file_yellownotes', [FileController::class, 'yellownotes'])->name('file.yellownontes');
Route::get('fileshare/{id}', [FileController::class, 'fileshare'])->name('file.share');
Route::post('storeshare-file', [FileController::class, 'store_file_share'])->name('storefile.share');
Route::get('discard-notes/{id}', [FileController::class, 'discardnote'])->name('discard.notes');
Route::post('correspondance', [FileController::class, 'store_correspondance'])->name('correspondance.store');
Route::get('file-notes/{id}', [FileController::class, 'file_notes'])->name('file.notes');
Route::post('file-notes', [FileController::class, 'store_notes'])->name('store.notes');
Route::get('get-subcategory', [FileController::class, 'subcategory']);
Route::get('get-section', [FileController::class, 'getsection']);
Route::get('receipt_inbox', [ReceiptController::class, 'inbox'])->name('receipt.inbox');
Route::get('receipt_sent', [ReceiptController::class, 'sent'])->name('receipt.sent');
Route::get('receipt_search', [ReceiptController::class, 'search'])->name('receipt.search');
Route::get('receipt_share/{id}', [ReceiptController::class, 'receiptshare'])->name('receipt.share');
Route::post('receiptshare-store', [ReceiptController::class, 'receiptshare_store'])->name('receiptshare.store');
Route::post('/comments', [DocumentController::class, 'commentstore'])->name('comments.store');
Route::get('viewdocument/{id}', [DocumentController::class, 'view'])->name('view.document');
Route::get('document_sent', [DocumentController::class, 'documentsent'])->name('document.sent');
Route::get('document_inbox', [DocumentController::class, 'documentinbox'])->name('document.inbox');
Route::get('get-user', [DocumentController::class, 'getuser']);
Route::get('document_share/{id}', [DocumentController::class, 'share'])->name('document.share');

Route::post('storeshare', [DocumentController::class, 'store_share'])->name('store.share');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'XSS']);
Route::post('/role/{id}', [RoleController::class, 'assignPermission'])->name('roles_permit')->middleware(['auth', 'XSS']);


Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('setting/email-setting', [SettingController::class, 'getmail'])->name('settings.getmail');
        Route::post('setting/email-settings_store', [SettingController::class, 'saveEmailSettings'])->name('settings.emails');
        Route::get('setting/datetime', [SettingController::class, 'getdate'])->name('datetime');
        Route::post('setting/datetime-settings_store', [SettingController::class, 'saveSystemSettings'])->name('settings.datetime');
        Route::get('setting/logo', [SettingController::class, 'getlogo'])->name('getlogo');
        Route::post('setting/logo_store', [SettingController::class, 'store'])->name('settings.logo');
        Route::resource('settings', SettingController::class);
        Route::get('test-mail', [SettingController::class, 'testMail'])->name('test.mail');
        Route::post('test-mail', [SettingController::class, 'testSendMail'])->name('test.send.mail');
    }
);

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);
Route::post('edit-profile', [UserController::class, 'editprofile'])->name('update.profile')->middleware(['auth', 'XSS']);
Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
        Route::get('language', [LanguageController::class, 'index'])->name('index');
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder')->middleware(['auth', 'XSS']);

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template')->middleware(['auth', 'XSS']);

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template')->middleware(['auth', 'XSS']);

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate')->middleware(['auth', 'XSS']);

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback')->middleware(['auth', 'XSS']);

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file')->middleware(['auth', 'XSS']);

Route::group(['prefix' => '2fa'], function () {
    Route::get('/', [UserController::class, 'profile'])->name('2fa')->middleware(['auth', 'XSS']);
    Route::post('/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret')->middleware(['auth', 'XSS']);
    Route::post('/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa')->middleware(['auth', 'XSS']);
    Route::post('/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa')->middleware(['auth', 'XSS']);

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});
// Route::resource('tests', App\Http\Controllers\TestController::class)->middleware(['auth', 'XSS']);
