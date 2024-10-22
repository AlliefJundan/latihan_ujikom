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
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
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