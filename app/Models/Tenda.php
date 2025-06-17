<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenda extends Model
{
    use HasFactory;

    protected $table = 'tenda'; // ← penting karena nama tabel bukan bentuk jamak

    protected $fillable = [
        'nama',
        'deskripsi',
        'stok',
        'harga',
        'foto',
    ];
}
