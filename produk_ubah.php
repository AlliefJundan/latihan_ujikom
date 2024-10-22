<?php   
$id = $_GET['id'];
if(isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=produk"</script>';
    } else {
        echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
    
}
$query = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk=$id");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo $data['nama_produk'];?>" type="text" name="nama_produk"></td>
            </tr>
            <tr>
                <td width="200">Harga</td>
                <td width="10">:</td>
                <td><input class="form-control" value="<?php echo $data['harga'];?>" type="number" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0"  value="<?php echo $data['stok'];?>"name="stok"></td>
            </tr>
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