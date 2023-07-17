@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Semua Transaksi Kas Keluar &nbsp; <button type="button" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModal">Tambah</button></h4>
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
                                        <th>No SPB</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>#</th>
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
                                            <td>@if($item->keterangan == "SPB") <span class="badge badge-primary">SPB</span> @else <span class="badge badge-danger">NON SPB / KASBON</span> @endif</td>
                                            <td>
                                                <a onclick="return edit({{ $item->transaksi_id }})"
                                                    class="btn text-white btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah anda yakin ini dihapus?')" href="{{ url('transaksi/delete/' . Crypt::encrypt($item->transaksi_id)) }}"
                                                    class="btn text-white btn-danger">Hapus</a>
                                                <a onclick="return confirm('Apakah anda yakin print ini?')" target="_blank" href="{{ url('transaksi/print/' . Crypt::encrypt($item->transaksi_id)) }}"
                                                    class="btn text-white btn-primary">Print</a>
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
            <form class="needs-validation was-validated" action="{{ url('transaksi/store') }}" method="POST" nonvalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Uraian</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="uraian" name="uraian" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">No SPB</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="no_spb" name="no_spb">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Nominal</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nominal" name="nominal" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Penerima</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="diterima" name="diterima" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-12">
                                <input type="text" value="Yoesi Febriansyah, SE." class="form-control" id="pj" name="pj" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Jenis Pembayaran</label>
                            <div class="container">
                                @foreach($jenis_pembayaran as $item)
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" value="{{ $item->jenis_pembayaran_id }}" class="custom-control-input" name="jenis_pembayaran_id[]" id="customCheck{{ $loop->iteration }}">
                                    <label class="custom-control-label" for="customCheck{{ $loop->iteration }}">{{ $item->nama_jenis_pembayaran }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="input-group mb-4">
                            <div class="input-group-prepend">
                               <div class="input-group-text">
                                  <input type="checkbox" value="spb" name="keterangan" aria-label="Text input with checkbox">
                               </div>
                            </div>
                            &nbsp; Menggunakan SPB
                         </div> --}}
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
            <form class="needs-validation was-validated" action="{{ url('transaksi/update') }}" method="POST" nonvalidate>
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
                url: "{{ url('transaksi/edit') }}/" + id,
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
