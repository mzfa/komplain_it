<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class PesanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $pesan_id;
    private $gambar;

    public function __construct(int $pesan_id,string $gambar) 
    {
        $this->pesan_id = $pesan_id;
        $this->gambar = $gambar;
    }
    public function model(array $row)
    {
        $nomor = '62';
        if($row[0] != null){
            $nomor = strval($row[0]);
        }
        // var_dump();
        if(substr($nomor,0,2) == '62'){
            if($data = DB::table('pesan')->where(['pesan_id' => $this->pesan_id])->first()){
                $pesan = $data->isi_pesan;
                for ($i=1; $i < 15; $i++) { 
                    if(isset($row[$i])){
                        $pesan = str_replace("[var".$i."]",$row[$i],$pesan);
                    }
                }
                $data = [
                    "receiver" => $nomor,
                    "message" => [
                        "text" => $pesan,
                    ],
                ];
                if($this->gambar != ''){
                    $data = [
                        "receiver" => $nomor,
                        "message" => [
                            "image" => [
                                'url' => $this->gambar,
                            ],
                            "caption" => $pesan,
                        ],
                    ];
                }
                // dd($data);
                $url = "http://192.168.0.18:8060/chats/send?id=test";
                // API WA
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen(json_encode($data))
                ));
        
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
        
                curl_close($curl);
                // die();
            }
        }
        // dump($this->gambar);
    }
}
