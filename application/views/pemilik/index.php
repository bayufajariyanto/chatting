<div class="container" style="margin-top: 100px;">

    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username Kasir</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($barang as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $b['username']; ?></td>
                        <td><?= $b['nama']; ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td>
                            <a href="<?= base_url('pemilik/ubah/') . $b['id']; ?>" class="btn btn-warning">Ubah</a>
                            <a href="<?= base_url('pemilik/hapus/') . $b['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>