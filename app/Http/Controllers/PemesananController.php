<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Event;
use App\Models\User; 
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
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
        $eventData = Event::latest()->get(); 

        $acara = $eventData->map(function ($e) { 
            return [
                'id' => $e->id,
                'gambar' => asset('uploads/images/' . $e->image), 
                'nama' => $e->nama, 
                'deskripsi' => $e->deskripsi,
                'deskripsi2' => $e->deskripsi2, 
            ];
        })->toArray(); 

        return view('user/service', compact('acara'));
    }

    public function booking()
    {
        $eventData = Event::latest()->get(); 

        $booking = $eventData->map(function ($e) { 
            return [
                'id' => $e->id, 
                'gambar' => asset('uploads/images/' . $e->image),
                'nama' => $e->nama, 
                'harga' => $e->harga, 
                'deskripsi' => $e->deskripsi, 
                'deskripsi2' => $e->deskripsi2, 
            ];
        })->toArray();

        return view('user/booking', [
            'booking' => $booking
        ]);
    }

    public function checkout(Request $request)
    {
        if (!$request->filled('event_id')) return redirect('/booking');

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
        if (auth()->user()->invoiceNumber) return redirect('/myBooking')->with('error', 'Anda sudah melakukan pemesanan.');

        $event = Event::find($request->event_id);
        $payload = [
            'id_user' => auth()->id(),
            'id_event' => $request->event_id,
            'payment_type' => $request->payment_type,
            'jmlOrder' => 1,
            'tanggalPemesanan' => now(),
            'total_biaya' => $event->harga,
            'status' => 'belum lunas',
            'invoice' => $request->invoice,
        ];

        if ($request->payment_type == 'card') {
            $payload['cardholder_name'] = $request->cardholder_name;
            $payload['card_number'] = $request->card_number;
            $payload['card_exp'] = $request->card_exp;
            $payload['card_cvc'] = $request->card_cvc;
        }

        $booking = Pemesanan::create($payload);
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
}
