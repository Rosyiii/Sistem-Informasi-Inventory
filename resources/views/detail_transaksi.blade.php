@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0 mb-0"></div>
</div>
<div class="row" id="printarea">
    <div class="row-auto detail-transaksi-header">
        <h1 class="title-detail-transaksi">Agung Rejeki Elektro</h1>
        <p class="normal-text">Jl. Raya Pasar Pedan, Poloharjo, Sobayan, Pedan, Klaten, Jawa Tengah</p>
        @if (empty($main->employers->nama))
            <p class="normal-text mb-0">Nama Petugas : <span class="fw-bold">TERHAPUS</span></p>
        @else
            <p class="normal-text mb-0">ID Transaksi : <span>{{ $main->employers->nama }}</span></p>
        @endif
        <p class="normal-text mb-0">ID Transaksi : <span>{{ $main["id_transaksi"] }}</span></p>
        <p class="normal-text">Tanggal Transaksi : <span>{{ $main["date"] }}</span></p>
    </div>
    <div class="table-responsive small fill-karyawan detail-transaksi">
        <table class="table table-sm list-table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 3%;">No</th>
                    <th scope="row" style="width: 20%;">
                        <p class="mb-0">ID</p>
                        <p class="mb-0">Nama</p>
                    </th>
                    <th scope="col" style="width: 10%;">Jumlah</th>
                    <th scope="col" style="width: 10%;">Satuan</th>
                    <th scope="col" style="width: 15%;">Harga per Satuan</th>
                    <th scope="col" style="width: 15%;">Total Harga</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="row">
                        <span>{{ $transaction["id_stok"] }}</span>
                        <span class="text-capitalize">{{ $transaction->stok->nama }}</span>
                    </td>
                    <td>{{ $transaction["jumlah"] }}</td>
                    <td>{{ $transaction->stok->satuan }}</td>
                    <td>{{ $transaction["harga_satuan"] }}</td>
                    <td>{{ $transaction["total_harga"] }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <td class="pe-5" colspan="5">
                        <div class="d-flex justify-content-end me-5">Jumlah Total</div>
                    </td>
                    <td><span>{{ $main["total_harga"] }}</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row mt-2" id="button-afirmasi">
    <div class="col d-flex justify-content-end buton-basic">
        <a class="btn btn-purple" href="/data_transaksi">OK</a>
    </div>
    <div class="col">
        <button class="btn-blue">Cetak</button>
    </div>
</div>

@endsection
