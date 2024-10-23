<?php
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "INSERT INTO user(nama,username,password,level) VALUES('$nama','$username', MD5('$password'), '$level')");
    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=user"</script>';
    } else {
        echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }

}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Akun</h1>
    <ol class="breadcrumb mb-4">
    </ol>
    <a href="?page=user" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td width="200">Username</td>
                <td width="10">:</td>
                <td><input class="form-control" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="text" step="0" name="password"></td>
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