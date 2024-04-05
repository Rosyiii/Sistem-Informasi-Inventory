@extends('layouts.main')

@section('fill')
<div class="col">
    <div class="form-fill row">
        <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
        <div class="form-fill-title-breakline row mt-0"></div>
    </div>
    <div class="row mt-3">
        <div class="form-fill-detail">
            <div class="form-input">
                <div class="mb-2">
                    <label for="id_stock" class="form-label form-fill-label mb-1">ID</label>
                    <input class="form-control form-fill-input" type="text" id="id_stock"
                        value="{{ $result["id_stok"] }}" disabled readonly>
                </div>
				<div class="row mb-2">
					<div class="col">
						<label for="id_supplier" class="form-label form-fill-label mb-1">Id Supplier</label>
						<input type="text" class="form-control form-fill-input" id="id_supplier"
							value="{{ $result["id_supplier"] }}" readonly>
					</div>
					<div class="col">
						<label for="nama_supplier" class="form-label form-fill-label mb-1">Nama Supplier</label>
						<input type="text" class="form-control form-fill-input" id="nama_supplier"
							value="{{ $result->supplier->nama }}" readonly>
					</div>
				</div>
                <div class="mb-2">
                    <label for="nama" class="form-label form-fill-label mb-1">Nama</label>
                    <input type="text" class="form-control form-fill-input" id="nama" value="{{ $result["nama"] }}"
                        readonly>
                </div>
                <div class="mb-2">
                    <label for="jml_stok" class="form-label form-fill-label mb-1">Stok</label>
                    <input type="number" class="form-control form-fill-input" id="jml_stok"
                        value="{{ $result["jml_stok"] }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="satuan" class="form-label form-fill-label mb-1">Satuan</label>
                    <input type="text" class="form-control form-fill-input" id="satuan" value="{{ $result["satuan"] }}"
                        readonly>
                </div>
                <div class="mb-2">
                    <label for="hargaBeli" class="form-label form-fill-label mb-1">Harga Beli</label>
                    <input type="number" class="form-control form-fill-input" id="hargaBeli"
                        value="{{ $result["harga_beli"] }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="biayaPesan" class="form-label form-fill-label mb-1">Biaya Pesan</label>
                    <input type="number" class="form-control form-fill-input" id="biayaPesan"
                        value="{{ $result["harga_beli"] }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="leadTime" class="form-label form-fill-label mb-1">Waktu antar/Lead Time (satuan
                        hari)</label>
                    <input type="number" class="form-control form-fill-input" id="leadTime"
                        value="{{ $result["waktu_antar"] }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="biayaSimpan" class="form-label form-fill-label mb-1">Biaya Simpan</label>
                    <input type="number" class="form-control form-fill-input" id="biayaSimpan"
                        value="{{ $result["biaya_simpan"] }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="hargaJual" class="form-label form-fill-label mb-1">Harga Jual</label>
                    <input type="number" class="form-control form-fill-input" id="hargaJual"
                        value="{{ $result["harga_jual"] }}" readonly>
                </div>
            </div>
            <div class="row mt-4 form-afirmasi">
                <div class="col d-flex @if(auth()->user()->jabatan === 'Owner') justify-content-end @else justify-content-center @endif">
					<div class="buton-basic">
						<a href="/data_stok" class="btn btn-blue">OK</a>
					</div>
				</div>
                @can('owner')
                    <div class="col">
                        <div class="buton-basic">
                            <a href="/edit_stok/{{ $result["id_stok"] }}" class="btn btn-white-black">Edit</a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>

@endsection
