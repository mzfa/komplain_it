<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Exports\LaporanJenisPembayaran;
use Maatwebsite\Excel\Facades\Excel;

class LaporanJenisPembayaranController extends Controller
{
    public function index()
    {
        // dd($data);
        $jenis_pembayaran = DB::table('jenis_pembayaran')->whereNull('jenis_pembayaran.deleted_at')->get();
        return view('laporan_jenis_pembayaran.index', compact('jenis_pembayaran'));
    }
    public function detail(Request $request)
    {
        $jenis_pembayaran_id = '|'.$request->jenis_pembayaran_id.'|';
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $pemid = $request->jenis_pembayaran_id;
        $data = DB::table('transaksi_kas_masuk')->leftJoin('users', 'transaksi_kas_masuk.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi_kas_masuk.*',
        ])->whereNull('transaksi_kas_masuk.deleted_at')
        ->where('transaksi_kas_masuk.jenis_pembayaran_id','LIKE','%'.$jenis_pembayaran_id.'%')
        ->whereBetween('transaksi_kas_masuk.created_at',[$tanggal_awal,$tanggal_akhir])
        ->get();
        $data2 = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')
        ->where('transaksi.jenis_pembayaran_id','LIKE','%'.$jenis_pembayaran_id.'%')
        ->whereBetween('transaksi.created_at',[$tanggal_awal,$tanggal_akhir])
        ->get();
        // dd($jenis_pembayaran_id,$data);
        $jenis_pembayaran = DB::table('jenis_pembayaran')->whereNull('jenis_pembayaran.deleted_at')->get();
        return view('laporan_jenis_pembayaran.index', compact('data','data2','jenis_pembayaran','tanggal_awal','tanggal_akhir','pemid','jenis_pembayaran_id'));
    }
    public function export_excel($jenis_pembayaran_id, $tanggal_awal, $tanggal_akhir, $pemid)
    {
        $nama_file = 'Laporan_Kas_Masuk_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new LaporanJenisPembayaran($jenis_pembayaran_id, $tanggal_awal, $tanggal_akhir, $pemid), $nama_file);
    }
    
}
