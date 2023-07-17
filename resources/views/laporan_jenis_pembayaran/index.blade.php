@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Rekapitulasi Jenis Pembayaran &nbsp; </h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('laporan_jenis_pembayaran/detail') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" @if(isset($tanggal_awal)) value="{{ $tanggal_awal }}" @endif name="tanggal_awal" id="tanggal_awal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" @if(isset($tanggal_akhir)) value="{{ $tanggal_akhir }}" @endif id="tanggal_akhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Jenis Pembayaran</label>
                                        <select name="jenis_pembayaran_id" id="jenis" class="form-control">
                                            @foreach($jenis_pembayaran as $item)
                                                <option @isset($pemid) @if($pemid == $item->jenis_pembayaran_id) selected @endif @endif value="{{ $item->jenis_pembayaran_id }}">{{ $item->nama_jenis_pembayaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </form>

                        <br>
                        @isset($tanggal_awal)
                            <h2 class="text-center">Periode : {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h2>
                            <a href="{{ url('laporan_jenis_pembayaran/export_excel/'.$jenis_pembayaran_id.'/'.$tanggal_awal.'/'.$tanggal_akhir.'/'.$pemid) }}" class="btn btn-primary w-100">Excel</a><br>
                        @endisset
                        @if(!empty($data[0]) || !empty($data1[0]))
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>#</th>
                                        <th>Uraian</th>
                                        <th>Tanggal/Dibuat Oleh</th>
                                        <th>Nominal</th>
                                        <th>Jenis Kas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->no_transaksi_kas_masuk }}</td>
                                            <td>{{ $item->uraian }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }} / {{ $item->username }}</td>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>
                                            <td>Kas Masuk</td>
                                            <td><span class="badge badge-danger">{{ $item->keterangan }}</span></td>
                                        </tr>
                                    @endforeach
                                    @foreach ($data2 as $item)
                                        <tr>
                                            <td>{{ $item->no_transaksi }}</td>
                                            <td>{{ $item->uraian }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }} / {{ $item->username }}</td>
                                            <td>Rp. {{ number_format($item->nominal) }}</td>
                                            <td>Kas Keluar</td>
                                            <td><span class="badge badge-danger">{{ $item->keterangan }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
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
