<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')->get();
        $jenis_pembayaran = DB::table('jenis_pembayaran')->whereNull('jenis_pembayaran.deleted_at')->get();
        return view('transaksi.index', compact('data','jenis_pembayaran'));
    }

    public function store(Request $request){
        // dd($request);
        // $request->validate([
        //     'nama_transaksi' => ['required', 'string'],
        // ]);
        $periode = '%'.date('m')."/".date('Y').'%';
        $no_urut = DB::table('transaksi')->where('no_transaksi','like',$periode)->max('no_transaksi');
        // dump($no_urut);
        $urutan = (int) substr($no_urut,0,3);
        $urutan++;
        $bt = substr($no_urut,-7);
        if($bt != date('m')."/".date('Y')){
            $urutan = 1;
        }
        $huruf = "/KK/".date('m')."/".date('Y');
        $no_transaksi = sprintf("%03s",$urutan).$huruf;
        // dd($no_transaksi);
        $keterangan = '';
        if($request->no_spb){
            $keterangan = 'SPB';
        }
        $jenis_pembayaran = '|';
        foreach($request->jenis_pembayaran_id as $item){
            $jenis_pembayaran .= $item.'|';
        }

        // dd($jenis_pembayaran);

        // dd($urutan);
        // $no_transaksi = 1;
        $data = [
            'no_transaksi' => $no_transaksi,
            'uraian' => $request->uraian,
            'no_spb' => $request->no_spb,
            'keterangan' => $keterangan,
            'nominal' => $request->nominal,
            'diterima' => $request->diterima,
            'jenis_pembayaran_id' => $jenis_pembayaran,
            'pj' => $request->pj,
            'created_by' => Auth::user()->id,
            'created_at' => now(),
        ];
        DB::table('transaksi')->insert($data);

        return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    public function edit($id)
    {
        // $id = Crypt::decrypt($id);
        // dd($data);
        $text = "Data tidak ditemukan";
        if($data = DB::table('transaksi')->where(['transaksi_id' => $id])->first()){
            // dd($data);
            $text = '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Uraian</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="uraian" name="uraian" value="'.$data->uraian.'" required>'.
                    '</div>'.
                '</div>'.
                '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">No SPB</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="no_spb" name="no_spb" value="'.$data->no_spb.'">'.
                    '</div>'.
                '</div>'.
                '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Nominal</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="nominal" name="nominal" value="'.$data->nominal.'" required readonly>'.
                    '</div>'.
                '</div>'.
                '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Penerima</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="diterima" name="diterima" value="'.$data->diterima.'" required>'.
                    '</div>'.
                '</div>'.
                '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Penanggung Jawab</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" value="Yoesi Febriansyah, SE." class="form-control" id="pj" name="pj" value="'.$data->pj.'" required>'.
                    '</div>'.
                '</div>'.
                '<input type="hidden" class="form-control" id="transaksi_id" name="transaksi_id" value="'.Crypt::encrypt($data->transaksi_id) .'" required>';
        }
        return $text;
        // return view('admin.transaksi.edit');
    }

    public function update(Request $request){
        $transaksi_id = Crypt::decrypt($request->transaksi_id);
        $keterangan = '';
        if($request->no_spb){
            $keterangan = 'SPB';
        }
        // $no_transaksi = 1;
        $data = [
            'uraian' => $request->uraian,
            'no_spb' => $request->no_spb,
            // 'keterangan' => $keterangan,
            // 'nominal' => $request->nominal,
            'diterima' => $request->diterima,
            'pj' => $request->pj,
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ];
        DB::table('transaksi')->where(['transaksi_id' => $transaksi_id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = [
            'deleted_by' => Auth::user()->id,
            'deleted_at' => now(),
        ];
        DB::table('transaksi')->where(['transaksi_id' => $id])->update($data);
        
        return Redirect::back()->with(['success' => 'Data Berhasil Di Hapus!']);
    }
    public function print($id){
        $id = Crypt::decrypt($id);
        $data = DB::table('transaksi')->leftJoin('users', 'transaksi.created_by', '=', 'users.id')
        ->select([
            'users.username',
            'transaksi.*',
        ])->whereNull('transaksi.deleted_at')->where(['transaksi.transaksi_id' => $id])->first();

        return view('transaksi.print', compact('data'));
    }
    
}
