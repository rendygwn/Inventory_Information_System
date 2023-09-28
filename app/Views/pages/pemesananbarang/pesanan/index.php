<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Pesanan &mdash; Robonesia.id</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Pesanan</h1>
        <div class="section-header-button">
            <a href="<?= site_url('pesanan/new') ?>" class="btn btn-primary">Tambah Baru</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Pesanan</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table  text-center table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pesan</th>
                            <th>Tanggal Pesan</th>
                            <th>Kode Konsumen</th>
                            <th>Nama Konsumen</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesan as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->kd_pesan ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->kd_konsumen ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->kd_barang ?></td>
                                <td><?= $value->nama_brg ?></td>
                                <td><?= $value->qty ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="<?= site_url('pesanan/edit/' . $value->id_pesan) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('pesanan/' . $value->id_pesan) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin anda hapus data?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>