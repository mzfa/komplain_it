<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Exports\LaporanKasMasukExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanKasMasukController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi_kas_masuk')->leftJoin('users', 'transaksi_kas_masuk.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi_kas_masuk.*',
        ])->whereNull('transaksi_kas_masuk.deleted_at')->get();
        // dd($data);
        return view('laporan_kas_masuk.index', compact('data'));
    }
    public function export_excel()
    {
        $nama_file = 'Laporan_Kas_Masuk_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new LaporanKasMasukExport, $nama_file);
    }
    
}
