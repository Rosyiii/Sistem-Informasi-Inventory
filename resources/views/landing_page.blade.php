@extends('layouts.main')

@section('fill')

<!-- Fill Title -->
<div class="form-fill row">
    <h1 class="form-fill-title-text">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row"></div>
</div>

<!-- Fill -->
<div class="row mt-5">
    <div class="row mb-5">
        <!-- Fill 1 -->
        @can('owner')
        <div class="col">
            <div class="row align-items-center list-master-data">
                <div class="col-auto">
                    <img src="img/Karyawan.png" alt="Karyawan" width="108" height="108">
                </div>
                <div class="list-master-data-breakline1" style="width: 1px;"></div>
                <div class="col">
                    <div class="row-auto">
                        <h3 class="text-title">Data Karyawan</h3>
                    </div>
                    <div class="list-master-data-breakline2"></div>
                    <div class="row align-items-center">
                        <div class="col-auto mx-0" style="width: 100px;">
                            <p class="text-fill">{{ $employer }}</p>
                            <p class="text-fill">Karyawan</p>
                        </div>
                        <div class="col align-items-center mx-0" style="width: 105px;">
                            <a href="/data_karyawan" class="btn btn-fill">View All <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
    <div class="row">
        <!-- Fill 2 -->
        <div class="col">
            <div class="row align-items-center list-master-data">
                <div class="col-auto">
                    <img class="imgtransaksi" src="img/Transaksi.png" alt="Transaksi" width="108" height="108">
                </div>
                <div class="list-master-data-breakline1" style="width: 1px;"></div>
                <div class="col">
                    <div class="row-auto">
                        <h3 class="text-title">Tambah Transaksi Baru</h3>
                    </div>
                    <div class="list-master-data-breakline2"></div>
                    <div class="row align-items-center">
                        <div class="col align-items-center mx-0" style="width: 105px;">
                            <a href="/tambah_transaksi" class="btn btn-fill">+ Transaksi Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fill 2 -->
        <div class="col">
            <div class="row align-items-center list-master-data">
                <div class="col-auto">
                    <img src="img/Stok Barang Icon.png" alt="Stok Barang" width="108" height="108">
                </div>
                <div class="list-master-data-breakline1" style="width: 1px;"></div>
                <div class="col">
                    <div class="row-auto">
                        <h3 class="text-title">Data Stok Barang</h3>
                    </div>
                    <div class="list-master-data-breakline2"></div>
                    <div class="row align-items-center">
                        <div class="col-auto mx-0" style="width: 100px;">
                            <p class="text-fill">{{ $stok }}</p>
                            <p class="text-fill">Stok Barang</p>
                        </div>
                        <div class="col align-items-center mx-0" style="width: 105px;">
                            <a href="/data_stok" class="btn btn-fill">View All <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection