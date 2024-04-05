@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <form action="/tambah_supplier" class="form-fill-detail" method="POST">
        @csrf
        <div class="form-input">
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama Supplier</label>
                <input type="text" class="form-control form-fill-input @error('nama') is-invalid @enderror" id="nama" name="nama"
                    placeholder="Tuliskan Nama Supplier" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="alamat" class="form-label form-fill-label mb-1">Alamat</label>
                <input type="text" class="form-control form-fill-input @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    placeholder="Tuliskan Alamat Supplier" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
            </div>
            <div class="mb-2">
                <label for="nama_cp" class="form-label form-fill-label mb-1">Nama CP</label>
                <input type="text" class="form-control form-fill-input @error('nama_cp') is-invalid @enderror" id="nama_cp" name="nama_cp"
                    placeholder="Tuliskan Nama Kontak Person Supplier yang dapat dihubungi" value="{{ old('nama_cp') }}" required>
                    @error('nama_cp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-2">
                <label for="no_hp_cp" class="form-label form-fill-label mb-1">No CP</label>
                <input type="text" class="form-control form-fill-input @error('no_hp_cp') is-invalid @enderror" id="no_hp_cp" name="no_hp_cp"
                    placeholder="Tuliskan No Hp Kontak Person Supplier yang dapat dihubungi" value="{{ old('no_hp_cp') }}" required>
                    @error('no_hp_cp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
        </div>

        <div class="row form-afirmasi">
            <div class="col d-flex justify-content-end">
                <div class="buton-basic">
                    <a href="/data_supplier" class="btn btn-blue">Batal</a>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn-white-black">Tambah</button>
            </div>
        </div>
    </form>
</div>

@endsection
