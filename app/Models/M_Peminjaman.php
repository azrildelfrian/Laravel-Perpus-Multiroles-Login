<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    public function buku()
    {
        return $this->belongsTo(M_Buku::class, 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
