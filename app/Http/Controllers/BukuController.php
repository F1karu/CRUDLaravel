<?php
namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::all(); // Mengembalikan semua buku
    }

    // Metode untuk mendapatkan buku berdasarkan ID
    public function show($id)
{
    $buku = Buku::where('id_buku', $id)->first(); // Menggunakan where untuk mencari berdasarkan id_buku
    if (!$buku) {
        return response()->json(['message' => 'buku not found'], 404); // Mengembalikan error jika tidak ditemukan
    }
    return response()->json($buku); // Mengembalikan data buku
}

    
    public function createbuku(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $save = Buku::create([
            'judul_buku' => $req->get('judul_buku'),
            'penulis' => $req->get('penulis'),
            'penerbit' => $req->get('penerbit'),
            'kategori' => $req->get('kategori')
        ]);

        if ($save) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah buku']);
        }
    }

    public function updatebuku(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'judul_buku' => 'sometimes|required',
            'penulis' => 'sometimes|required',
            'penerbit' => 'sometimes|required',
            'kategori' => 'sometimes|required'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        
        $dataToUpdate = $req->only(['judul_buku', 'penulis', 'penerbit', 'kategori']);
        
        
        
        $update = buku::where('id_buku', $id)->update($dataToUpdate);
        

    if ($update) {
        return response()->json(['status' => true, 'message' => 'Sukses mengubah buku']);
    } else {
        return response()->json(['status' => false, 'message' => 'Gagal mengubah buku']);
    }
}


    public function deletebuku($id)
    {
        $delete = buku::where('id_buku', $id)->delete();

        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus buku']);
        }
    }
}
