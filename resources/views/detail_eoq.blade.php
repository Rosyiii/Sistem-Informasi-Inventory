@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">DETAIL EOQ</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3">
    <div class="form-fill-detail">
        <div class="row px-1 py-1">
            <div class="col px-4 py-5 text-white">
                <div style="margin-top: 110px;">
                    <div class="row">
                        <div class="col">ID Stok</div>
                        <div class="col my-auto">{{ $result['id_stok'] }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Nama</div>
                        <div class="col my-auto text-capitalize">{{ substr($result->stok->nama, 0, 11) }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Stok Kebutuhan Setahun</div>
                        <div class="col my-auto">{{ $result['kebutuhan_tahunan'] }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Biaya pemesanan</div>
                        <div class="col my-auto">{{ $result->stok->biaya_pesan }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Biaya Simpan</div>
                        <div class="col my-auto">{{ $result->stok->biaya_simpan }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Lead Time</div>
                        <div class="col my-auto">{{ $result->stok->waktu_antar }}</div>
                    </div>
                    <div class="row">
                        <div class="col">Satuan</div>
                        <div class="col my-auto">{{ $result->stok->satuan }}</div>
                    </div>
                </div>

            </div>
            <div class="col-auto px-5 py-4 detail-eoq">
                <div class="row m-auto">
                    <div class="row detail-eoq-fill mb-2 p-0">
                        <h1 class="align-self-start mt-2">{{ $result['eoq'] }}</h1>
                        <h2 class="align-self-center">EOQ</h2>
                        <div class="align-self-end mb-2">
                            <h6 style="font-weight: bold; color: black;">Economic Order Quantity</h6>
                            <span>Jumlah order paling optimal.</span>
                        </div>
                    </div>
                    <div class="row detail-eoq-fill mb-2 p-0">
                        <h1 class="align-self-start mt-2">{{ $result['frekuensi'] }}</h1>
                        <h2 class="align-self-center">F</h2>
                        <div class="align-self-end mb-2">
                            <h6 style="font-weight: bold; color: black;">Frekuensi</h6>
                            <span>Fruekuensi penambahan stok dalam satu tahun.</span>
                        </div>
                    </div>
                    <div class="row detail-eoq-fill mb-2 p-0">
                        <h1 class="align-self-start mt-2">{{ $result['jarak'] }} Hari</h1>
                        <h2 class="align-self-center">J</h2>
                        <div class="align-self-end mb-2">
                            <h6 style="font-weight: bold; color: black;">Jarak Order</h6>
                            <span>Jarak antar pembelian barang sesuai perhitungan EOQ.</span>
                        </div>
                    </div>
                    <div class="row detail-eoq-fill mb-2 p-0">
                        <h1 class="align-self-start mt-2">{{ $result['safety_stok'] }}</h1>
                        <h2 class="align-self-center">SS</h2>
                        <div class="align-self-end mb-2">
                            <h6 style="font-weight: bold; color: black;">Safety Stock</h6>
                            <span>Persediaan ekstra yang disimpan sebagai pengamanan penjualan.</span>
                        </div>
                    </div>
                    <div class="row detail-eoq-fill mb-2 p-0">
                        <h1 class="align-self-start mt-2">{{ $result['reorder'] }}</h1>
                        <h2 class="align-self-center">ROP</h2>
                        <div class="align-self-end mb-2">
                            <h6 style="font-weight: bold; color: black;">Re-Order Point</h6>
                            <span>Jumlah order paling optimal.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 form-afirmasi">
            <div class="col d-flex justify-content-end">
                <button class="btn-blue">
                    <a href="/eoq">OK</a>
                </button>
            </div>
            <form class="col" action="/detail_eoq/{{ $result['id_eoq'] }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-batal" onclick="return confirm('Apakah anda yakin ingin menghapus data EOQ dengan ID {{ $result['id_eoq'] }} ?')">HAPUS</button>
            </form>
        </div>
    </div>
</div>

@endsection
