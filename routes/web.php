<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

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
    return view('landing');
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

Route::get('/service', function () {
    $birthday = URL::asset('images/birthday.jpeg');
    $engagement = URL::asset('images/engagement.jpeg');
    $wedding = URL::asset('images/wedding.jpeg');

    return view('user/service', [
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

Route::get('/booking', function () {
    return view('user/booking', [
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

    Route::get('/contact', function () {
        return view('user/contact');
    });

Route::get('/myBooking', function () {
    return view('user/myBooking', [
        'myBooking' => [
            [
                'gambar' => 'https://i.pinimg.com/564x/95/45/f2/9545f20c9a6e0bf66eda9455370a70e7.jpg',
                'namaAcara' => 'Wedding Ceremony',
                'tanggal' => '31 October 2023',
            ],
        ]  
    ]);
});

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

Route::get('/DashboardAdmin', function () {
    $birthday = URL::asset('images/birthday.jpeg');
    $engagement = URL::asset('images/engagement.jpeg');
    $wedding = URL::asset('images/wedding.jpeg');

    return view('admin/DashboardAdmin', [
        'acara2' => [
            [
                'nama' => 'Birthday Party',
                'gambar' => $birthday,
            ],
            [
                'nama' => 'Engagement',
                'gambar' => $engagement,
            ],
            [
                'nama' => 'Wedding Ceremony',
                'gambar' => $wedding,
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

Route::get('/managementEventAdmin', function () {
    $birthday = URL::asset('images/birthday.jpeg');
    $engagement = URL::asset('images/engagement.jpeg');
    $wedding = URL::asset('images/wedding.jpeg');
    $exhibition = URL::asset('images/exhibition.jpeg');
    $promotion = URL::asset('images/promotion.jpeg');

    return view('admin/managementEventAdmin', [
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

Route::get('/managementUser', function () {
    $users = [];
    for ($i = 0; $i < 10; $i++) {
        $users[] = [
            'name' => 'Jane Doe',
            'work' => 'User',
            'invoiceNumber' => 'Cell Text',
            'phoneNumber' => 'Cell Text',
            'email' => 'Cell Text',
            'status' => 'Cell Text'
        ];
    }

    return view('admin/managementUser', ['users' => $users]);
});

Route::get('/addNewEvents', function () {
    return view('admin/addNewEvents');
});

Route::get('/Checkout', function () {
    return view('user/Checkout');
});

Route::get('/addReview', function () {
    return view('user/addReview');
});

Route::get('/myReview', function () {
    return view('user/myReview');
});