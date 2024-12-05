<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian_buku';
    protected $primarykey = 'id_pengembalian';
    protected $timestamp = false;
    protected $fillable = [ 'id_peminjaman','tanggal_kembai','denda','status'];
    
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}