<div class="container" style="margin-top: 100px;">

    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($barang as $b): ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $b['nama']; ?></td>
                    <td><?= $b['stok']; ?></td>
                    <td>
                        <button class="btn btn-warning">Ubah</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>