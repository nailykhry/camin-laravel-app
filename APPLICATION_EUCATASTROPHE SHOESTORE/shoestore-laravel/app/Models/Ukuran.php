<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;
    protected $fillable = ['sepatu_id', 'u_besar', 'u_stock', 'u_deskripsi', 'u_stock'];

    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class);
    }
}
