@extends('layouts.main')

@section('fill')
    <div class="form-fill row">
        <h1 class="form-fill-title-text" style="margin-bottom: 0px;">{{ $tittle }}</h1>
        <div class="row d-flex justify-content-end align-items-center">
            <div class="mx-0 my-2 me-4" style="width: auto;">
                <a class="btn btn-blue-purple" href="/tambah_supplier">+ Data Supplier</a>
            </div>
        </div>
        <div class="form-fill-title-breakline row"></div>
    </div>
    <div class="row mt-4">
        <form class="d-flex">
            <input class="form-control form-search-stok me-2" type="search" placeholder="Tulis Id Supplier"
                aria-label="Search" style="width: 20%; border-radius: 20px;" name="id_supplier" value="{{ request('id_supplier') }}">
            <input class="form-control form-search-stok me-2" type="search" placeholder="Tulis Nama Supplier"
                aria-label="Search" style="width: 30%; border-radius: 20px;" name="nama_supplier" value="{{ request('nama_supplier') }}">
            <button class="btn-purple" type="submit" style="width: 70px;">CARI</button>
        </form>
    </div>
    <!-- Fill -->
    <div class="row mt-2" style="height: 540px;">
        <div class="table-responsive small fill-karyawan">
            <table class="table table-sm table-hover list-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 3%;">No</th>
                        <th scope="col" style="width: 13%;">Id Supplier</th>
                        <th scope="col" style="width: 20%;">Nama Supplier</th>
                        <th scope="col" style="width: 30%;">Alamat</th>
                        <th scope="col" style="width: 20%;">Nama CP</th>
                        <th scope="col" style="width: 14%;">No CP</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
					@foreach ($suppliers as $supplier)
                    <tr>
						<td>{{ ($suppliers->currentPage() - 1)  * $suppliers->links()->paginator->perPage() + $loop->iteration }}</td>
						<td>{{ $supplier["id_supplier"] }}</td>
						<td class="text-capitalize">{{ substr($supplier["nama"], 0, 20) }}</td>
						<td>{{ substr($supplier["alamat"], 0, 25) }}</td>
						<td>{{ substr($supplier["nama_cp"], 0, 20) }}</td>
						<td>{{ $supplier["no_hp_cp"] }}</td>
						<td>
							<div class="buton-basic">
                                <a class="btn btn-purple" href="/detail_supplier/{{ $supplier["id_supplier"] }}">Detail</a>
                            </div>
						</td>
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $suppliers->onEachSide(1)->links() }}
    </div>
	
@endsection