<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descaktivitas'];

    public function galeris()
    {
        return $this->hasMany(Galeri::class,'aktivitas_id');
    }
}
