<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjamkembali extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa()
    {
        $this->belongsTo(Mahasiswa::class);
    }

    public function buku()
    {
        $this->belongsTo(Buku::class);
    }
}
