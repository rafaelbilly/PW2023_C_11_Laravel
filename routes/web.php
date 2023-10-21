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
    return view('dashboard');
});

Route::get('/dashboard2', function () {
    return view('dashboard2');
});

Route::get('/indexDashboardAdmin', function () {
    return view('Gyms/indexDashboardAdmin', [
        'acara2' => [
            [
                'nama' => 'Birthday Party 1',
                'gambar' => 'https://i.pinimg.com/564x/85/20/9c/85209c9c129f191e8c7f519331115a9b.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 1',
            ],
            [
                'nama' => 'Engagement',
                'gambar' => 'https://i.pinimg.com/564x/11/c7/ac/11c7ac1394a015ed33b58e0a61de689c.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 2',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'gambar' => 'https://i.pinimg.com/564x/2a/cb/88/2acb882e7646978972e1871c8ef9f64f.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 3',
            ]
            ],
            'admin' => [
            [
                'no' => '1',
                'invoice' => 'SG12345',
                'nama' => 'Sisca Kohl',
                'price' => '40.000.000',
                'status' => 'Lunas',
                'keterangan' => 'lunas'
            ],
            [
                'no' => '2',
                'invoice' => 'SG67890',
                'nama' => 'Jenni Kim',
                'price' => '20.000.000',
                'status' => 'Belum Lunas',
                'keterangan' => 'belum lunas',
            ],
            [
                'no' => '3',
                'invoice' => 'SG45678',
                'nama' => 'Kim Jisoo',
                'price' => '30.000.000',
                'status' => 'Lunas',
                'keterangan' => 'lunas',
            ],
            [
                'no' => '4',
                'invoice' => 'SG34875',
                'nama' => 'Jessica',
                'price' => '40.000.000',
                'status' => 'Belum Lunas',
                'keterangan' => 'belum lunas'
            ]
            ]
    ]);
});

Route::get('/indexService', function () {
    return view('Gyms/indexService', [
        'acara' => [
            [
                'nama' => 'Birthday Party 1',
                'gambar' => 'https://i.pinimg.com/564x/85/20/9c/85209c9c129f191e8c7f519331115a9b.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 1',
            ],
            [
                'nama' => 'Engagement',
                'gambar' => 'https://i.pinimg.com/564x/11/c7/ac/11c7ac1394a015ed33b58e0a61de689c.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 2',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'gambar' => 'https://i.pinimg.com/564x/2a/cb/88/2acb882e7646978972e1871c8ef9f64f.jpg',
                'deskripsi' => 'Belum tahu mau isi apa disini 3',
            ]
        ]
    ]);
});

Route::get('/indexBooking', function () {
    return view('Gyms/indexBooking', [
        'booking' => [
            [
                'nama' => 'Birthday Party',
                'harga' => '10JT',
                'deskripsi' => 'Belum Tahu mau isi apa',
            ],
            [
                'nama' => 'Engagement',
                'harga' => '20JT',
                'deskripsi' => 'Belum Tahu mau isi apa',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'harga' => '40JT',
                'deskripsi' => 'Belum Tahu mau isi apa',
            ],
        ]
    ]);
});

Route::get('/indexContact', function () {
    return view('Gyms/indexContact');
});
