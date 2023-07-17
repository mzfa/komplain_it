@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Laporan Saldo</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('saldo/detail') }}" method="post">
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
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </form>

                        @isset($tanggal_awal)
                            <h2 class="text-center">Periode : {{ $tanggal_awal }} - {{ $tanggal_akhir }}</h2>
                        @endisset
                        @if(!empty($saldo[0]))
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>Jenis Pembayaran</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $total = 0; 
                                    @endphp
                                    @foreach ($saldo as $item)
                                        <tr>
                                            <td>{{ $item['jenis_pembayaran'] }}</td>
                                            <td>Rp. {{ number_format($item['total']) }}</td>
                                        </tr>
                                        @php
                                        $total += $item['total']; 
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <th>Total</th>
                                        <th>Rp. {{ number_format($total) }}</th>
                                    </tr>
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
