@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">List Akun &nbsp; <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#exampleModal">Tambah Akun</button></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table data-table table-striped">
                                    <thead>
                                        <tr class="ligth">
                                            <th>No</th>
                                            <th>Nama Akun</th>
                                            <th>No Telp</th>
                                            <th>Sign</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($akun as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->nama_akun }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a class="btn btn-warning" onclick="edit('{{ $item->akun_id }}')">Edit</a>
                                                <a target="_blank" class="btn btn-primary text-white" href="{{ url('list_akun/qr/'.$item->code_wa) }}">QR</a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="needs-validation was-validated" action="{{ url('list_akun/store') }}" method="POST" nonvalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="validationCustom03">Nama Akun</label>
                            <input type="text" class="form-control" id="validationCustom03" required="" name="nama_akun">
                            <div class="invalid-feedback">
                                Nama Akun Wajib di isi.
                            </div>
                         </div>
                        <div class="form-group">
                            <label for="validationCustom04">No WA</label>
                            <input type="text" class="form-control" id="validationCustom04" required="" name="no_telp" value="62">
                            <div class="invalid-feedback">
                                Nomor WA Wajib di isi.
                            </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="needs-validation was-validated" action="{{ url('list_akun/update') }}" method="POST" nonvalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="tampildata"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function edit(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('list_akun/edit') }}/" + id,
                // data:{'id':id}, 
                success: function(tampil) {
                    $('#tampildata').html(tampil);
                    $('#editModal').modal('show');
                }
            })
        }
        function qr(id) {
            console.log('ok')
            $.ajax({
                type: 'get',
                url: "{{ url('list_akun/qr') }}/" + id,
                // data:{'id':id}, 
                success: function(tampil) {
                    var image = document.createElement("IMG");
                    image.alt = "Alt information for image";
                    image.setAttribute('class', 'photo');
                    image.src='d'+tampil;
                    $("#tampildata").html(image);
                    // $('#tampildata').html(tampil);
                    $('#editModal').modal('show');
                }
            })
        }
    </script>
@endpush