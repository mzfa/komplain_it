@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Rekapitulasi Kas Masuk &nbsp; <a href="{{ url('laporan_kas_masuk/export_excel') }}" class="btn btn-primary">Excel</a></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>#</th>
                                        <th>Tanggal/Dibuat Oleh</th>
                                        <th>Uraian</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Metode Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->no_transaksi_kas_masuk }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }} / {{ $item->username }}</td>
                                            <td>{{ $item->uraian }}</td>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>
                                            <td><span class="badge badge-danger">{{ $item->keterangan }}</span></td>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
