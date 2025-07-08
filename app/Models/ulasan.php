<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
     protected $table = 'ulasan'; // karena bukan plural
    protected $fillable = ['booking_id', 'user_id', 'rating', 'komentar'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
