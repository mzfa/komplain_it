@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Hakakses &nbsp; <button type="button" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModal">Tambah</button></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level User </th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama_hakakses }}</td>
                                        <td><a onclick="return akses({{ $item->id }})" class="btn text-white btn-info">Kasih Akses</a></td>
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

<div class="modal fade" id="aksesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aksesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{ url('user/update') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aksesModalLabel">User Akses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="tampildata"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection


@push('scripts')
<script>
    function akses(id){
        $.ajax({ 
            type : 'get',
            url : "{{ url('user/edit')}}/"+id,
            // data:{'id':id}, 
            success:function(tampil){
                $('#tampildata').html(tampil);
                $('#aksesModal').modal('show');
            } 
        })
    }
</script>

@endpush