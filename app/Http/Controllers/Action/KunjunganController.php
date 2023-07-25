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

class KunjunganController extends Controller
{
    public function index()
    {
        // $data = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        return view('action.kunjungan.index');
    }
    public function detail(Request $request)
    {
        // $data = DB::connection('PHIS-V2')
        // ->table('pemesanan_brg')
        // ->leftJoin('supplier', 'supplier.supplier_id', '=', 'pemesanan_brg.supplier_id')
        // ->where('kode_pesanan',$request->kode_pesanan)
        // ->whereNull('pemesanan_brg.status_batal')
        // // ->whereNull('status_batal')
        // ->first();
        $no_mr = $request->no_mr;
        $data = DB::connection('PHIS-V2')
        ->table('registrasi')
        ->leftJoin('pasien', 'pasien.pasien_id', '=', 'registrasi.pasien_id')
        ->where('registrasi.pasien_id',$no_mr)
        ->whereNull('registrasi.status_batal')
        ->get();
        // dd($data);
        return view('action.kunjungan.index', compact('data'));
    }
    public function action($status, $id){
        $regid = Crypt::decrypt($id);
        if($status == 'aktif'){
            $data = [
                'tgl_keluar' => null
            ];
            DB::connection('PHIS-V2')->table('registrasi')->where(['registrasi_id' => $regid])->update($data);
        }else{
            $data = [
                'tgl_keluar' => date('Y-m-d H:i:s')
            ];
            DB::connection('PHIS-V2')->table('registrasi')->where(['registrasi_id' => $regid])->update($data);
        }
        return Redirect::back()->with(['success' => 'Data Berhasil Di Ubah!']);

        // return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    
}
