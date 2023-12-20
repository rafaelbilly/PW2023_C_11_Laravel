<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Event;
use Exception;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
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
