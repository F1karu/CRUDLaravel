<?php
namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
    
class KelasController extends Controller
{
    public function getkelas()
    {
        $dt_kelas=kelas::get();
        return response()->json($dt_kelas);
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
            'nama_kelas' => 'required',
            'kelompok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $update = kelas::where('id_kelas', $id)->update([
            'nama_kelas' => $req->get('nama_kelas'),
            'kelompok' => $req->get('kelompok'),
        ]);

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
