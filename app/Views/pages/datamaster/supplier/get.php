<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Supplier &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Supplier</h1>
        <div class="section-header-button">
            <a href="<?= site_url('supplier/add') ?>" class="btn btn-primary">Tambah Baru</a>
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
                <h4>Data Supplier</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table  text-center table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Supplier</th>
                            <th>Nama</th>
                            <th>Nama Toko</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplier as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->kd_supplier ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_toko ?></td>
                                <td><?= $value->no_telepon ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->alamat ?></td>
                                <td class="text-center" style="width:15%">
                                    <a href="<?= site_url('supplier/edit/' . $value->id_supplier) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('supplier/' . $value->id_supplier) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin anda hapus data?')">
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