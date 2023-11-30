<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';

    public function kategori()
    {
        return $this->belongsTo(M_Kategori::class, 'id_kategori');
    }
}
