<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSepatu extends Model
{
    use HasFactory;
    public $table = "kategori_sepatu";
    protected $fillable = ['sepatu_id', 'kategori_id'];
}

?>
