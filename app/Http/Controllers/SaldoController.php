<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

class SaldoController extends Controller
{
    public function index()
    {
        $jenis_pembayaran = DB::table('jenis_pembayaran')->whereNull('jenis_pembayaran.deleted_at')->get();
        return view('saldo.index', compact('jenis_pembayaran'));
    }
    public function detail(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;
        $pemid = $request->jenis_pembayaran_id;
        
        $jenis_pembayaran = DB::table('jenis_pembayaran')->whereNull('jenis_pembayaran.deleted_at')->get();
        $saldo = [];
        foreach($jenis_pembayaran as $item){
            $jenis_pembayaran_id = '|'.$item->jenis_pembayaran_id.'|';
            $data1 = DB::table('transaksi_kas_masuk')
            ->select([
                'users.username',
                'transaksi_kas_masuk.*',
            ])->whereNull('transaksi_kas_masuk.deleted_at')
            ->where('transaksi_kas_masuk.jenis_pembayaran_id','LIKE','%'.$jenis_pembayaran_id.'%')
            ->whereBetween('transaksi_kas_masuk.created_at',[$tanggal_awal,$tanggal_akhir])
            ->sum('transaksi_kas_masuk.nominal');
            $data2 = DB::table('transaksi_kas_masuk')
            ->select([
                'users.username',
                'transaksi_kas_masuk.*',
            ])->whereNull('transaksi_kas_masuk.deleted_at')
            ->where('transaksi_kas_masuk.jenis_pembayaran_id','LIKE','%'.$jenis_pembayaran_id.'%')
            ->whereBetween('transaksi_kas_masuk.created_at',[$tanggal_awal,$tanggal_akhir])
            ->sum('transaksi_kas_masuk.nominal');
            $total = $data1+$data2;
            array_push($saldo, [
                'jenis_pembayaran' => $item->nama_jenis_pembayaran,
                'total' => $total,
            ]);
        }
        // dd($saldo)
        return view('saldo.index', compact('saldo','tanggal_awal','tanggal_akhir'));
    }
    public function export_excel()
    {
        $nama_file = 'Laporan_Pembayaran_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new PembayaranExport, $nama_file);
    }
    
}
