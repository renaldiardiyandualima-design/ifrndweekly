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
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Depan </th>
            <th rowspan="2">Nama Belakang</th>
            <th rowspan="2">Gambar</th>
            <th colspan="3">NIlai</th>
            <th rowspan="2">Kelas</th>
        </tr>
        <tr>
            <th>UTS</th>
            <th>UAS</th>
            <th>Tugas</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Renaldi</td>
            <td>Ardiyan</td>
            <td>
                <img src="/Asset/Image/renaldi.jpeg" alt="renaldi" width="100px" height="150px">
            </td>
            <td>A</td>
            <td>SS</td>
            <td>S</td>
            <td rowspan="3">C</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Anam</td>
            <td>Wibu</td>
            <td>
                <img src="/Asset/Image/anam.jpeg" alt="anam" width="100px" height="150px">
            </td>
            <td>A</td>
            <td>SS</td>
            <td>S</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sirot</td>
            <td>Jarot</td>
            <td>
                <img src="/Asset/Image/sirot.jpeg" alt="sirot" width="100px" height="150px">
            </td>
            <td>A</td>
            <td>S</td>
            <td>S</td>
        </tr>
    </table>
    <br>

    <a href="inpuData.php">
        <button>Tambah Data</button>
    </a>
</body>

</html>