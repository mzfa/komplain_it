<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Normalizer\SlugNormalizer;
use Illuminate\Support\Str;

class JenisSurveyController extends Controller
{
    public function index()
    {
        $data = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        return view('jenis_survey.index', compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'nama_jenis_survey' => ['required'],
            // 'keterangan_jenis_survey' => ['required'],
        ]);

        $akronim = Str::slug($request->nama_jenis_survey,'-');
        $data = [
            'created_by' => Auth::user()->id,
            'created_at' => now(),
            'nama_jenis_survey' => $request->nama_jenis_survey,
            'akronim_jenis_survey' => $akronim,
        ];
        DB::table('jenis_survey')->insert($data);

        return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    public function edit($id)
    {
        // $id = Crypt::decrypt($id);
        // dd($data);
        $text = "Data tidak ditemukan";
        if($data = DB::select("SELECT * FROM jenis_survey WHERE jenis_survey_id='$id'")){

            $text = '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Nama kompetensi</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="nama_jenis_survey" name="nama_jenis_survey" value="'.$data[0]->nama_jenis_survey.'" required>'.
                    '</div>'.
                '</div>'.
                // '<div class="mb-3 row">'.
                //     '<label for="staticEmail" class="col-sm-2 col-form-label">Akronim</label>'.
                //     '<div class="col-sm-10">'.
                //     '<input type="text" class="form-control" id="keterangan_jenis_survey" name="keterangan_jenis_survey" value="'.$data[0]->keterangan_jenis_survey.'" required>'.
                //     '</div>'.
                // '</div>'.
                '<input type="hidden" class="form-control" id="jenis_survey_id" name="jenis_survey_id" value="'.Crypt::encrypt($data[0]->jenis_survey_id) .'" required>';
        }
        return $text;
        // return view('jenis_survey.edit');
    }

    public function update(Request $request){
        $request->validate([
            'nama_jenis_survey' => ['required'],
        ]);
        $akronim = Str::slug($request->nama_jenis_survey,'-');
        $data = [
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
            'nama_jenis_survey' => $request->nama_jenis_survey,
            'akronim_jenis_survey' => $akronim,
        ];
        $jenis_survey_id = Crypt::decrypt($request->jenis_survey_id);
        $status_kompetensi = "Aktif";
        DB::table('jenis_survey')->where(['jenis_survey_id' => $jenis_survey_id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Ubah!']);
    }
    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = [
            'deleted_by' => Auth::user()->id,
            'deleted_at' => now(),
        ];
        DB::table('jenis_survey')->where(['jenis_survey_id' => $id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Hapus!']);
    }
    
}
