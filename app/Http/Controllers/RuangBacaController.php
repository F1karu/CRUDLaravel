<?php
namespace App\Http\Controllers;
use App\Models\RuangBaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuangBacaController extends Controller
{
    public function index()
    {
        return RuangBaca::all(); 
    }

    
    public function show($id)
{
    $ruang = RuangBaca::where('id', $id)->first(); 
    if (!$ruang) {
        return response()->json(['message' => 'Ruang not found'], 404);
    }
    return response()->json($ruang); 
}

    
    public function createruangbaca(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_siswa' => 'required',
            'nama_ruang' => 'required',
            'petugas' => 'required',
            'jenis_buku' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $save = RuangBaca::create([
            'id_siswa' => $req->get('id_siswa'),
            'nama_ruang' => $req->get('nama_ruang'),
            'petugas' => $req->get('petugas'),
            'jenis_buku' => $req->get('jenis_buku')
        ]);

        if ($save) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah ruang']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah ruang']);
        }
    }

    public function updateruangbaca(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'id_siswa' => 'sometimes|required',
            'nama_ruang' => 'sometimes|required',
            'petugas' => 'sometimes|required',
            'jenis_buku' => 'sometimes|required'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        
        $dataToUpdate = $req->only(['id_siswa', 'nama_ruang', 'petugas', 'jenis_buku']);
        
        
        
        $update = RuangBaca::where('id', $id)->update($dataToUpdate);
        

    if ($update) {
        return response()->json(['status' => true, 'message' => 'Sukses mengubah ruang']);
    } else {
        return response()->json(['status' => false, 'message' => 'Gagal mengubah ruang']);
    }
}


    public function deleteruangbaca($id)
    {
        $delete = RuangBaca::where('id', $id)->delete();

        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus ruang']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus ruang']);
        }
    }
}
