<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Edit Pengguna &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pengguna') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Update Pengguna</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Pengguna</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('pengguna/' . $user->id_user) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label>Nama User *</label>
                        <input type="text" name="nama_user" value="<?= $user->nama_user ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Info *</label>
                        <input type="text" name="info" value="<?= $user->info ?>" class="form-control" required>
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