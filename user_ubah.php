<?php

session_start();
 if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    echo "Akses ditolak. Hanya admin yang dapat mengakses halaman ini.";
    header('location:?page=home');
    exit();
}
$id = $_GET['id'];
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password=MD5('$password'), level='$level' WHERE id_user=$id");
    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=user"</script>';
    } else {
        echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data Akun</h1>
    <ol class="breadcrumb mb-4">
    </ol>
    <a href="?page=user" class="btn btn-primary">Kembali</a>
    <hr>
    <form method="post">
        <table class="table table-border">
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo $data['nama']; ?>" type="text" name="nama"></td>
            </tr>
            <tr>
                <td width="200">Username</td>
                <td width="10">:</td>
                <td><input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" value="<?php echo $data['password']; ?>" type="text" step="0"
                        name="password"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                    <select class="form-control form-select" name="level">
                        <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>admin</option>
                        <option value="petugas" <?php echo ($data['level'] == 'petugas') ? 'selected' : ''; ?>>petugas
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">submit</button>
                </td>
            </tr>

        </table>

    </form>
</div>