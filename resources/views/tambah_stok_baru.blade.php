@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <form action="/tambah_stok_baru" class="form-fill-detail" method="POST">
        @csrf
        <div class="form-input">
            <div class="mb-2">
                <label for="nama_supplier" class="form-label form-fill-label mb-1">Nama Supplier</label>
                <input class="form-control form-fill-input @error('nama_supplier') is-invalid @enderror" type="text" id="nama_supplier" name="nama_supplier"
                    list="dataListNama" placeholder="Tuliskan Nama Supplier" value="{{ old('nama_supplier') }}" required>
                <datalist id="dataListNama">
                    @foreach ($suppliers as $supplier)
						<option value="{{ $supplier["nama"] }}"></option>
					@endforeach
                </datalist>
                @error('nama_supplier')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nama_stok" class="form-label form-fill-label mb-1">Nama Stok</label>
                <input type="text" class="form-control form-fill-input @error('nama_stok') is-invalid @enderror" id="nama_stok" name="nama_stok"
                    placeholder="Nama Stok Barang" value="{{ old('nama_stok') }}" required>
                    @error('nama_stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="satuan" class="form-label form-fill-label mb-1">Satuan</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="satuan" name="satuan"
                    style="font-size: 16px; border-radius: 10px;">
                    @foreach ($satuans as $satuan)
                        @if (old('satuan')==$satuan)
                            <option value="{{ $satuan }}" selected>{{ $satuan }}</option>
                        @else
                            <option value="{{ $satuan }}">{{ $satuan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="jml_stok" class="form-label form-fill-label mb-1">Jumlah Stok Barang</label>
                <input type="number" class="form-control form-fill-input @error('jml_stok') is-invalid @enderror" id="jml_stok" name="jml_stok"
                    placeholder="Jumlah Stok yang di Order" value="{{ old('jml_stok') }}" required>
                    @error('jml_stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="harga_beli" class="form-label form-fill-label mb-1">Harga Beli Satuan dari
                    Supplier</label>
                <input type="number" class="form-control form-fill-input @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli"
                    placeholder="Harga Beli Satuan" value="{{ old('harga_beli') }}" required>
                    @error('harga_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="waktu_antar" class="form-label form-fill-label mb-1">Waktu antar (satuan
                    hari)</label>
                <input type="number" class="form-control form-fill-input @error('waktu_antar') is-invalid @enderror" id="waktu_antar" name="waktu_antar"
                    placeholder="Waktu Pengantaran Sekali Order" value="{{ old('waktu_antar') }}" required>
                    @error('waktu_antar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
        </div>
        <div class="row form-afirmasi mt-4">
            <div class="col d-flex justify-content-end">
                <a href="/data_stok" class="btn btn-danger btn-batal">Batal</a>
            </div>
            <div class="col">
                <button type="submit" class="btn-blue">Tambah</button>
            </div>
        </div>
    </form>
</div>

@endsection
