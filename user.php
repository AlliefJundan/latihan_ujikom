<?php
session_start();
 if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    echo "Akses ditolak. Hanya admin yang dapat mengakses halaman ini.";
    header('location:?page=home');
    exit();
}
?>



<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Akun</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Akun</li>
    </ol>
    <a href="?page=user_tambah" class="btn btn-primary"> + Tambah Akun</a>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['level']; ?></td>

                    <td>
                        <a href="?page=user_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-primary">Ubah</a>
                        <a href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</div>
