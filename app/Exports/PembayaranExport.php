<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class PembayaranExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')->whereNotNull('no_spb')->get();
        return view('export.kasbon_excel', [
            'data' => $data,
        ]);
    }
}