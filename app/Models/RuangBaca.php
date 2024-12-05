<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangBaca extends Model
{
    use HasFactory;
    protected $table = 'ruang_baca';
    protected $primarykey = 'id';
    protected $timestamp = false;
    protected $fillable = [ 'id_siswa','nama_ruang','petugas','jenis_buku'];

    
    
}