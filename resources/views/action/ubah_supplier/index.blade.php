@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <label for="">Nomor PO</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="kode_pesanan" class="form-control" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary btn-block  bg-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <form action="{{ url('ubah_supplier/store') }}" method="post">
                            @csrf
                        @isset($data)
                            <table class="table table-striped">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <td>{{ $data->kode_pesanan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pesanan</th>
                                    <td>{{ $data->tgl_pesanan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal ACC</th>
                                    <td>{{ $data->tgl_acc }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Supplier Sebelumnya</th>
                                    <td>{{ $data->nama_supplier }}</td>
                                </tr>
                                <tr>
                                    <th>Ubah Supplier</th>
                                    <td>
                                        <select name="supplier_id" class="form-control select2" >
                                            @foreach($supplier as $item)
                                            <option value="{{ $item->supplier_id }}">{{ $item->nama_supplier }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="pemesanan_brg_id" value="{{ $data->pemesanan_brg_id }}">
                            <button type="submit" class="btn btn-primary btn-block bg-primary">Simpan</button>
                            @if($item->status_terima == 1)
                            <a onclick="return confirm('Apakah anda yakin ingin anda batalkan terima?')" href="{{ url('ubah_supplier/batal_terima/'. $item->pemesanan_brg_id) }}" class="btn btn-danger">Batal Terima</a>
                            @endif
                        @endisset
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function edit(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('jenis_survey/edit') }}/" + id,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#editModal').modal('show');
                }
            })
        }
    </script>
@endpush
