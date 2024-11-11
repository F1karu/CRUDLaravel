<?php
namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
    
class KelasController extends Controller
{
    public function index()
    {
        return Kelas::all(); // Mengembalikan semua kelas
    }

    // Metode untuk mendapatkan kelas berdasarkan ID
    public function show($id)
{
    $kelas = kelas::where('id_kelas', $id)->first(); // Menggunakan where untuk mencari berdasarkan id_kelas
    if (!$kelas) {
        return response()->json(['message' => 'kelas not found'], 404); // Mengembalikan error jika tidak ditemukan
    }
    return response()->json($kelas); // Mengembalikan data kelas
}
    public function createkelas(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama_kelas'=>'required',
            'kelompok'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = kelas::create([
            'nama_kelas'    =>$req->get('nama_kelas'),
            'kelompok'        =>$req->get('kelompok'),
            

        ]);
        if($save){
            return Response()->json(['status'=>true, 'message' => 'Sukses menambah kelas']);
        }else {
            return Response()->json(['status'=>false, 'message' => 'Gagal menambah kelas']);
        }}

        public function updatekelas(Request $req, $id)
        {
            $validator = Validator::make($req->all(), [
                'nama_kelas' => 'sometimes|required',
                'kelompok' => 'sometimes|required',
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson());
            }
            
            $dataToUpdate = $req->only(['nama_kelas', 'kelompok']);
            
            
            
            $update = kelas::where('id_kelas', $id)->update($dataToUpdate);
            
    
        if ($update) {
            return response()->json(['status' => true, 'message' => 'Sukses mengubah kelas']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengubah kelas']);
        }
    }
    
    
        public function deletekelas($id)
        {
            $delete = kelas::where('id_kelas', $id)->delete();
    
            if ($delete) {
                return response()->json(['status' => true, 'message' => 'Sukses menghapus kelas']);
            } else {
                return response()->json(['status' => false, 'message' => 'Gagal menghapus kelas']);
            }
}
    }
