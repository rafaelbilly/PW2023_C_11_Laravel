<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();

        if (count($pemesanans) > 0) {
            return response([
                'message' => 'Retrieve All Booking',
                'data' => $pemesanans
            ], 200);
        }

        return response([
            'message' => 'Booking Empty',
            'data' => null,
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function generateRandomString($prefix = 'smgr-', $length = 9)
    {
        $characters = '0123456789';
        $randomString = $prefix;

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_user' => 'required|exists:users,id',
            'id_event' => 'required|exists:events,id',
            'tanggal_event' => 'required|date',
            'tempat_event' => 'required',
            'payment_type' => 'required|in:card,cod',
        ]);

        if ($validate->fails()) {
            return response(['message' => $validate->errors()], 400);
        }

        $user = User::find($storeData['id_user']);
        if (!$user) {
            return response(['message' => 'User not found'], 400);
        }

        $event = Event::find($storeData['id_event']);
        if (!$event) {
            return response(['message' => 'Event not found'], 400);
        }

        $additionalData = [];

        if ($storeData['payment_type'] == 'card') {
            $validateCard = Validator::make($storeData, [
                'cardholder_name' => 'required',
                'card_number' => 'required|numeric',
                'card_exp' => 'required|date_format:m/y',
                'card_cvc' => 'required|numeric',
            ]);

            if ($validateCard->fails()) {
                return response(['message' => $validateCard->errors()], 400);
            }

            $additionalData = [
                'cardholder_name' => $storeData['cardholder_name'],
                'card_number' => $storeData['card_number'],
                'card_exp' => $storeData['card_exp'],
                'card_cvc' => $storeData['card_cvc'],
            ];
        }

        $pemesananData = array_merge($storeData, $additionalData);

        $pemesananData += [
            'cardholder_name' => null,
            'card_number' => null,
            'card_exp' => null,
            'card_cvc' => null,
        ];

        $pemesananData += [
            'status' => 'Belum Lunas',
            'invoice' => $this->generateRandomString(),
            'total_biaya' => $event->harga,
        ];

        $pemesanans = Pemesanan::create($pemesananData);

        return response([
            'message' => 'Add New Booking Success',
            'data' => $pemesanans,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesanans = Pemesanan::find($id);

        if (!is_null($pemesanans)) {
            return response([
                'message' => 'Detail Booking Found',
                'data' => $pemesanans
            ], 200);
        }

        return response([
            'message' => 'Booking Not Found',
            'data' => null
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanans = Pemesanan::find($id);

        if (is_null($pemesanans)) {
            return response([
                'message' => 'Booking Not Found',
                'data' => null
            ], 404);
        }

        if ($pemesanans->delete()) {
            return response([
                'message' => 'Delete Booking Success',
                'data' => $pemesanans
            ], 200);
        }
        return response([
            'message' => 'Delete Booking Failed',
            'data' => null
        ], 400);
    }
}
