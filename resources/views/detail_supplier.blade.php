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
                <input class="form-control form-fill-input" type="text" id="id" value="{{ $result["id_supplier"] }}"
                    disabled readonly>
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label form-fill-label mb-1">Nama Supplier</label>
                <input type="text" class="form-control form-fill-input" id="namaSupplier" value="{{ $result["nama"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="alamat" class="form-label form-fill-label mb-1">Alamat</label>
                <input type="text" class="form-control form-fill-input" id="alamat" value="{{ $result["alamat"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="namaCP" class="form-label form-fill-label mb-1">Nama CP</label>
                <input type="text" class="form-control form-fill-input" id="namaCP" value="{{ $result["nama_cp"] }}"
                    readonly>
            </div>
            <div class="mb-2">
                <label for="noCP" class="form-label form-fill-label mb-1">No CP</label>
                <input type="text" class="form-control form-fill-input" id="noCP" value="{{ $result["no_hp_cp"] }}"
                    readonly>
            </div>
        </div>

        <div class="row mt-4 form-afirmasi">
            <div class="col d-flex @if(auth()->user()->jabatan === 'Owner') justify-content-end @else justify-content-center @endif">
                <div class="buton-basic">
                    <a href="/data_supplier" class="btn btn-blue">OK</a>
                </div>
            </div>
            @can('owner')
                <div class="col">
                    <div class="buton-basic">
                        <a href="/edit_supplier/{{ $result["id_supplier"] }}" class="btn btn-white-black">Edit</a>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>

@endsection
