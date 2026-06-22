<?php 
    $koneksi = mysqli_connect("localhost", "root", "root", "ifrndweekly");
    // if(!$koneksi){
    //   echo mysqli_connect_error();  
    // }else{
    //     echo "koneksi berhasil";
    // }

    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);

    // mysqli_fetch_row($result);

    // var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="/Frontend/Style/style.css">
    <link rel="stylesheet" href="/Frontend/Style/mahasiswa.css">
</head>

<body>
    <header>
        <h1>WEB RENALDI ARDIYAN</h1>
        <h3>PRAKTIKUM PEMROGRAMAN BERBASIS WEB 2026</h3>
    </header>

    <table class="menu" border="1" cellspacing="0" cellpadding="9">
        <tr>
            <td>
                <a href="/Frontend/Halaman/index.php">Home</a>
            </td>
            <td>
                <a href="/Frontend/Halaman/profile.php">Profile</a>
            </td>
            <td>
                <a href="/Frontend/Halaman/contact.php">Contact</a>
            </td>
            <td>
                <a href="/Frontend/Halaman/mahasiswa.php">Data Mahasiswa</a>
            </td>
            <td>
                <a href="/Frontend/Halaman/Tugas/tugas.php">Tugas</a>
            </td>
        </tr>
    </table>
    <h3>Data Mahasiswa</h3>
    <table class="data" border="0" cellspacing="0" cellpadding="10">
        <ttr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Foto</th>
            <th>Edit</th>



        </ttr>
        <?php 
        $no = 1;

        while($row = mysqli_fetch_assoc($result)):
    ?>
        <tr>
            <th><?= $no++;?></th>
            <th><?= $row['nama'];?></th>
            <th><?= $row['nim']?></th>
            <th><?= $row['jurusan']?></th>
            <th><?= $row['email']?></th>
            <th><?= $row['no_hp']?></th>
            <th><?= $row['foto']?></th>
            <th>
                <a href="ubahData.php?nim=<?= $row['nim']; ?>">
                    <button>Edit</button>
                </a>

                <a href="hapusData.php?nim=<?= $row['nim']; ?>"
                    onclick="return confirm('Yakin ingin menghapus data <?= $row['nama']; ?>?');">
                    <button>Hapus</button>
                </a>
            </th>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>

    <a href="inpuData.php">
        <button>Tambah Data</button>
    </a>
</body>

</html>