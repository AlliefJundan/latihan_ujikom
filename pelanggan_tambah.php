<?php   
if(isset($_POST['nama_pelanggan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan,alamat,no_telepon) VALUES('$nama','$alamat','$no_telepon')");
    if($query) {
        echo '<script>alert("Tambah data berhasil");</script>';
    } else  {
        echo '<script>alert("Tambah data gagal");</script>';
    }
}
?>

<class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
    <a href="?page=pelanggan" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td width="200">Alamat</td>
                <td width="10">:</td>
                <td><textarea name="alamat" rows="5" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="no_telepon"></td>
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