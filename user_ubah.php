<?php
cek_level();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "Invalid ID.";
    exit();
}

if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];

    // Only update password if provided
    if (!empty($_POST['password'])) {
        $password = "password=MD5('{$_POST['password']}'),";
    } else {
        $password = ""; // No password update
    }

    $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', $password level='$level' WHERE id_user=$id");
    if ($query) {
        echo '<script>alert("Data updated successfully"); location.href="?page=user"</script>';
    } else {
        echo '<script>alert("Failed to update data: ' . mysqli_error($koneksi) . '");</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
if (!$query || mysqli_num_rows($query) == 0) {
    echo "No data found for the given ID.";
    exit();
}
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit User Data</h1>
    <a href="?page=user" class="btn btn-primary">Back</a>
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
                <td><input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="password" name="password" placeholder="Leave blank if unchanged"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                    <select class="form-control form-select" name="level">
                        <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="petugas" <?php echo ($data['level'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</div>
