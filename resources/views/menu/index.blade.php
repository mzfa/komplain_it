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
                            <table class="table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>Nama Menu</th>
                                        <th>Url</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu as $item)
                                        <tr class="bg-info">
                                            <td>
                                                <h5 class="text-white">{{ strtoupper($item['nama_menu']) }}</h5>
                                                @if ($item['parent_id'] == 0)
                                                @else
                                                    <h5 class="text-primary">&nbsp;&nbsp;&nbsp;
                                                        {{ strtoupper($item['nama_menu']) }}</h5>
                                                @endif
                                            </td>
                                            <td>{{ $item['url_menu'] }}</td>
                                            <td>
                                                <a onclick="return edit({{ $item['menu_id'] }})"
                                                    class="btn text-white btn-warning"><i class="ri-edit-2-line"></i>Edit</a>
                                                <a onclick="return tambahsubmenu({{ $item['menu_id'] }})"
                                                    class="btn text-white btn-primary"><i class="ri-add-fill"></i> Tambah</a>
                                                    @if(empty($item['submenu']))
                                                    <a onclick="return confirm('Yakin ingin di hapus?')" href="{{ url('menu/delete/' . Crypt::encrypt($item['menu_id'])) }}"
                                                        class="btn text-white btn-danger"><i class="ri-delete-bin-line"></i> Hapus</a>
                                                    @endif
                                            </td>
                                        </tr>
                                        @foreach($item['submenu'] as $submenu)
                                        <tr>
                                            <td>
                                                <p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($submenu['nama_menu']) }}</p>
                                            </td>
                                            <td>{{ $submenu['url_menu'] }}</td>
                                            <td>
                                                <a onclick="return edit({{ $submenu['menu_id'] }})"
                                                    class="btn text-white btn-info"><i class="ri-edit-2-line"></i>Edit</a>
                                                <a onclick="return confirm('Yakin ingin di hapus?')" href="{{ url('menu/delete/' . Crypt::encrypt($submenu['menu_id'])) }}"
                                                    class="btn text-white btn-danger"><i class="ri-delete-bin-line"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
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

<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('menu/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_menu" name="url_menu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_menu" name="icon_menu">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="subMenuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="subMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('menu/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="url_menu" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_menu" name="url_menu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_menu" name="icon_menu">
                        </div>
                    </div>
                    <input type="hidden" name="parent_id" id="parent_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('menu/update') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <div id="tampildata"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                url: "{{ url('menu/edit') }}/" + id,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#editModal').modal('show');
                }
            })
        }

        function tambahsubmenu(id) {
            $('#parent_id').val(id);
            $('#subMenuModal').modal('show');
        }
    </script>
@endpush
