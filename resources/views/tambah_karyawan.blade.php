@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <form action="/tambah_karyawan" class="form-fill-detail" method="POST">
        @csrf
        <div class="form-input">
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama</label>
                <input type="text" class="form-control form-fill-input @error('nama') is-invalid @enderror" id="nama"
                    name="nama" placeholder="Nama User" value="{{ old('nama') }}" required autofocus>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="alamat" class="form-label form-fill-label mb-1">Alamat</label>
                <input type="text" class="form-control form-fill-input @error('alamat') is-invalid @enderror"
                    id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal" value="{{ old('alamat') }}" required>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="tempat_lahir" class="form-label form-fill-label mb-1">Tempat Lahir</label>
                    <input type="text" class="form-control form-fill-input @error('tempat_lahir') is-invalid @enderror"
                        id="tempat_lahir" name="tempat_lahir" placeholder="Kabupaten Tempat Kelahiran" value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="tanggal_lahir" class="form-label form-fill-label mb-1">Tanggal Lahir</label>
                    <input type="date" class="form-control form-fill-input @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-2">
                <label for="ijazah_terakhir" class="form-label form-fill-label mb-1">Ijazah Terakhir</label>
                <input type="text" class="form-control form-fill-input @error('ijazah_terakhir') is-invalid @enderror"
                    id="ijazah_terakhir" name="ijazah_terakhir" placeholder="Ijazah Terakhir yang Dimiliki" value="{{ old('ijazah_terakhir') }}" required>
                @error('ijazah_terakhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="jabatan" class="form-label form-fill-label mb-1">Jabatan</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="jabatan" name="jabatan"
                    style="font-size: 16px; border-radius: 10px;">
                    @foreach ($jabatans as $jabatan)
                        @if (old('jabatan') == $jabatan)
                            <option value="{{ $jabatan }}" selected>{{ $jabatan }}</option> 
                        @else
                            <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="username" class="form-label form-fill-label mb-1">Username</label>
                <input type="text" class="form-control form-fill-input @error('username') is-invalid @enderror"
                    id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label form-fill-label mb-1">Password</label>
                <input type="password" class="form-control form-fill-input @error('password') is-invalid @enderror"
                    id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row form-afirmasi mt-4">
            <div class="col d-flex justify-content-end">
                <div class="buton-basic">
                    <a href="/data_karyawan" class="btn btn-blue">Batal</a>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn-white-black">Tambah</button>
            </div>
        </div>
    </form>
</div>

@endsection
