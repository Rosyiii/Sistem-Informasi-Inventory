@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">DETAIL TRANSAKSI BARANG MASUK</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <div class="form-fill-detail">
        <div class="form-input">
			<div class="row mb-2">
				<div class="col">
					<label for="id_stok" class="form-label form-fill-label mb-1">Id Stok</label>
					<input type="text" class="form-control form-fill-input" id="id_stok"
						value="{{ $result["id_stok"] }}" readonly>
				</div>
				<div class="col">
					<label for="nama_barang" class="form-label form-fill-label mb-1">Nama Stok</label>
					<input type="text" class="form-control form-fill-input text-capitalize" id="nama_barang"
						value="{{ $result->stok->nama }}" readonly>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col">
					<label for="id_supplier" class="form-label form-fill-label mb-1">Id Supplier</label>
					<input type="text" class="form-control form-fill-input" id="id_supplier"
						value="{{ $result["id_supplier"] }}" readonly>
				</div>
				<div class="col">
					<label for="nama_supplier" class="form-label form-fill-label mb-1">Nama Supplier</label>
					<input type="text" class="form-control form-fill-input text-capitalize" id="nama_supplier" value="{{ $result->supplier->nama }}" readonly>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col">
					<label for="id_user" class="form-label form-fill-label mb-1">Id Petugas</label>
					<input type="text" class="form-control form-fill-input" id="id_user"
						value="{{ $result["id_user"] }}" readonly>
				</div>
				<div class="col">
					<label for="nama_user" class="form-label form-fill-label mb-1">Nama Petugas</label>
                    @if (empty($result->employers->nama))
                        <input type="text" class="form-control form-fill-input text-capitalize" id="nama_user" readonly>
                    @else
                        <input type="text" class="form-control form-fill-input text-capitalize" id="nama_user" value="{{ $result->employers->nama }}" readonly>
                    @endif
				</div>
			</div>
            <div class="mb-2">
                <label for="satuan" class="form-label form-fill-label mb-1">Satuan</label>
                <input type="text" class="form-control form-fill-input" id="satuan" value="{{ $result->stok->satuan }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="jml_stok" class="form-label form-fill-label mb-1">Stok</label>
                <input type="number" class="form-control form-fill-input" id="jml_stok"
                    value="{{ $result['jml_stok'] }}" readonly>
            </div>
            <div class="mb-2">
                <label for="harga_beli" class="form-label form-fill-label mb-1">Harga Beli Satuan</label>
                <input type="number" class="form-control form-fill-input" id="harga_beli"
                    value="{{ $result['harga_beli'] }}" readonly>
            </div>
            <div class="mb-2">
                <label for="harga_total" class="form-label form-fill-label mb-1">Harga Beli Total</label>
                <input type="number" class="form-control form-fill-input" id="harga_total"
                    value="{{ $result['harga_total'] }}" readonly>
            </div>
            <div class="mb-2">
                <label for="tanggalTransaksi" class="form-label form-fill-label mb-1">Tanggal
                    Transaksi</label>
                <input type="text" class="form-control form-fill-input" id="tanggalTransaksi" value="{{ $result['date'] }}"
                    readonly>
            </div>
        </div>
        <div class="row mt-4 form-afirmasi">
            <div class="col d-flex justify-content-center">
                <button class="btn-blue">
                    <a href="/data_transaksi_masuk">OK</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
