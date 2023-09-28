<li class="menu-header">Main Menu</li>
<li><a class="nav-link" href="<?= base_url('home') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li><a class="nav-link" href="<?= base_url('pengguna') ?>"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
<li><a class="nav-link" href="<?= base_url('karyawansupply') ?>"><i class="fas fa-users"></i> <span>Karyawan Supply</span></a></li>

<li class="menu-header">Data Master</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= base_url('supplier') ?>">Supplier</a></li>
        <li><a class="nav-link" href="<?= base_url('satuanbarang') ?>">Satuan Barang</a></li>
        <li><a class="nav-link" href="<?= base_url('barang') ?>">Paket Barang</a></li>
    </ul>
</li>
<li class="menu-header">Data Pemesanan Barang</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Pemesanan Barang</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= base_url('konsumen') ?>">Konsumen</a></li>
        <li><a class="nav-link" href="<?= base_url('pesanan') ?>">Pesanan</a></li>
        <li><a class="nav-link" href="layout-transparent.html">Transaksi</a></li>
    </ul>
</li>
<li class="menu-header">Data Laporan</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Laporan Barang</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="layout-default.html">Laporan Barang Masuk</a></li>
        <li><a class="nav-link" href="layout-default.html">Laporan Barang Keluar</a></li>
    </ul>
</li>