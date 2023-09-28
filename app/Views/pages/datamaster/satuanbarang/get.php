<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Barang &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Satuan Barang</h1>
        <div class="section-header-button">
            <a href="<?= site_url('satuanbarang/add') ?>" class="btn btn-primary">Tambah Baru</a>
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
                <h4>Data Satuan Barang</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table  text-center table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan Barang</th>
                            <th>Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($satuanbarang as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->kd_barang ?></td>
                                <td>
                                    <img src=" <?= "img/" . $value->gambar ?>" alt="" class="gambar">
                                </td>
                                <td><?= $value->nama_brg ?></td>
                                <td><?= $value->jenis_brg ?></td>
                                <td><?= $value->satuan_brg ?></td>
                                <td><?= $value->stok ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="<?= site_url('satuanbarang/edit/' . $value->id_satuan_brg) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('satuanbarang/' . $value->id_satuan_brg) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin anda hapus data?')">
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