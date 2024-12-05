<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;  // Import model Pengembalian
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function createpengembalian(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_peminjaman' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        // Menggunakan app() untuk memanggil model Peminjaman tanpa import
        $peminjaman = app('App\Models\Peminjaman')::where('id_peminjaman', $req->id_peminjaman)->first();
        if (!$peminjaman) {
            return response()->json(['status' => false, 'message' => 'Peminjaman tidak ditemukan']);
        }

        // Proses pengembalian
        $pengembalian = new Pengembalian();
        $pengembalian->id_peminjaman = $req->id_peminjaman;
        $pengembalian->tanggal_kembali = now();

        // Hitung denda jika tanggal pengembalian melewati tenggat
        $denda = 0;
        if (Carbon::parse($pengembalian->tanggal_kembali)->greaterThan($peminjaman->tenggat)) {
            $daysLate = Carbon::parse($pengembalian->tanggal_kembali)->diffInDays($peminjaman->tenggat);
            $denda = $daysLate * 1000; // Contoh: denda Rp1000 per hari keterlambatan
            $denda = ceil($denda / 1000) * 1000;
        }

        $pengembalian->denda = $denda;
        $pengembalian->status = 'Dikembalikan';

        // Simpan pengembalian
        if ($pengembalian->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Sukses mencatat pengembalian',
                'denda' => 'Rp' . number_format($denda, 0, ',', '.')
            ]);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mencatat pengembalian']);
        }
    }
}
