<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KategoriSurveyController extends Controller
{
    public function index()
    {
        $data = DB::table('kategori_survey')->whereNull('kategori_survey.deleted_at')->get();
        return view('kategori_survey.index', compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'nama_kategori_survey' => ['required'],
            // 'keterangan_kategori_survey' => ['required'],
        ]);
        $data = [
            'created_by' => Auth::user()->id,
            'created_at' => now(),
            'nama_kategori_survey' => $request->nama_kategori_survey,
        ];
        DB::table('kategori_survey')->insert($data);

        return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    public function edit($id)
    {
        // $id = Crypt::decrypt($id);
        // dd($data);
        $text = "Data tidak ditemukan";
        if($data = DB::select("SELECT * FROM kategori_survey WHERE kategori_survey_id='$id'")){

            $text = '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Nama kompetensi</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="nama_kategori_survey" name="nama_kategori_survey" value="'.$data[0]->nama_kategori_survey.'" required>'.
                    '</div>'.
                '</div>'.
                // '<div class="mb-3 row">'.
                //     '<label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>'.
                //     '<div class="col-sm-10">'.
                //     '<input type="text" class="form-control" id="keterangan_kategori_survey" name="keterangan_kategori_survey" value="'.$data[0]->keterangan_kategori_survey.'" required>'.
                //     '</div>'.
                // '</div>'.
                '<input type="hidden" class="form-control" id="kategori_survey_id" name="kategori_survey_id" value="'.Crypt::encrypt($data[0]->kategori_survey_id) .'" required>';
        }
        return $text;
        // return view('kategori_survey.edit');
    }

    public function update(Request $request){
        $request->validate([
            'nama_kategori_survey' => ['required'],
            // 'keterangan_kategori_survey' => ['required'],
        ]);
        $data = [
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
            'nama_kategori_survey' => $request->nama_kategori_survey,
        ];
        $kategori_survey_id = Crypt::decrypt($request->kategori_survey_id);
        $status_kompetensi = "Aktif";
        DB::table('kategori_survey')->where(['kategori_survey_id' => $kategori_survey_id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Ubah!']);
    }
    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = [
            'deleted_by' => Auth::user()->id,
            'deleted_at' => now(),
        ];
        DB::table('kategori_survey')->where(['kategori_survey_id' => $id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Hapus!']);
    }
    
}
