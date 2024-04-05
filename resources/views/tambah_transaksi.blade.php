@extends('layouts.main')

@section('fill')
<div class="form-fill row">
    <h1 class="form-fill-title-text mb-0" style="text-align: center;">{{ $tittle }}</h1>
    <div class="form-fill-title-breakline row mt-0"></div>
</div>
<div class="row mt-3" style="height: 580px;">
    <div class="form-fill-tambah-transaksi pt-4 px-3 pb-2">
        <div style="margin-right: 70px">
            <table class="table list-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col-auto" style="width: 20%;">Nama</th>
                        <th scope="col-auto" style="width: 8%;">Jumlah</th>
                        <th scope="col-auto" style="width: 13%;">Harga Satuan</th>
                        <th scope="col-auto" style="width: 15%;">Harga Total</th>
                    </tr>
                </thead>
            </table>
        </div>
        <form class="row" method="POST">
            @csrf
            <datalist id="dataListNama">
                @foreach ($stoks as $stok)
					<option value="{{ $stok["nama"] }}"></option>
				@endforeach
            </datalist>
            <div class="row-auto form-input-transaksi box" id="box">
                <div class="row ms-2 mb-2 control-group" style="height: 22px;">
                    <input type="text" list="dataListNama" id="nama" class="form-control form-fill-input col-auto me-2"
                        placeholder="Nama" style="width: 30%;" name="nama[]" required>

                    <input type="number" id="jumlah-0" name="jumlah[]"
                        class="form-control form-fill-input col-auto me-2 hitung" style="width: 13%;" min="1" required>

                    <input type="number" id="harga_jual-0" name="harga_jual[]"
                        class="form-control form-fill-input col-auto me-2 hitung" style="width: 21%;" min="1" required>

                    <input type="text" id="total-0" name="total_harga[]"
                        class="form-control form-fill-input col-auto me-2 total" style="width: 18%;" readonly>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-auto">
                <button type="button" class="btn tambah-transaksi" onclick="addInput()" id="tambah" style="border: none;">Tambah Transaksi</button>
            </div>

            <div class="row align-self-end form-afirmasi">
                <div class="row">
                    <label class="col justify-content-start form-fill-label ms-2" for="total">Jumlah
                        Total</label>
                    <input class="col-auto form-control d-flex justify-content-end form-fill-input" type="number"
                        id="total" name="grandTotal" style="width: 37%; margin-right: 35px;" readonly>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="mt-3 me-5">
                        <div class="buton-basic me-5">
                            <a class="btn btn-purple" href="/data_transaksi">Batal</a>
                        </div>
                        <button type="submit" name="transaksi_keluar" class="btn-white ms-5 me-1">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
