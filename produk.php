<class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk_tambah" class="btn btn-primary"> + Tambah Data</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo 'Rp ' . number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td>
                        <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    </div>