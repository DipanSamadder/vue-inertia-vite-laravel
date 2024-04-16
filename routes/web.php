<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use Inertia\Inertia;

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


// Route::get('/home',function(){
//    return Inertia::render('Home')->withViewData(['meta' => 'test']);

// })->name('home');


// Route::get('/about',function(){
//    return Inertia::render('About')->withViewData(['meta' => 'test']);

// })->name('about');


Route::get('/get-image/{id?}', function($id){
   
    if($id == null){
        $array['status'] = 'error';
        return $array;
    }
    $array['data'] = [
        'title' => dsld_upload_file_title($id),
        'full' => dsld_uploaded_file_path($id, 'full'),
        'url' => dsld_uploaded_file_path($id),
        'placeholder' => dsld_uploaded_file_path($id,'placeholder'),
    ];
    $array['message'] = 'Success fully Loaded';
    $array['status'] = 'Success';
    return $array;
});



Route::get('/business-settings', [HomeController::class, 'businessSetting']);


Route::middleware('guest')->group(function () {
  
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('send-test-mail', 'MailController@testmail')->name('testmail');
Route::get('/optimize', function() {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::view('medias', 'media')->name('media');
Route::resource('user_profile', 'UserProfileController');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('contact-form/submit-data', 'Setting\ContactFormController@ajax_submit_data')->name('contact_form.submit_data');

Route::get('npf-form/{id}', 'Setting\ContactFormController@npf_form')->name('npf.show');


Route::get('/p/form', 'Setting\ContactFormController@vueForm')->name('vue.form');
Route::post('/p/submit-form', 'Setting\ContactFormController@vueSubmit')->name('vue.form.submit');


Route::get('/{page}/{slug1?}/{slug2?}/{slug3?}', 'Pages\PagesController@show_custom_page')->name('custom-pages.show_custom_page');


