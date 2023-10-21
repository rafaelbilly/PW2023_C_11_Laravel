<?php

use Illuminate\Support\Facades\Route;

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
    return view('DashboardAdmin');
});

Route::get('/dashboardAdmin', function () {
    return view('DashboardAdmin');
});

Route::get('/admin', function () {
    $birthday = URL::asset('img/birthday.jpeg');
    $engagement = URL::asset('img/engagement.jpeg');
    $wedding = URL::asset('img/wedding.jpeg');
    $exhibition = URL::asset('img/exhibition.jpeg');

    return view('Admin/managementEventAdmin', [
        'event' => [
            [
                'gambarEvent' => $birthday,
                'judul' => 'Birthday Party',
                'deskripsi' => 'Create unforgettable birthday moments for you or your loved ones'
            ],
            [
                'gambarEvent' => $engagement,
                'judul' => 'Engagement',
                'deskripsi' => 'This moment is the most important moment in your life, make your engagement event a beautiful memory'
            ],
            [
                'gambarEvent' => $wedding,
                'judul' => 'Wedding Ceremony',
                'deskripsi' => 'A wedding is a sacred moment that will be remembered for a lifetime. Make your wedding experience special and unforgettable'
            ],
            [
                'gambarEvent' => $exhibition,
                'judul' => 'Exhibition',
                'deskripsi' => 'Art is an expression of the soul and creativity that arises to create your exhibition event like other artists'
            ]
        ]
    ]);
}); 

Route::get('/admin2', function () {
    $users = [];
    for ($i = 0; $i < 10; $i++) {
        $users[] = [
            'name' => 'Jane Doe',
            'work' => 'Senior Designer',
            'invoiceNumber' => 'Cell Text',
            'phoneNumber' => 'Cell Text',
            'email' => 'Cell Text',
            'status' => 'Cell Text'
        ];
    }

    return view('Admin/managementUser', ['users' => $users]);
});


Route::get('/admin3', function () {
    return view('Admin/addNewEvents');
});