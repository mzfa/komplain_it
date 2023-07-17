<html>
    <head>
        <title>Print </title>
        @php
            function penyebut($nilai) {
                $nilai = abs($nilai);
                $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                $temp = "";
                if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " belas";
                } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                } else if ($nilai < 200) {
                    $temp = " seratus" . penyebut($nilai - 100);
                } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                } else if ($nilai < 2000) {
                    $temp = " seribu" . penyebut($nilai - 1000);
                } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                }     
                return $temp;
            }

            function terbilang($nilai) {
                if($nilai<0) {
                    $hasil = "minus ". trim(penyebut($nilai));
                } else {
                    $hasil = trim(penyebut($nilai));
                }     		
                return $hasil;
            }

            $terbilang = ucwords(terbilang($data->nominal,$data->nominal));
        @endphp
        <style>
            td{
                font-size: 15px;
                align: center;
            }
        </style>
    </head>

    <body>
        
        <table width="100%">
            <tr>
                <td align="left" colspan="5">
                    <b>RUMAH SAKIT UMUM PEKERJA</b> <br>
                    Jl. Tipar Cakung Cilincing Tanjung Priok
                </td>
            </tr>
            <tr>
                <th colspan="5">
                    <h4>
                        BUKTI KAS KELUAR <br>
                    ({{ $data->no_transaksi }})
                    </h4>
                </th>
            </tr>
            <tr>
                <td colspan="5" align="right">
                    Dibuat Tanggal : <i>{{ date('d-m-Y', strtotime($data->created_at)) }} / {{ $data->username }}</i>
                </td>
            </tr>
            <tr>
                <th colspan="5">
                    <hr style="border-top: 1px dashed black;">
                    <hr style="border-top: 1px dashed black;">
                </th>
            </tr>
            <tr>
                <td align="center" colspan="5">
                    <h4>TELAH DIKELUARKAN SEJUMLAH UANG SEBESAR Rp. {{ number_format($data->nominal) }}</h4>
                </td>
            </tr>
            <tr>
                <td align="right">KEPERLUAN</td>
                <td>:</td>
                <td><b>{{ $data->uraian }}</b></td>
            </tr>
            {{-- <tr>
                <td align="right"><p>TUNAI DITERIMA</p></td>
                <td><p>:</p></td>
                <td align="left"><b>Rp. {{ number_format($data->nominal) }}</b></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="right"><p>DITERIMA DARI</p></td>
                <td><p>:</p></td>
                <td><b>{{ $data->diterima }}</b></td>
            </tr> --}}
            
            {{-- <tr>
                <td align="right">PENANGGUNG JWB KAS</td>
                <td>:</td>
                <td><b>{{ $data->pj }}</b></td>
            </tr> --}}
            <tr>
                <td align="right">KETERANGAN</td>
                <td>:</td>
                <td>
                    <b>@if($data->keterangan == "SPB")
                        {{ $data->no_spb }}
                        @else
                            Non SPB / KASBON
                        @endif</b>
                </td>
            </tr>
            <tr>
                <td align="right">Jenis Pembayaran</td>
                <td>:</td>
                <td>
                    <b>@php
                        if(isset($data->jenis_pembayaran_id)){
                            $pembayaran_id = explode('|',$data->jenis_pembayaran_id);
                            $jumSub = count($pembayaran_id);
                            $hasil = '';
                            for ($i=0; $i<=$jumSub-1; $i++)
                            {
                                $data1 = DB::table('jenis_pembayaran')->where('jenis_pembayaran_id',$pembayaran_id[$i])->first();
                                if(isset($data1)){
                                    $hasil .= $data1->nama_jenis_pembayaran. ', ';

                                }
                                // dump( );
                            }
                            echo $hasil;
                        }else{
                            echo "-";
                        }

                    @endphp</b>
                </td>
            </tr>
            <tr>
                <td align="right">TERBILANG</td>
                <td>:</td>
                <td><b>## <i> {{ $terbilang }} </i> ##</b></td>
            </tr>
            <tr>
                <th colspan="5">
                    <hr style="border-top: 1px dashed black;">
                </th>
            </tr>
        </table>
        <table width="100%">
            <tr>
                {{-- <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> --}}
                {{-- <td align="center">
                    KASIR
                    <br><br><br><br><br><br>
                    ({{ Auth::user()->name }})
                </td>
                <td></td> --}}
                <td align="center">
                    DISETUJUI OLEH
                    <br><br><br><br><br><br>
                    ({{ $data->pj }})
                </td>
                <td align="center">
                    DIBAYAR OLEH
                    <br><br><br><br><br><br>
                    ({{ Auth::user()->name }})
                </td>
                <td align="center">
                    DITERIMA
                    <br><br><br><br><br><br>
                    ({{ $data->diterima }})
                </td>
            </tr>
        </table>

        <script>
            window.print();
        </script>
    </body>
</html>