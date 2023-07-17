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

class PertanyaanController extends Controller
{
    public function index()
    {
        $data = DB::table('pertanyaan')->whereNull('pertanyaan.deleted_at')->get();
        $jenis_survey = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        $kategori_survey = DB::table('kategori_survey')->whereNull('kategori_survey.deleted_at')->get();
        return view('pertanyaan.index', compact('data','jenis_survey','kategori_survey'));
    }
    public function urutan()
    {
        $jenis_survey = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        return view('pertanyaan.urutan', compact('jenis_survey'));
    }
    public function urutan_detail(Request $request)
    {
        // dd($request);
        $data = DB::table('pertanyaan')->whereNull('pertanyaan.deleted_at')->where('pertanyaan.jenis_survey_id',$request->jenis_survey_id)->orderBy('urutan','asc')->get();
        $jenis_survey = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        $kategori_survey = DB::table('kategori_survey')->whereNull('kategori_survey.deleted_at')->get();
        return view('pertanyaan.urutan', compact('data','jenis_survey','kategori_survey'));
    }
    public function ubah_urutan(Request $request)
    {
        // dd($request);
        // $data = DB::table('pertanyaan')->whereNull('pertanyaan.deleted_at')->get();
        // $jenis_survey = DB::table('jenis_survey')->whereNull('jenis_survey.deleted_at')->get();
        // $kategori_survey = DB::table('kategori_survey')->whereNull('kategori_survey.deleted_at')->get();
        // return view('pertanyaan.index', compact('data','jenis_survey','kategori_survey'));
        $data = [];
        foreach($request->pertanyaan_id as $key => $item){
            // dump($item, $key);
            $item = [
                'pertanyaan_id' => $item,
                'urutan' => $request->urutan[$key],
            ];
            array_push($data,$item);
        }
        // dump.($data);
        DB::table('pertanyaan')->upsert($data, 'pertanyaan_id');
        return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
        // $data = [
        //     'created_by' => Auth::user()->id,
        //     'created_at' => now(),
        //     'pertanyaan' => $request->pertanyaan,
        //     'jenis_pertanyaan' => $request->jenis_pertanyaan,
        //     'jenis_survey_id' => $request->jenis_survey_id,
        //     'kategori_survey_id' => $request->kategori_survey_id,
        // ];
        // DB::table('pertanyaan')->insert($data);
        // DB::table('pertanyaan')->upsert($data, 'pertanyaan_id');
    }
    public function store(Request $request){
        $request->validate([
            'pertanyaan' => ['required'],
            'jenis_pertanyaan' => ['required'],
            'jenis_survey_id' => ['required'],
            'kategori_survey_id' => ['required'],
            // 'keterangan_pertanyaan' => ['required'],
        ]);
        // dd($request);

        $akronim = Str::slug($request->pertanyaan,'-');
        $data = [
            'created_by' => Auth::user()->id,
            'created_at' => now(),
            'pertanyaan' => $request->pertanyaan,
            'jenis_pertanyaan' => $request->jenis_pertanyaan,
            'jenis_survey_id' => $request->jenis_survey_id,
            'kategori_survey_id' => $request->kategori_survey_id,
        ];
        DB::table('pertanyaan')->insert($data);

        return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan!']);
    }

    public function edit($id)
    {
        // $id = Crypt::decrypt($id);
        // dd($data);
        $text = "Data tidak ditemukan";
        if($data = DB::select("SELECT * FROM pertanyaan WHERE pertanyaan_id='$id'")){

            $text = '<div class="mb-3 row">'.
                    '<label for="staticEmail" class="col-sm-2 col-form-label">Nama kompetensi</label>'.
                    '<div class="col-sm-10">'.
                    '<input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="'.$data[0]->pertanyaan.'" required>'.
                    '</div>'.
                '</div>'.
                // '<div class="mb-3 row">'.
                //     '<label for="staticEmail" class="col-sm-2 col-form-label">Akronim</label>'.
                //     '<div class="col-sm-10">'.
                //     '<input type="text" class="form-control" id="keterangan_pertanyaan" name="keterangan_pertanyaan" value="'.$data[0]->keterangan_pertanyaan.'" required>'.
                //     '</div>'.
                // '</div>'.
                '<input type="hidden" class="form-control" id="pertanyaan_id" name="pertanyaan_id" value="'.Crypt::encrypt($data[0]->pertanyaan_id) .'" required>';
        }
        return $text;
        // return view('pertanyaan.edit');
    }

    public function update(Request $request){
        $request->validate([
            'pertanyaan' => ['required'],
        ]);
        $akronim = Str::slug($request->pertanyaan,'-');
        $data = [
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
            'pertanyaan' => $request->pertanyaan,
            'jenis_pertanyaan' => $akronim,
            'jenis_survey_id' => $akronim,
            'kategori_survey_id' => $akronim,
        ];
        $pertanyaan_id = Crypt::decrypt($request->pertanyaan_id);
        $status_kompetensi = "Aktif";
        DB::table('pertanyaan')->where(['pertanyaan_id' => $pertanyaan_id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Ubah!']);
    }
    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = [
            'deleted_by' => Auth::user()->id,
            'deleted_at' => now(),
        ];
        DB::table('pertanyaan')->where(['pertanyaan_id' => $id])->update($data);
        return Redirect::back()->with(['success' => 'Data Berhasil Di Hapus!']);
    }
    
}
