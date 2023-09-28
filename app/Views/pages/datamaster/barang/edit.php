<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Edit Paket Barang &mdash; ROBONESIA.ID</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('barang') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Edit Paket Barang</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit Data Paket Barang</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('barang/' . $barang->id_barang); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="gambarName" value="<?= $barang->gambar ?>">
                    <input type="hidden" name="gambarName_old" value="<?= $barang->gambar ?>">
                    <div class="form-group">
                        <label>Kode Barang *</label>
                        <input type="text" name="kd_barang" value="<?= $barang->kd_barang ?>" class="form-control" required>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-sm-9">
                            <label>Gambar *</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="<?= base_url("img/" . $barang->gambar) ?>" class="gambar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket Barang*</label>
                        <input type="text" name="nama_brg" value="<?= $barang->nama_brg ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Paket Barang *</label>
                        <input type="text" name="jenis_paket_brg" value="<?= $barang->jenis_paket_brg ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok *</label>
                        <input type="text" name="stok" value="<?= $barang->stok ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea name="deskripsi" class="form-control" rows="5"><?= $barang->deskripsi ?></textarea>
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