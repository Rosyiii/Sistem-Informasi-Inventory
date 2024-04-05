@extends('layouts.main')

@section('fill')
<!-- Fill Title -->
<div class="form-fill row">
    <h1 class="form-fill-title-text" style="margin-bottom: 0px;">{{ $tittle }}</h1>
    <div class="row d-flex justify-content-end align-items-center">
        <div class="my-2 buton-basic" style="width: auto;">
            <a href="/tambah_transaksi" class="btn btn-blue-purple">+ Transaksi</a>
        </div>
        @cannot('karyawan')
            <div class="m-4 my-2 buton-basic" style="width: auto;">
                <a href="/data_transaksi_masuk" class="btn btn-blue-purple">Transaksi Masuk</a>
            </div>
        @endcannot
    </div>
    <div class="form-fill-title-breakline row"></div>
</div>
<!-- Fill -->
<div class="row mt-4">
    <div class="col d-flex justify-content-start ms-3">
        <form action="/data_transaksi/Hari" class="justify-content-center me-4" method="GET">            
            <button type="submit" class="btn btn-blue">Hari</button>
        </form>
        <form action="/data_transaksi/Bulan" class="justify-content-center me-4" method="GET">            
            <button type="submit" class="btn btn-blue">Bulan</button>
        </form>
        <form action="/data_transaksi/Tahun" class="justify-content-center" method="GET">            
            <button type="submit" class="btn btn-blue">Tahun</button>
        </form>
    </div>
</div>
<div class="row mt-2" style="height: 540px;">
    <div class="table-responsive small fill-karyawan">
        <table class="table table-sm table-hover list-table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 7%;">No</th>
                    <th scope="col" style="width: 25%;">ID</th>
                    <th scope="col" style="width: 25%;">Nama Petugas</th>
                    <th scope="col" style="width: 25%;">Tanggal Transaksi</th>
                    <th scope="col" style="width: 20%;">Total Harga</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($transactions as $transaction)

                <tr>
                    <td>{{ ($transactions->currentPage() -1) * $transactions->links()->paginator->perPage() + $loop->iteration }}</td>
                    @if (empty($transaction->id_transaksi))
                        <td></td>
                    @else
                        <td>{{ $transaction->id_transaksi }}</td>
                    @endif
                    @if (empty($transaction->employers->nama))
                        <td></td>
                    @else
                        <td class="text-capitalize">{{ substr($transaction->employers->nama, 0, 30) }}</td>
                    @endif
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->total_harga }}</td>
					<td>
                        @if (!empty($transaction->id_transaksi))
                            <div class="buton-basic">
                                <a class="btn btn-purple" href="/detail_transaksi/{{ $transaction['id_transaksi'] }}">Detail</a>
                            </div>
                        @endif
					</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $transactions->onEachSide(1)->links() }}
</div>
@endsection
