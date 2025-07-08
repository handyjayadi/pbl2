<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'tenda_id',
        'nama',
        'email',
        'jumlah',
        'check_in',
        'check_out',
        'total_harga',
        'status',
        'order_id',
        'user_id',
        'expired_at', // Tambahkan kolom order_id
    ];

    public function tenda()
    {
        return $this->belongsTo(Tenda::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class);
    }

}
