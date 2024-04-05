@extends('layouts.main')
@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <form action="/edit_stok/{{ $result["id_stok"] }}" class="form-fill-detail" method="POST">
        @csrf
        <div class="form-input">
            <div class="mb-2">
                <label for="id_stok" class="form-label form-fill-label mb-1">ID</label>
                <input class="form-control form-fill-input" type="text" id="id_stok" name="id_stok"
                    value="{{ $result["id_stok"] }}" readonly>
            </div>
            <div class="mb-2">
                <label for="id_supplier" class="form-label form-fill-label mb-1">Id Supplier</label>
                <input class="form-control form-fill-input @error('id_supplier') is-invalid @enderror" type="text" id="id_supplier" name="id_supplier"
                    value="{{ old('id_supplier', $result["id_supplier"]) }}" placeholder="Id dari Supplier Stok Barang" required>
                    @error('id_supplier')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama</label>
                <input type="text" class="form-control form-fill-input @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $result["nama"]) }}" placeholder="Nama Barang" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="jml_stok" class="form-label form-fill-label mb-1">Stok</label>
                <input type="number" class="form-control form-fill-input @error('jml_stok') is-invalid @enderror" id="jml_stok" name="jml_stok"
                    value="{{ old('jml_stok', $result["jml_stok"]) }}" placeholder="Jumlah Stok Barang" required>
                    @error('jml_stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="satuan" class="form-label form-fill-label mb-1">Satuan</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="satuan" name="satuan"
                    style="font-size: 16px; border-radius: 10px;">
                    <option value="{{ old('satuan', $result["satuan"]) }}">{{ old('satuan', $result["satuan"]) }}</option>
                    <option value="Unit">Unit</option>
                    <option value="Meter">Meter</option>
                    <option value="Pack">Pack</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="harga_beli" class="form-label form-fill-label mb-1">Harga Beli</label>
                <input type="number" class="form-control form-fill-input @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli"
                    value="{{ old('harga_beli', $result["harga_beli"]) }}" placeholder="Harga pembelian per satuan" required>
                    @error('harga_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="biaya_pesan" class="form-label form-fill-label mb-1">Biaya Pesan</label>
                <input type="number" class="form-control form-fill-input @error('biaya_pesan') is-invalid @enderror" id="biaya_pesan" name="biaya_pesan"
                    value="{{ old('biaya_pesan', $result["biaya_pesan"]) }}" placeholder="Biaya ongkir sekali pesan" required>
                    @error('biaya_pesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="waktu_antar" class="form-label form-fill-label mb-1">Waktu antar/Lead Time
                    (satuan
                    hari)</label>
                <input type="number" class="form-control form-fill-input @error('waktu_antar') is-invalid @enderror" id="waktu_antar" name="waktu_antar"
                    value="{{ old('waktu_antar', $result["waktu_antar"]) }}" placeholder="Waktu antar sekali order" required>
                    @error('waktu_antar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="biaya_simpan" class="form-label form-fill-label mb-1">Biaya Simpan</label>
                <input type="number" class="form-control form-fill-input @error('biaya_simpan') is-invalid @enderror" id="biaya_simpan" name="biaya_simpan"
                    value="{{ old('biaya_simpan', $result["biaya_simpan"]) }}" placeholder="Biaya Simpan Per Satuan" required>
                    @error('biaya_simpan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="harga_jual" class="form-label form-fill-label mb-1">Harga Jual</label>
                <input type="number" class="form-control form-fill-input @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual"
                    value="{{ old('harga_jual', $result["harga_jual"]) }}" placeholder="Harga Jual per Satuan" required>
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
        </div>

        <div class="row mt-4 form-afirmasi">
			<div class="col d-flex justify-content-end">
				<div class="buton-basic">
                    <a href="/detail_stok/{{ $result["id_stok"] }}" class="btn btn-blue">Batal</a>
                </div>
			</div>
			<div class="col">
				<button type="submit" class="btn-white-black" onclick = "return confirm('Apakah data yang diedit sudah benar ?')" name="stok">Simpan</button>
			</div>
		</div>

    </form>
</div>

@endsection
