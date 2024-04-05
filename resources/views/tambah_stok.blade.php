@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <form class="form-fill-detail" method="POST">
        @csrf
        <div class="form-input">
            <div class="mb-2">
                <label for="nama_stok" class="form-label form-fill-label mb-1">Nama Stok</label>
                <input type="text" class="form-control form-fill-input @error('nama_stok') is-invalid @enderror" id="nama_stok" name="nama_stok"
                    list="dataListNama" placeholder="Tuliskan Nama Stok Barang" value="{{ old('nama_stok') }}" autofocus required>
                <datalist id="dataListNama">
                    @foreach ($stoks as $stok)
						<option value="{{ $stok["nama"] }}"></option>
					@endforeach
                </datalist>
                @error('nama_stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="jml_stok" class="form-label form-fill-label mb-1">Jumlah Stok</label>
                <input type="number" class="form-control form-fill-input @error('jml_stok') is-invalid @enderror" id="jml_stok" name="jml_stok"
                    placeholder="Jumlah Barang Masuk" value="{{ old('jml_stok') }}" required>
                @error('jml_stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="harga_beli" class="form-label form-fill-label mb-1">Harga Beli per Satuan</label>
                <input type="number" class="form-control form-fill-input @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli"
                    placeholder="Harga Beli Barang per Satuan" value="{{ old('harga_beli') }}" required>
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
                <a href="/data_stok" class="btn btn-danger btn-batal"
                    style="width: 80px; border-radius: 20px; border: none;">Batal</a>
            </div>
            <div class="col d-flex justify-content-center">
                <button type="submit" class="btn-blue" name="stok_lama">Tambah</button>
            </div>
            <div class="col">
                <a href="/tambah_stok_baru" class="btn btn-light"
                    style="width: 80px; border-radius: 20px; border: none; color: #000000;">Baru</a>
            </div>
        </div>
    </form>
</div>

@endsection
