<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'id_user',
        'deskripsi',
        'image',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
