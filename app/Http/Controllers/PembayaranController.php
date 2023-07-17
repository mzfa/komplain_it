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

class PembayaranController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')->whereNotNull('no_spb')->get();
        return view('pembayaran.index', compact('data'));
    }
    public function export_excel()
    {
        $nama_file = 'Laporan_Pembayaran_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new PembayaranExport, $nama_file);
    }
    
}
