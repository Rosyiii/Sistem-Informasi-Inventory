@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text" style="margin-bottom: 0px;">{{ $tittle }}</h1>
    @cannot('karyawan')
        <div class="row d-flex justify-content-end align-items-center">
            <div class="mx-0 my-2 me-4" style="width: auto;">
                <a class="btn btn-blue-purple" href="/tambah_stok">+ Data Stok Barang</a>
            </div>
        </div>
    @endcannot
    <div class="form-fill-title-breakline row"></div>
</div>
<div class="row mt-4">
    <form class="d-flex">
        <input class="form-control form-search-stok me-2" type="text" placeholder="Tulis Id Stok" name="id_stok"
            aria-label="Search" style="width: 20%; border-radius: 20px;" value="{{ request('id_stok') }}">

        <input class="form-control form-search-stok me-2" type="text" placeholder="Tulis Id Supplier" name="id_supplier"
            aria-label="Search" style="width: 20%; border-radius: 20px;" value="{{ request('id_supplier') }}">

        <input class="form-control form-search-stok me-2" type="text" placeholder="Tulis Nama Stok Barang"
            name="nama_stok" aria-label="Search" style="width: 30%; border-radius: 20px;" value="{{ request('nama_stok') }}">

        <button class="btn-purple" type="submit" style="width: 70px;">CARI</button>
    </form>
</div>
<!-- Fill -->
<div class="row mt-2" style="height: 540px;">
    <div class="table-responsive small fill-karyawan">
        <table class="table table-sm table-hover list-table" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 13px;">No</th>
                    <th scope="col" style="width: 90px;">Id Stok</th>
                    <th scope="col" style="width: 90px;">Id Supplier</th>
                    <th scope="col" style="width: 280px;">Nama</th>
                    <th scope="col" style="width: 60px;">Stok</th>
                    <th scope="col" style="width: 70px;">Satuan</th>
                    <th scope="col" style="width: 120px;">Harga Beli Satuan</th>
                    <th scope="col" style="width: 120px;">Harga Jual Satuan</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($stoks as $stok)

                <tr>
                    <td>{{ ($stoks->currentPage() - 1)  * $stoks->links()->paginator->perPage() + $loop->iteration }}</td>
					<td>{{ $stok["id_stok"] }}</td>
                    @if (empty($stok["id_supplier"]))
                        <td>Terhapus</td>
                    @else
                        <td>{{ $stok["id_supplier"] }}</td>
                    @endif
					<td class="text-capitalize">{{ substr($stok["nama"], 0, 22) }}</td>
					<td>{{ $stok["jml_stok"] }}</td>
					<td>{{ $stok["satuan"] }}</td>
					<td>{{ $stok["harga_beli"] }}</td>
					<td>{{ $stok["harga_jual"] }}</td>
                    <td>
                        <div class="buton-basic">
                            <a class="btn btn-purple" href="/detail_stok/{{ $stok["id_stok"] }}">Detail</a>
                        </div>
                    </td>
                </tr>
				@endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $stoks->onEachSide(1)->links() }}
</div>
<!-- Pagination -->

@endsection
