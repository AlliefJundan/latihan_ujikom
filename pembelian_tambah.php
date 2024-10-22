<?php
if (isset($_POST["id_pelanggan"])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $total = 0;

    $query = mysqli_query($koneksi, "INSERT INTO penjualan(tanggal_penjualan, id_penjualan) VALUES(NOW(), '$id_pelanggan') ");
    $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_penjualan DESC"));
    $id_penjualan = $idTerakhir['id_penjualan'];


    foreach ($produk as $key => $val) {
        $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$key"));
        $sub = $val * $pr['harga'];
        $total += $sub;

        $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, subtotal) VALUES('$id_penjualan', '$key', '$val', '$sub') ");
    }

    $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga = $total WHERE id_penjualan = $id_penjualan");
    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=pembelian"</script>';
    } else {
        echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><select class="form-control form-select" name="id_pelanggan">
                        <?php
                        $p = mysqli_query($koneksi, 'SELECT * FROM pelanggan ');
                        while ($pel = mysqli_fetch_array($p)) {
                            ?>
                            <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
            $pro = mysqli_query($koneksi, 'SELECT * FROM produk ');
            while ($produk = mysqli_fetch_array($pro)) {
                ?>
                <tr>
                    <td><?php echo $produk['nama_produk'] . ' (Stok : ' . $produk['stok'] . ')' ?></td>
                    <td>:</td>
                    <td><input class="form-control" max="<?php echo $produk['stok']; ?>" type="number" step="0"
                            name="produk[<?php echo $produk['id_produk'] ?>]">
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>

        </table>

    </form>
</div>