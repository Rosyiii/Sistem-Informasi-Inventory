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
                <label for="password" class="form-label form-fill-label mb-1">Password Sekarang</label>
                <input type="password" class="form-control form-fill-input @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password Saat ini" value="{{ old('password') }}" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="new_password" class="form-label form-fill-label mb-1">Password Baru</label>
                <input type="password" class="form-control form-fill-input @error('new_password') is-invalid @enderror"
                    id="new_password" name="new_password" placeholder="Password Baru" value="{{ old('new_password') }}" required>
                @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="password_confirmation" class="form-label form-fill-label mb-1">Password Konfirmasi</label>
                    <input type="password" class="form-control form-fill-input @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru" value="{{ old('password_confirmation') }}" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        <div class="row form-afirmasi mt-4">
            <div class="col d-flex justify-content-end">
                <div class="buton-basic">
                    <a href="/detail_karyawan/{{ $result["id_user"] }}" class="btn btn-blue">Batal</a>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn-white-black">Tambah</button>
            </div>
        </div>
    </form>
</div>
@endsection