<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Tambah Konsumen &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('konsumen') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Tambah Konsumen</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Buat Data Konsumen</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('konsumen') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Kode konsumen *</label>
                        <input type="text" name="kd_konsumen" class="form-control" placeholder="Masukan Kode Konsumen, Ex : KN001" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon *</label>
                        <input type="number" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="alamat" class="form-control" rows="5"></textarea>
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