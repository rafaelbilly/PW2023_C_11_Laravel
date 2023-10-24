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
    $birthday = URL::asset('images/birthday.jpg');
    $engagement = URL::asset('images/engagement.jpg');
    $wedding = URL::asset('images/wedding.jpg');
    return view('Gyms/indexDashboardAdmin', [
        'acara2' => [
            [
                'nama' => 'Birthday Party',
                'gambar' => $birthday,
                'deskripsi' => 'Belum tahu mau isi apa disini 1',
            ],
            [
                'nama' => 'Engagement',
                'gambar' => $engagement,
                'deskripsi' => 'Belum tahu mau isi apa disini 2',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'gambar' => $wedding,
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
    $birthday = URL::asset('images/birthday.jpg');
    $engagement = URL::asset('images/engagement.jpg');
    $wedding = URL::asset('images/wedding.jpg');
    return view('Gyms/indexService', [
        'acara' => [
            [
                'nama' => 'Birthday Party',
                'gambar' => $birthday,
                'deskripsi' => '"Rayakan momen berharga dengan pesta ulang tahun yang tak terlupakan! Kami, sebagai penyelenggara pesta ulang tahun profesional, siap membantu Anda mengatur acara yang penuh keceriaan dan kejutan."',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai',
            ],
            [
                'nama' => 'Engagement',
                'gambar' => $engagement,
                'deskripsi' => '"Menghadirkan Momen Tak Terlupakan: Biarkan kami merencanakan pertunangan Anda dengan detail sempurna. Kami menghadirkan keajaiban dalam setiap momen."',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'gambar' => $wedding,
                'deskripsi' => '"Momen Keajaiban dalam Pernikahan: Setiap momen pernikahan Anda akan dirancang dengan indah dan memiliki sentuhan keajaiban. Kami hadirkan momen berkesan',
                'deskripsi2' => 'Memilih Tema Apapun
                                Profesionalisme dalam Perencanaan
                                Dokumentasi dan Pemotretan
                                Melayani Layanan Tambahan
                                Budget yang Sesuai',
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
                'deskripsi' => 'Master of Ceremony
                                Tempat acara
                                Hiburan
                                Dekorasi
                                Catering
                                Birthday Cake
                                Photobooth
                                Meja dan Kursi
                                Sound System
                                Pendaftaran dan Undangan
                                Koordinator Acara',
                
            ],
            [
                'nama' => 'Engagement',
                'harga' => '20JT',
                'deskripsi' => 'Master of Ceremony
                                Tempat acara
                                Hiburan
                                Dekorasi
                                Catering
                                Engagement Cake
                                Photobooth
                                Meja dan Kursi
                                Sound System
                                Pendaftaran dan Undangan
                                Koordinator Acara',
            ],
            [
                'nama' => 'Wedding Ceremony',
                'harga' => '40JT',
                'deskripsi' => 'Master of Ceremony
                                Tempat acara
                                Dekorasi
                                Hiburan
                                Dekorasi
                                Catering
                                Wedding Cake
                                Meja dan Kursi untuk tamu VIP
                                Transportasi Pengantin
                                Fotografi dan Videografi
                                Kamar Ganti
                                Sound System
                                Pendaftaran dan Undangan
                                Koordinator Acara',
            ],
        ]
    ]);
});

Route::get('/indexContact', function () {
    return view('Gyms/indexContact');
});

Route::get('/myBooking', function () {
    return view('myBooking',[
        'gambar' => 'https://i.pinimg.com/564x/95/45/f2/9545f20c9a6e0bf66eda9455370a70e7.jpg',
        'namaAcara' => 'Wedding Ceremony',
        'tanggal' => '31 October 2023',
    ]);
});
