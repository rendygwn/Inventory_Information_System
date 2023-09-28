<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Edit KaryawanSupply &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('karyawansupply') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Update Karyawan Supply</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Karyawan Supply</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('karyawansupply/' . $karyawansupply->id_karyawan) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label>Nip *</label>
                        <input type="text" name="nip" value="<?= $karyawansupply->nip ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="nama" value="<?= $karyawansupply->nama ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon *</label>
                        <input type="number" name="no_telepon" value="<?= $karyawansupply->no_telepon ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="text" name="email" value="<?= $karyawansupply->email ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" class="form-control" rows="5"><?= $karyawansupply->alamat ?></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>