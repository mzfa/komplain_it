@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Rekapitulasi Pembayaran &nbsp; <a href="{{ url('pembayaran/export_excel') }}" class="btn btn-primary">Excel</a></h4>
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
                                        <th>PJ</th>
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
                                            <td>@if($item->keterangan == "SPB") <span class="badge badge-primary">SPB</span> @else <span class="badge badge-danger">NON SPB</span> @endif</td>
                                            <td>
                                                <span class="badge badge-primary">{{ $item->pj }}</span> 
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
