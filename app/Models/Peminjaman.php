<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_buku';
    protected $primarykey = 'id_peminjaman';
    protected $timestamp = false;
    protected $fillable = [ 'id_siswa','tanggal_pinjam','tenggat','id_buku','status'];

    
    
}