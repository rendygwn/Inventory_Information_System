<?= $this->extend('layout/default') ?>


<?= $this->section('content') ?>
<title>Tambah Pesanan &mdash; Robonesia.id</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pesanan') ?>" class="btn btn-primary"><i class="fas fa-reply"></i></a>
        </div>
        <h1>Tambah Pesanan</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Buat Data Pesanan</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('pesanan') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Kode Pesan *</label>
                        <input type="text" name="kd_pesan" class="form-control" placeholder="Masukan Kode Pesan, Ex : P001" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pesan *</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input type="date" name="tgl_pesan" class="form-control daterange-cus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kode Konsumen *</label>
                        <select name="kd_konsumen" id="" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($pesan as $key => $value) : ?>
                                <option value="<?= $value->id_konsumen ?>"><?= $value->kd_konsumen ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Konsumen *</label>
                        <select name="nama" id="" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($pesan as $key => $value) : ?>
                                <option value="<?= $value->id_konsumen ?>"><?= $value->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang *</label>
                        <select name="kd_barang" id="" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($pesan as $key => $value) : ?>
                                <option value="<?= $value->id_barang ?>"><?= $value->kd_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang *</label>
                        <select name="nama" id="" class="form-control" required>
                            <option value="" hidden></option>
                            <?php foreach ($pesan as $key => $value) : ?>
                                <option value="<?= $value->id_barang ?>"><?= $value->nama_brg ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty *</label>
                        <input type="text" name="qty" class="form-control" required>
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