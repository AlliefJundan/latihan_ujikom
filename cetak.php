<html>

<head>
    <center>
        <h1>Laporan Penjualan</h1>
    </center>
</head>

<body>

    <table border="1" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pembelian</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("koneksi.php");
            $nomor = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan ORDER BY tanggal_penjualan DESC");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++; ?></th>
                    <td><?php echo $data['tanggal_penjualan']; ?></td>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo 'Rp ' . number_format($data['total_harga'], 0, ',', '.'); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        // Cetak halaman terlebih dahulu
        window.print();
    </script>
    </script>
</body>


</html>