@extends('layouts.main')

@section('fill')
<!-- Fill Title -->
<div class="form-fill row">
    <h1 class="form-fill-title-text" style="margin-bottom: 0px;">{{ $tittle }}</h1>
    <div class="row d-flex justify-content-end align-items-center">
        <div class="m-4 my-2 me-4" style="width: auto;">
            <a class="btn btn-blue-purple" href="/tambah_stok">+ Transaksi Barang Masuk</a>
        </div>
        
    </div>
    <div class="form-fill-title-breakline row"></div>
</div>
<!-- Fill -->
<div class="row mt-5" style="height: 540px;">
    <div class="table-responsive small fill-karyawan">
        <table class="table table-sm table-hover list-table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 4%;">No</th>
                    <th scope="col" style="width: 13%;">ID</th>
                    <th scope="col" style="width: 13%;">ID Supplier</th>
                    <th scope="col" style="width: 35%;">Nama</th>
                    <th scope="col" style="width: 6%;">Satuan</th>
                    <th scope="col" style="width: 5%;">Jumlah Barang</th>
                    <th scope="col" style="width: 10%;">Harga Beli</th>
                    <th scope="col" style="width: 15%;">Nama Admin</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" style="font-size: 15px; vertical-align: middle;">
				@foreach ($transactions as $transaction)
				<tr>
					<td>{{ ($transactions->currentPage() -1) * $transactions->links()->paginator->perPage() + $loop->iteration }}</td>
					<td>{{ $transaction["id_transaksi_masuk"] }}</td>
                    <td>{{ $transaction["id_supplier"] }}</td>
					<td class="text-capitalize">{{ substr($transaction->stok->nama, 0, 20) }}</td>
                    <td>{{ $transaction->stok->satuan }}</td>
					<td>{{ $transaction["jml_stok"] }}</td>
					<td>{{ $transaction["harga_beli"] }}</td>
					@if (empty($transaction->employers->nama))
                        <td class="fw-bold">TERHAPUS</td>
                    @else
                        <td class="text-capitalize">{{ substr($transaction->employers->nama, 0, 9) }}</td>
                    @endif
					<td>
						<div class="buton-basic">
							<a class="btn btn-purple" href="/detail_transaksi_masuk/{{ $transaction["id_transaksi_masuk"] }}">Detail</a>
						</div>
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
