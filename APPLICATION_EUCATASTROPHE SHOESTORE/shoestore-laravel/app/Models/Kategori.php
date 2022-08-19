<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['k_kategori'];

    public function sepatu()
    {
        return $this->belongsToMany(Sepatu::class);
    }
}
