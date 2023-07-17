<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class KasbonExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')->whereNull('no_spb')->get();
        return view('export.pembayaran_excel', [
            'data' => $data,
        ]);
    }
}