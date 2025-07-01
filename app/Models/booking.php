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
        'order_id', // Tambahkan kolom order_id
    ];

    public function tenda()
    {
        return $this->belongsTo(Tenda::class);
    }
}
