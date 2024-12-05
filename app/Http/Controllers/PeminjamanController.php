<?php
namespace App\Http\Controllers;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class PeminjamanController extends Controller
{ 
    public function createpeminjaman(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'id_siswa'=>'required',
            'id_buku'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $tenggat = carbon::now()->addDays(4);
        $save = peminjaman::create([
            'id_siswa'    =>$req->get('id_siswa'),
            'id_buku'    =>$req->get('id_buku'),
            'tanggal_pinjam'    =>date('Y-m-d H:i:s'),
            'tenggat'        =>$tenggat,
            'status'     => 'Dipinjam'
            

        ]);
        if($save){
            return Response()->json(['status'=>true, 'message' => 'Sukses menambah pinjaman']);
        }else {
            return Response()->json(['status'=>false, 'message' => 'Gagal menambah pinjaman']);
        }}
    }
