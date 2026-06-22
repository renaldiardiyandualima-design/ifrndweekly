<?php
    // Pastikan nama filenya benar
    require 'function.php';

    $id = $_GET["id"];

    // Menarik data mahasiswa berdasarkan ID
    $query = "SELECT * FROM mahasiswa WHERE id_mhs = $id";
    $mhs = tampildata($query)[0];

    // Proses jika tombol submit ditekan
    if(isset($_POST["submit"])){
        if (editdata($_POST, $_FILES['photo'], $id) > 0){
            echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diubah atau tidak ada perubahan data.');
                    document.location.href = 'mahasiswa.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style/inputdata.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="mahasiswa.php">Data</a></li>
        </ul>
    </nav>

    <h2>Edit Data Mahasiswa</h2>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fotoLama" value="<?= $mhs['photo']; ?>">

        <table>
            <tr>
                <td><label for="nama_mhs">Nama :</label></td>
                <td><input type="text" id="nama_mhs" name="nama_mhs" value="<?= $mhs['nama_mhs']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="Nim_mhs">NIM :</label></td>
                <td><input type="text" id="Nim_mhs" name="Nim_mhs" value="<?= $mhs['Nim_mhs']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan :</label></td>
                <td><input type="text" id="jurusan" name="jurusan" value="<?= $mhs['jurusan']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="email" id="email" name="email" value="<?= $mhs['email']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="no_hp">Nomor HP :</label></td>
                <td><input type="text" id="no_hp" name="no_hp" value="<?= $mhs['no_hp']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="photo">Foto :</label></td>
                <td>
                    <span style="font-size: 12px; color: gray;">Foto saat ini: <?= $mhs['photo']; ?></span><br>
                    <input type="file" id="photo" name="photo">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit">
                    <input type="button" name="cancel" value="Cancel" onclick="window.location.href='mahasiswa.php';">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>