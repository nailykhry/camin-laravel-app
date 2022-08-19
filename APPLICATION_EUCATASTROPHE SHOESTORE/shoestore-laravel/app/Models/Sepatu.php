<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    use HasFactory;

    protected $fillable = ['s_foto', 's_nama', 's_hargabeli', 's_hargajual', 's_kategori', 's_deskripsi', 's_bahan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('s_nama', 'like', '%' . $search . '%')
                ->orWhere('s_kategori', 'like', '%' . $search . '%');
        });
    }

    public function ukuran()
    {
        return $this->hasMany(Ukuran::class);
    }

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}
