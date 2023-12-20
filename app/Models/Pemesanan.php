<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'id_event',
        'invoice',
        'payment_type',
        'cardholder_name',
        'card_number',
        'card_exp',
        'card_cvc',
        'jmlOrder',
        'tanggalPemesanan',
        'total_biaya',
        'status',
        'phone_number',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
