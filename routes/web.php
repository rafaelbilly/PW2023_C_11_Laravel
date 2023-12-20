<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use App\Models\Event;
use App\Models\Review;

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

Route::get('/', function () {
    $review = Review::latest()->get(); // mengambil semua data dari tabel reviews

    return view('landing', [
        'review' => $review
    ]);
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::get('homepage', [HomeController::class, 'index'])->name('homepage')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/service', [UserEventController::class, 'index'])->name('service.index');

Route::get('/booking', [UserEventController::class, 'booking'])->name('booking');
Route::post('/booking', [UserEventController::class, 'bookingStore'])->name('booking.store');

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/myBooking', [UserEventController::class, 'myBooking'])->name('myBooking');
Route::delete('/myBooking/{id}', [UserEventController::class, 'destroyBooking'])->name('myBooking.destroy');

Route::get('/userProfile', [HomeController::class, 'userProfile'])->name('userProfile');
Route::put('/userProfile', [HomeController::class, 'updateProfile'])->name('userProfile.update');
});

Route::get('/DashboardAdmin', [EventController::class, 'dashboardAdmin'])->name('dashboardAdmin');

Route::get('/managementEventAdmin', [EventController::class, 'index'])->name('managementEventAdmin.index');

Route::get('/managementUser', [UserController::class, 'index']);
Route::get('/managementUser/create', [UserController::class, 'create'])->name('managementUser.create');
Route::post('/managementUser', [UserController::class, 'store'])->name('managementUser.store');
Route::delete('/managementUser/{id}', [UserController::class, 'destroy'])->name('managementUser.destroy');
Route::put('/managementUser/{id}', [UserController::class, 'update'])->name('managementUser.update');

Route::get('/addNewEvents', function () {
    return view('admin/addNewEvents');
});
Route::post('/addNewEvents', [EventController::class, 'store'])->name('addNewEvents.store');
Route::get('/managementEventAdmin/{id}/edit', [EventController::class, 'edit'])->name('managementEventAdmin.edit');
Route::put('/managementEventAdmin/{id}', [EventController::class, 'update'])->name('managementEventAdmin.update');
Route::delete('/managementEventAdmin/{id}', [EventController::class, 'destroy'])->name('managementEventAdmin.destroy');

Route::get('/Checkout', [UserEventController::class, 'checkout'])->name('checkout');
Route::post('/Checkout', [UserEventController::class, 'checkoutStore'])->name('checkout.store');


Route::get('/addReview', [UserEventController::class, 'addReview'])->name('addReview');
Route::post('/addReview', [UserEventController::class, 'addReviewStore'])->name('addReview.store');

Route::get('/myReview', [UserEventController::class, 'myReview'])->name('myReview');

Route::delete('/myReview/{id}', [UserEventController::class, 'destroyReview'])->name('reviews.destroy');
Route::put('/myReview/{id}', [UserEventController::class, 'updateReview'])->name('review.update');
