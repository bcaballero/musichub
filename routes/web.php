<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Profile;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;

use App\Http\Livewire\Admin\UserProfile;
use App\Http\Livewire\Admin\UserManagement;
use App\Http\Livewire\Admin\UserCreate;
use App\Http\Livewire\Admin\UserUpdate;
use App\Http\Livewire\Admin\MusicManagement;
use App\Http\Livewire\Admin\MusicCreate;
use App\Http\Livewire\Admin\MusicUpdate;
use App\Http\Livewire\Admin\MusicRemove;

use App\Http\Livewire\BrowseMusic;
use App\Http\Livewire\ManageCart;
use App\Http\Livewire\AddCart;
use App\Http\Livewire\DeleteCart;
use App\Http\Livewire\Checkout;
use App\Http\Controllers\PaymentController;

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

Route::get('/', BrowseMusic::class)->name('browse-music');
Route::get('/login', Login::class)->name('login');
Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');
Route::get('/sign-up', SignUp::class)->name('sign-up');

Route::get('/browse-music', BrowseMusic::class)->name('browse-music');
Route::get('/cart', ManageCart::class)->name('cart');
Route::get('/music-preview', AddCart::class)->name('music-preview');
Route::get('/remove-from-cart', DeleteCart::class)->name('remove-from-cart');
Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('paymentsuccess', [PaymentController::class,'payment_success']);
Route::get('paymenterror', [PaymentController::class, 'payment_error']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/my-profile', UserProfile::class)->name('my-profile');
    
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');

    // Admin portal
    Route::get('/admin', Login::class)->name('adminlogin');
    Route::get('/admin/user-management', UserManagement::class)->name('user-management');
    Route::get('/admin/user-create', UserCreate::class)->name('user-create');
    Route::get('/admin/user-update', UserUpdate::class)->name('user-update');
    Route::get('/admin/music-management', MusicManagement::class)->name('music-management');
    Route::get('/admin/music-create', MusicCreate::class)->name('music-create');
    Route::get('/admin/music-update', MusicUpdate::class)->name('music-update');
    Route::get('/admin/music-delete', MusicRemove::class)->name('music-delete');
});