<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <a href="?page=pembelian_tambah" class="btn btn-primary"> + Tambah Data</a>

    <!-- Dropdown untuk memilih rentang waktu cetak -->
    <form action="cetak.php" method="GET" target="_blank" class="d-inline">
        <button type="submit" class="btn btn-success">Cetak</button>
        <label for="filter_waktu">Cetak untuk:</label>
        <select name="rentang_waktu" id="filter_waktu" class="form-select" style="width: auto; display: inline-block;">
            <option value="1">1 Hari</option>
            <option value="3">3 Hari</option>
            <option value="7">7 Hari</option>
            <option value="30">30 Hari</option>
        </select>
    </form>

    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pembelian</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan ORDER BY tanggal_penjualan DESC");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++; ?></th>
                    <td><?php echo $data['tanggal_penjualan']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo 'Rp ' . number_format($data['total_harga'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="?page=pembelian_detail&&id=<?php echo $data['id_penjualan']; ?>"
                            class="btn btn-primary">Detail</a>
                        <a href="?page=pembelian_hapus&&id=<?php echo $data['id_penjualan']; ?>"
                            class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
