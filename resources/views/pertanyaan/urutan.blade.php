@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Mapping Urutan Pertanyaan &nbsp;</h4>
                            <br>
                        </div>
                    </div>
                    <form action="{{ url('pertanyaan/urutan') }}" method="post">
                        @csrf
                        <div class="row p-3">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Survey</label>
                            <div class="col-sm-8">
                                <select name="jenis_survey_id" id="jenis_survey_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($jenis_survey as $item)
                                    <option value="{{ $item->jenis_survey_id }}">{{ $item->nama_jenis_survey }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary btn-block">Cari</button>
                            </div>
                        </div>
                    </form>
                    @if(!empty($data))
                    <div class="card-body">
                        <form action="{{ url('pertanyaan/urutan_detail') }}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-striped">
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
                                                    <input type="hidden" name="pertanyaan_id[]" value="{{ $item->pertanyaan_id }}">
                                                    <input type="number" name="urutan[]" value="{{ $item->urutan }}" class="form-control">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
