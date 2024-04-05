<li style="border-top: none;"><a href="/" class="list-group-item list-group-item-action {{ ($tittle === "Landing Page" ) ? 'text-black' : '' }}">LANDING PAGE</a></li>

@can('owner')
<li><a href="/data_karyawan" class="list-group-item list-group-item-action {{ ($tittle === "Data Karyawan") ? 'text-black' : '' }}">DATA KARYAWAN</a></li>
@endcan

<li><a href="/data_stok" class="list-group-item list-group-item-action {{ ($tittle === "Data Stok") ? 'text-black' : '' }}">DATA STOK</a></li>

@cannot('karyawan')
<li><a href="/data_supplier" class="list-group-item list-group-item-action {{ ($tittle === "Data Supplier") ? 'text-black' : '' }}">DATA SUPPLIER</a></li>
@endcannot

<li><a href="/data_transaksi" class="list-group-item list-group-item-action {{ ($tittle === "Data Transaksi Jual") ? 'text-black' : '' }}">DATA TRANSAKSI</a></li>

@can('owner')
<li style="border-bottom: 6px solid rgb(255, 255, 255);"><a href="/eoq"
class="list-group-item list-group-item-action {{ ($tittle === "EOQ") ? 'text-black' : '' }}">EOQ</a></li>
@endcan