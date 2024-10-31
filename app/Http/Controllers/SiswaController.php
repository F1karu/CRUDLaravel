<?php
namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function getsiswa()
    {
        $dt_siswa = Siswa::join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->get();
        return response()->json($dt_siswa);
    }
    
    public function createsiswa(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $save = Siswa::create([
            'nama_siswa' => $req->get('nama_siswa'),
            'tgl_lahir' => $req->get('tgl_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'id_kelas' => $req->get('id_kelas')
        ]);

        if ($save) {
            return response()->json(['status' => true, 'message' => 'Sukses menambah siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambah siswa']);
        }
    }

    public function updatesiswa(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'sometimes|required',
            'tgl_lahir' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'alamat' => 'sometimes|required',
            'id_kelas' => 'sometimes|required'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        
        $dataToUpdate = $req->only(['nama_siswa', 'tgl_lahir', 'gender', 'alamat', 'id_kelas']);
        
        
        
        $update = Siswa::where('id_siswa', $id)->update($dataToUpdate);
        

    if ($update) {
        return response()->json(['status' => true, 'message' => 'Sukses mengubah siswa']);
    } else {
        return response()->json(['status' => false, 'message' => 'Gagal mengubah siswa']);
    }
}


    public function deletesiswa($id)
    {
        $delete = Siswa::where('id_siswa', $id)->delete();

        if ($delete) {
            return response()->json(['status' => true, 'message' => 'Sukses menghapus siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus siswa']);
        }
    }
}
