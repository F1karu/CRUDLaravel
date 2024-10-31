<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primarykey = 'id_siswa';
    protected $timestamp = null;
    protected $fillable = [ 'nama_siswa','tgl_lahir','gender','alamat','id_kelas'];
    
}
