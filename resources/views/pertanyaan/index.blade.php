@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Pertanyaan &nbsp; <button type="button" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModal">Tambah</button>&nbsp; <a href="{{ url('pertanyaan/urutan') }}" class="btn btn-info">Mapping Urutan</a> </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>Pertanyaan</th>
                                        <th>Jenis Pertanyaan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>{{ $item->jenis_pertanyaan }}</td>
                                            <td>
                                                <a onclick="return edit({{ $item->pertanyaan_id }})"
                                                    class="btn text-white btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah anda yakin ini dihapus?')" href="{{ url('pertanyaan/delete/' . Crypt::encrypt($item->pertanyaan_id)) }}"
                                                    class="btn text-white btn-danger">Hapus</a>
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
            <form class="needs-validation was-validated" action="{{ url('pertanyaan/store') }}" method="POST" nonvalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah  &nbsp; <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#detailInput">Tambah</button></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Pertanyaan</label>
                            <div class="col-sm-10">
                                <select name="jenis_pertanyaan" id="jenis_pertanyaan" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Jawaban Singkat</option>
                                    <option value="2">Kotak Centang</option>
                                    <option value="3">Jawaban Panjang</option>
                                    <option value="4">Pilihan</option>
                                    <option value="5">Input Range</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Survey</label>
                            <div class="col-sm-10">
                                <select name="jenis_survey_id" id="jenis_survey_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($jenis_survey as $item)
                                    <option value="{{ $item->jenis_survey_id }}">{{ $item->nama_jenis_survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kategori Survey</label>
                            <div class="col-sm-10">
                                <select name="kategori_survey_id" id="kategori_survey_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($kategori_survey as $item)
                                    <option value="{{ $item->kategori_survey_id }}">{{ $item->nama_kategori_survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keterangan_pertanyaan" name="keterangan_pertanyaan" required>
                            </div>
                        </div>
                    </div> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="detailInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jenis pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Jawaban</th>
                            <th>Contoh</th>
                        </tr>
                        <tr>
                            <th>Jawaban Singkat</th>
                            <td>
                                <label for="">Judul</label>
                                <input type="text" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Kotak Centang</th>
                            <td>
                                <div class="checkbox d-inline-block mr-3">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1"> Judul</label>
                                 </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Jawaban Panjang</th>
                            <td>
                                <label for="">Judul</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Range Input</th>
                            <td>
                                <div class="form-group">
                                    <label for="formControlRange">Range input</label>
                                    <input type="range" class="form-control-range" id="formControlRange">
                                 </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="needs-validation was-validated" action="{{ url('pertanyaan/update') }}" method="POST" nonvalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Ubah</h5>
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
                url: "{{ url('pertanyaan/edit') }}/" + id,
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
