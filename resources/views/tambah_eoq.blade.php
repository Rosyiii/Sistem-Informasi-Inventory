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
                <label for="id_stok" class="form-label form-fill-label mb-1">ID</label>
                <input placeholder="Tuliskan ID Stok Barang" class="form-control form-fill-input" type="text"
                    id="id_stok" name="id_stok" readonly>
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama</label>
                <input type="text" list="dataListNama" class="form-control form-fill-input" id="nama" name="nama"
                    onkeyup="isi_otomatis()" placeholder="dsa" @error('nama') is-invalid @enderror required>
                <datalist id="dataListNama">
                    @foreach ($stoks as $stok)
						<option value="{{ $stok["nama"] }}"></option>
					@endforeach
                </datalist>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row form-afirmasi mt-4">
            <div class="col d-flex justify-content-end">
                <button class="btn-blue">
                    <a href="/eoq">Batal</a>
                </button>
            </div>
            <div class="col">
                <button class="btn-white-black" name="eoq">Tambah</button>
            </div>
        </div>
    </form>
</div>

@endsection
