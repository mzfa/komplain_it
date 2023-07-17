<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UbahSupplierController extends Controller
{
    public function index()
    {
        // $data = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        return view('action.ubah_supplier.index');
    }
    public function detail(Request $request)
    {
        $data = DB::connection('PHIS-V2')
        ->table('pemesanan_brg')
        ->leftJoin('supplier', 'supplier.supplier_id', '=', 'pemesanan_brg.supplier_id')
        ->where('kode_pesanan',$request->kode_pesanan)
        ->whereNull('pemesanan_brg.status_batal')
        // ->whereNull('status_batal')
        ->first();
        $supplier = DB::connection('PHIS-V2')
        ->table('supplier')
        ->whereNull('supplier.status_batal')
        ->get();
        // dd($data);
        return view('action.ubah_supplier.index', compact('data','supplier'));
    }
    public function store(Request $request){
        // dd($request);
        $data = [
            'supplier_id' => $request->supplier_id,
        ];
        DB::connection('PHIS-V2')->table('pemesanan_brg')->where(['pemesanan_brg_id' => $request->pemesanan_brg_id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Ubah!']);

        // return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    
}
