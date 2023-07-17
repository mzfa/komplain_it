<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class LaporanKasMasukExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('transaksi_kas_masuk')->leftJoin('users', 'transaksi_kas_masuk.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi_kas_masuk.*',
        ])->whereNull('transaksi_kas_masuk.deleted_at')->get();
        return view('export.kas_masuk_excel', [
            'data' => $data,
        ]);
    }
}