<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}