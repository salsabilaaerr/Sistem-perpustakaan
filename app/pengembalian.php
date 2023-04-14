<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    protected $table = "pengembalian";
    protected $fillable = ["tanggal_pinjam", "tanggal_kembali", "batas_pengembalian", "jumlah_buku_dipinjam", "jumlah_buku_dikembalikan", "anggota_id", "buku_id"];
   
    protected $primaryKey = "id";

    public function anggota()
    {
        return $this->belongsTo('App\anggota');
    }

    public function buku()
    {
        return $this->belongsTo('App\buku');
    }
}

