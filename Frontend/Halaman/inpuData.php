<?php
    // Pastikan nama file ini sesuai dengan nama file tempat kamu menyimpan fungsi CRUD
    require 'function.php';

    if(isset($_POST["submit"])){
        // Mengubah spasi menjadi underscore pada nama untuk menghindari error saat upload
        $nama_tanpa_spasi = str_replace(' ', '_', $_POST['nama_mhs']);
        $_FILES['photo']['name'] = $nama_tanpa_spasi . '_' . $_FILES['photo']['name'];

        if (tambahdata($_POST, $_FILES['photo']) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
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
    <title>Input Data</title>
    <link rel="stylesheet" href="/Frontend/Style/style.css">
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

    <h2>Input Data Mahasiswa</h2>
    <form>
        <table border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td><label for="nama">Nama: </label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label for="uts">UTS</label></td>
                <td>:</td>
                <td><input type="number" name="uts" id="uts"></td>
            </tr>
            <tr>
                <td><label for="uas">UAS</label></td>
                <td>:</td>
                <td><input type="number" name="uas" id="uas"></td>
            </tr>
            <tr>
                <td><label for="tugas">Tugas</label></td>
                <td>:</td>
                <td><input type="number" name="tugas" id="tugas"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" value="kirim data"></td>
            </tr>
        </table>

    </form>

</body>

</html>