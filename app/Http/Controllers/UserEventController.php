<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pemesanan;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    protected function generateRandomString($prefix = 'smgr-', $length = 9) {
        $characters = '0123456789';
        $randomString = $prefix;

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function index()
    {
        $eventData = Event::latest()->get(); // mengambil semua data dari tabel events

        $acara = $eventData->map(function ($e) { // mengubah data yang diambil menjadi array
            return [
                'id' => $e->id, // mengambil id dari tabel events
                'gambar' => asset('uploads/images/' . $e->image), // mengambil gambar dari folder uploads/images
                'nama' => $e->nama, // mengambil nama dari tabel events
                'deskripsi' => $e->deskripsi, // mengambil deskripsi dari tabel events
                'deskripsi2' => $e->deskripsi2, // mengambil deskripsi2 dari tabel events
            ];
        })->toArray(); // mengubah data yang diambil menjadi array

        return view('user/service', compact('acara'));
    }

    public function booking()
    {
        $eventData = Event::latest()->get(); // mengambil semua data dari tabel events

        $booking = $eventData->map(function ($e) { // mengubah data yang diambil menjadi array
            return [
                'id' => $e->id, // mengambil id dari tabel events
                'gambar' => asset('uploads/images/' . $e->image), // mengambil gambar dari folder uploads/images
                'nama' => $e->nama, // mengambil nama dari tabel events
                'harga' => $e->harga, // mengambil harga dari tabel events
                'deskripsi' => $e->deskripsi, // mengambil deskripsi dari tabel events
                'deskripsi2' => $e->deskripsi2, // mengambil deskripsi2 dari tabel events
            ];
        })->toArray(); // mengubah data yang diambil menjadi array

        return view('user/booking', [
            'booking' => $booking
        ]);
    }

    public function bookingStore(Request $request)
    {
        $event = Event::find($request->event_id);

        $payload = [
            'id_user' => auth()->id(),
            'id_event' => $request->event_id,
            'payment_type' => null,
            'jmlOrder' => 1,
            'tanggalPemesanan' => now(),
            'total_biaya' => $event->harga * 1,
            'status' => 'belum lunas',
        ];

        if ($request->payment_type == 'card') {
            $payload['cardholder_name'] = $request->cardholder_name;
            $payload['card_number'] = $request->card_number;
            $payload['card_exp'] = $request->card_exp;
            $payload['card_cvc'] = $request->card_cvc;
        }

        Pemesanan::create($payload);

        return redirect('/myBooking')->with('success', 'Pemesanan berhasil dibooking.');
    }

    public function checkout(Request $request)
    {
        if (!$request->filled('event_id') || !$request->filled('booking_id')) return redirect('/booking');

        $event = Event::find($request->event_id);

        $newInvoice = $this->generateRandomString();

        return view('user/Checkout', [
            'event' => $event,
            'newInvoice' => $newInvoice
        ]);
    }

    public function checkoutStore(Request $request)
    {
        // check if user have invoice number
        // if (auth()->user()->invoiceNumber) return redirect('/myBooking')->with('error', 'Anda sudah melakukan pemesanan.');
        $event = Event::find($request->event_id);
        $payload = [
            'id_user' => auth()->id(),
            'id_event' => $request->event_id,
            'payment_type' => $request->payment_type,
            'jmlOrder' => 1,
            'tanggalPemesanan' => $request->tanggalPemesanan,
            'total_biaya' => $event->harga,
            'status' => 'lunas',
            'invoice' => $request->invoice,
            'venue' => $request->venue,
        ];

        if ($request->payment_type == 'card') {
            $payload['cardholder_name'] = $request->cardholder_name;
            $payload['card_number'] = $request->card_number;
            $payload['card_exp'] = $request->card_exp;
            $payload['card_cvc'] = $request->card_cvc;
        }

        $booking = Pemesanan::find($request->booking_id);
        $booking->update($payload);

        $user = User::find(auth()->id());
        $user->update([
            'invoiceNumber' => $booking->invoice,
        ]);

        return redirect('/myBooking')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    public function myBooking()
    {
        $pemesanan = Pemesanan::where('id_user', auth()->id())->latest()->get();

        $pemesanan = $pemesanan->map(function ($p) {
            return [
                'id' => $p->id,
                'gambar' => asset('uploads/images/' . $p->event->image),
                'namaAcara' => $p->event->nama,
                'tanggal' => Carbon::parse($p->tanggalPemesanan)->format('d F Y'),
                'status' => $p->status,
                'event_id' => $p->id_event,
            ];
        })->toArray();

        return view('user/myBooking', [
            'myBooking' => $pemesanan
        ]);
    }

    public function destroyBooking($id)
    {
        $pemesanan = Pemesanan::find($id);

        if (!$pemesanan) return redirect('/myBooking')->with('error', 'Pemesanan tidak ditemukan.');

        $pemesanan->delete();

        if (auth()->user()->invoiceNumber) {
            $user = User::find(auth()->id());
            $user->update([
                'invoiceNumber' => null,
            ]);
        }

        return redirect('/myBooking')->with('success', 'Pemesanan berhasil dihapus.');
    }

    public function addReview()
    {
        $event = Event::latest()->get(['id', 'nama']);

        $review = Review::where('id_user', auth()->id())->latest()->get();

        $review = $review->map(function ($r) {
            return [
                'id' => $r->id,
                'gambar' => asset('uploads/images/' . $r->event->image),
                'namaAcara' => $r->event->nama,
                'review' => $r->review,
            ];
        })->toArray();

        return view('user/addReview', [
            'event' => $event,
            'review' => $review
        ]);
    }

    public function addReviewStore(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'review' => 'required',
        ]);

        $payload = [
            'id_user' => auth()->id(),
            'id_event' => $request->id_event,
            'review' => $request->review,
        ];

        Review::create($payload);

        return redirect('/myReview')->with('success', 'Review berhasil ditambahkan.');
    }

    public function myReview()
    {
        $review = Review::where('id_user', auth()->id())->latest()->get();

        $review = $review->map(function ($r) {
            return [
                'id' => $r->id,
                'gambar' => asset('uploads/images/' . $r->event->image),
                'namaAcara' => $r->event->nama,
                'review' => $r->review,
            ];
        })->toArray();

        $event = Event::latest()->get(['id', 'nama']);

        return view('user/myReview', [
            'myReview' => $review,
            'event' => $event
        ]);
    }

    public function destroyReview($id)
    {
        $review = Review::find($id);

        if (!$review) return redirect('/myReview')->with('error', 'Review tidak ditemukan.');

        $review->delete();

        return redirect('/myReview')->with('success', 'Review berhasil dihapus.');
    }

    public function updateReview(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'review' => 'required',
        ]);

        $review = Review::find($request->id);

        if (!$review) return redirect('/myReview')->with('error', 'Review tidak ditemukan.');

        $review->update([
            'id_event' => $request->id_event,
            'review' => $request->review,
        ]);

        return redirect('/myReview')->with('success', 'Review berhasil diubah.');
    }
}
