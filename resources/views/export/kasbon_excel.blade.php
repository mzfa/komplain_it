<html>
    <head>
        <title>Export Excel</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>Nomor Transaksi</th>
                    <th>Tanggal/Dibuat Oleh</th>
                    <th>Uraian</th>
                    <th>No SPB</th>
                    <th>Nominal</th>
                    <th>Jenis Pembayaran</th>
                    <th>Keterangan</th>
                    <th>PJ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->no_transaksi }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }} / {{ $item->username }}</td>
                        <td>{{ $item->uraian }}</td>
                        <td>{{ $item->no_spb }}</td>
                        <td>Rp. {{ number_format($item->nominal) }}</td>
                        <td>
                            @php
                                if(isset($item->jenis_pembayaran_id)){
                                    $pembayaran_id = explode('|',$item->jenis_pembayaran_id);
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

                            @endphp
                        </td>
                        <td>@if($item->keterangan == "SPB") SPB @else NON SPB @endif</td>
                        <td>
                            {{ $item->pj }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>