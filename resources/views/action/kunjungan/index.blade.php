@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Riwayat Kunjungan &nbsp; </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label for="">Nomor MR</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="no_mr" class="form-control" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary btn-block  bg-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <form action="{{ url('kunjungan/store') }}" method="post">
                            @csrf
                            @isset($data)
                            <div class="table-responsive">
                                <table id="datatable" class="table data-table table-striped">
                                    <thead>
                                        <tr class="ligth">
                                            <th>Nama Pasien</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Pulang</th>
                                            <th>Jenis Rawat</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->nama_pasien }}</td>
                                                <td>{{ $item->tgl_masuk }}</td>
                                                <td>{{ $item->tgl_keluar }}</td>
                                                <td>{{ $item->jenis_rawat }}</td>
                                                <td>
                                                    @if(!empty($item->tgl_keluar))
                                                    <a onclick="return confirm('Apakah anda yakin ini ingin diaktifkan kembali?')" href="{{ url('kunjungan/aktif/' . Crypt::encrypt($item->registrasi_id)) }}"
                                                        class="btn text-white btn-danger">Kembalikan</a>
                                                    @else
                                                    <a onclick="return confirm('Apakah anda yakin ini ingin dipulangkan?')" href="{{ url('kunjungan/pulang/' . Crypt::encrypt($item->registrasi_id)) }}"
                                                        class="btn text-white btn-warning">Pulangkan</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block bg-primary">Simpan</button>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
