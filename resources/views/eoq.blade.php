@extends('layouts.main')

@section('fill')
<!-- Fill Title -->
<div class="form-fill row mb-5">
    <h1 class="form-fill-title-text" style="margin-bottom: 0px;">{{ $tittle }}</h1>
    <div class="row d-flex justify-content-end align-items-center">
        <div class="align-items-center mx-0 my-2 me-4" style="width: auto;">
            <a class="btn btn-blue-purple" href="/tambah_eoq">+ Data EOQ</a>
        </div>
    </div>
    <div class="form-fill-title-breakline row"></div>
</div>
<!-- Fill -->
<div class="row mt-3" style="height: 520px;">
    <div class="table-responsive small fill-karyawan">
        <table class="table table-sm table-hover list-table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 3%;">No</th>
                    <th scope="col" style="width: 15%;">Id EOQ</th>
                    <th scope="col" style="width: 30%;">Nama</th>
                    <th scope="col" style="width: 20%;">Kebutuhan Tahunan</th>
                    <th scope="col" style="width: 15%;">Biaya Simpan</th>
                    <th scope="col" style="width: 15%;">Biaya Pesan</th>
                    <th scope="col" style="width: 10%;">EOQ</th>
                    <th scope="col" style="width: 10%;">ROP</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data_eoq as $data)
                <tr>
                    <td>{{ ($data_eoq->currentPage() -1) * $data_eoq->links()->paginator->perPage() + $loop->iteration }}</td>
                    <td>{{ $data['id_eoq'] }}</td>
                    <td>{{ substr($data->stok->nama, 0, 35) }}</td>
                    <td>{{ $data['kebutuhan_tahunan'] }}</td>
                    <td>{{ $data->stok->biaya_simpan }}</td>
                    <td>{{ $data->stok->biaya_pesan }}</td>
                    <td>{{ $data['eoq'] }}</td>
                    <td>{{ $data['reorder'] }}</td>
                    <td>
                        <div class="buton-basic">
                            <a class="btn btn-purple" href="/detail_eoq/{{ $data['id_eoq'] }}">Detail</a>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $data_eoq->onEachSide(1)->links() }}
</div>

@endsection
