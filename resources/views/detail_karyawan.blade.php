@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <div class="form-fill-detail">
        <div class="form-input">
            <div class="mb-2">
                <label for="id" class="form-label form-fill-label mb-1">ID</label>
                <input class="form-control form-fill-input" type="text" id="id" value="{{ $result["id_user"] }}" disabled
                    readonly>
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama</label>
                <input type="text" class="form-control form-fill-input" id="nama" value="{{ $result["nama"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="alamat" class="form-label form-fill-label mb-1">Alamat</label>
                <input type="text" class="form-control form-fill-input" id="alamat" value="{{ $result["alamat"] }}"
                    readonly>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="tempat_lahir" class="form-label form-fill-label mb-1">Tempat Lahir</label>
                    <input type="text" class="form-control form-fill-input" id="tempat_lahir"
                        value="{{ $result["tempat_lahir"] }}" readonly>
                </div>
                <div class="col">
                    <label for="tanggal_lahir" class="form-label form-fill-label mb-1">Tanggal Lahir</label>
                    <input type="date" class="form-control form-fill-input" id="tanggal_lahir"
                        value="{{ $result["tanggal_lahir"] }}" readonly>
                </div>
            </div>
            <div class="mb-2">
                <label for="ijazah_terakhir" class="form-label form-fill-label mb-1">Ijazah Terakhir</label>
                <input type="text" class="form-control form-fill-input" id="ijazah_terakhir"
                    value="{{ $result["ijazah_terakhir"] }}" readonly>
            </div>
            <div class="mb-2">
                <label for="jabatan" class="form-label form-fill-label mb-1">Jabatan</label>
                <input type="text" class="form-control form-fill-input" id="jabatan" value="{{ $result["jabatan"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="username" class="form-label form-fill-label mb-1">Username</label>
                <input type="text" class="form-control form-fill-input" id="username" value="{{ $result["username"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <a href="/update_password/{{ $result['id_user'] }}">Ganti Password</a>
            </div>
        </div>
        
        <div class="row mt-4 form-afirmasi">
            <div class="col d-flex justify-content-end">
                <div class="buton-basic">
                    <a href="/data_karyawan" class="btn btn-blue">OK</a>
                </div>
            </div>
            <div class="col">
                <div class="buton-basic">
                    <a href="/edit_karyawan/{{ $result["id_user"] }}" class="btn btn-white-black">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
