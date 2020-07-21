<div class="container" style="margin-top: 100px;">
    <form method="post" action="<?= base_url('kasir/ubah/') ?>">
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" value="<?= $barang['nama']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" min="1" placeholder="Jumlah Barang" value="<?= $barang['stok']; ?>">
            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <a href="<?= base_url('kasir'); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-warning">Ubah</button>
    </form>
</div>