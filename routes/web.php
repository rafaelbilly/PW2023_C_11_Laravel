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
    $review = Review::latest()->get(); 

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

// Route::get('/dashboard', function () {
//     return view('user/dashboard', [
//         'clients' => [
//             [
//                 'event' => 'https://i.pinimg.com/564x/85/20/9c/85209c9c129f191e8c7f519331115a9b.jpg',
//                 'review' => 'Saya sangat terkesan dengan kreativitas dan dedikasi Semesta Group dalam menciptakan acara kami. Mereka benar-benar tahu cara membuat setiap momen istimewa.',
//                 'name' => 'Dustin John',
//                 'profile' => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&q=80&w=1780&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
//                 'name-event' => 'Birthday Party',
//             ],
//             [
//                 'event' => 'https://i.pinimg.com/564x/11/c7/ac/11c7ac1394a015ed33b58e0a61de689c.jpg',
//                 'review' => 'Saya sangat terkesan dengan kreativitas dan dedikasi Semesta Group dalam menciptakan acara kami. Mereka benar-benar tahu cara membuat setiap momen istimewa.',
//                 'name' => 'Franklin',
//                 'profile' => 'https://i.pinimg.com/564x/17/02/cc/1702cc73b2c0bb271ed473f5783233e9.jpg',
//                 'name-event' => 'Engagement',
//             ],
//             [
//                 'event' => 'https://i.pinimg.com/564x/2a/cb/88/2acb882e7646978972e1871c8ef9f64f.jpg',
//                 'review' => 'Saya sangat terkesan dengan kreativitas dan dedikasi Semesta Group dalam menciptakan acara kami. Mereka benar-benar tahu cara membuat setiap momen istimewa.',
//                 'name' => 'Razor',
//                 'profile' => 'https://images.unsplash.com/photo-1628157588553-5eeea00af15c?auto=format&fit=crop&q=80&w=1780&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
//                 'name-event' => 'Wedding Ceremony',
//             ],
//             [
//                 'event' => 'https://i.pinimg.com/564x/11/c7/ac/11c7ac1394a015ed33b58e0a61de689c.jpg',
//                 'review' => 'Saya sangat terkesan dengan kreativitas dan dedikasi Semesta Group dalam menciptakan acara kami. Mereka benar-benar tahu cara membuat setiap momen istimewa.',
//                 'name' => 'Franklin',
//                 'profile' => 'https://i.pinimg.com/564x/17/02/cc/1702cc73b2c0bb271ed473f5783233e9.jpg',
//                 'name-event' => 'Engagement',
//             ],
//         ]
//     ]);
// });

Route::middleware('auth')->group(function(){
    Route::get('/service', [UserEventController::class, 'index'])->name('service.index');

Route::get('/booking', [UserEventController::class, 'booking'])->name('booking');

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/myBooking', [UserEventController::class, 'myBooking'])->name('myBooking');
Route::delete('/myBooking/{id}', [UserEventController::class, 'destroyBooking'])->name('myBooking.destroy');

Route::get('/userProfile', function () {
    return view('user/userProfile', [
        'userProfile' => [
            [
                'username' => 'Johnson',
                'email' => 'johnson@gmail.com',
                'password' => 'johnson1234',
                'phone' => '08112233344455',
            ],
        ]
    ]);
});
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