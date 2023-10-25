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
    $promotion = URL::asset('img/promotion.jpeg');

    return view('Admin/managementEventAdmin', [
        'event' => [
            [
                'gambarEvent' => $birthday,
                'judul' => 'Birthday Party',
                'deskripsi' => 'Rayakan momen berharga dengan pesta ulang tahun yang tak terlupakan! Kami, sebagai penyelenggara pesta ulang tahun profesional, siap membantu Anda mengatur acara yang penuh keceriaan dan kejutan.',
                'deskripsi2' => 'Memilih Tema Apapun
                Profesionalisme dalam Perencanaan
                Dokumentasi dan Pemotretan
                Melayani Layanan Tambahan
                Budget yang Sesuai'

            ],
            [
                'gambarEvent' => $engagement,
                'judul' => 'Engagement',
                'deskripsi' => 'Menghadirkan Momen Tak Terlupakan: Biarkan kami merencanakan pertunangan Anda dengan detail sempurna. Kami menghadirkan keajaiban dalam setiap momen.',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai'
            ],
            [
                'gambarEvent' => $wedding,
                'judul' => 'Wedding Ceremony',
                'deskripsi' => 'Momen Keajaiban dalam Pernikahan: Setiap momen pernikahan Anda akan dirancang dengan indah dan memiliki sentuhan keajaiban. Kami hadirkan momen berkesan',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai'
            ],
            [
                'gambarEvent' => $exhibition,
                'judul' => 'Exhibition',
                'deskripsi' => 'Seni merupakan ekspresi jiwa dan kreativitas yang muncul untuk mewujudkan acara pameran Anda seperti seniman lainnya',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai'
            ],
            [
                'gambarEvent' => $promotion,
                'judul' => 'Promotion',
                'deskripsi' => 'Membantu Anda dalam menciptakan acara promosi terbaik dan dapat memberikan kesan kepada klien Anda',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai'
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