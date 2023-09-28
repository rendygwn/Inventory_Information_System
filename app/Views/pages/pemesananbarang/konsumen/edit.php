<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Edit Konsumen &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('konsumen') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Update Konsumen</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Konsumen</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('konsumen/' . $konsumen->id_konsumen) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label>Kode Konsumen *</label>
                        <input type="text" name="kd_konsumen" value="<?= $konsumen->kd_konsumen ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="nama" value="<?= $konsumen->nama ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon *</label>
                        <input type="number" name="no_telepon" value="<?= $konsumen->no_telepon ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="text" name="email" value="<?= $konsumen->email ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" class="form-control" rows="5"><?= $konsumen->alamat ?></textarea>
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