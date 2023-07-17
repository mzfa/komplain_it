<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class LaporanJenisPembayaran implements FromView
{
    private $jenis_pembayaran_id;
    private $tanggal_awal;
    private $tanggal_akhir;
    private $pemid;
    
    public function __construct(string $jenis_pembayaran_id,string $tanggal_awal,string $tanggal_akhir,string $pemid) 
    {
        $this->jenis_pembayaran_id = $jenis_pembayaran_id;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
        $this->pemid = $pemid;
    }
    public function view(): View
    {
        $data = DB::table('transaksi_kas_masuk')->leftJoin('users', 'transaksi_kas_masuk.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi_kas_masuk.*',
        ])->whereNull('transaksi_kas_masuk.deleted_at')
        ->where('transaksi_kas_masuk.jenis_pembayaran_id','LIKE','%'.$this->jenis_pembayaran_id.'%')
        ->whereBetween('transaksi_kas_masuk.created_at',[$this->tanggal_awal,$this->tanggal_akhir])
        ->get();
        $data2 = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')
        ->where('transaksi.jenis_pembayaran_id','LIKE','%'.$this->jenis_pembayaran_id.'%')
        ->whereBetween('transaksi.created_at',[$this->tanggal_awal,$this->tanggal_akhir])
        ->get();
        return view('export.jenis_pembayaran', [
            'data' => $data,
            'data2' => $data2,
        ]);
    }
}