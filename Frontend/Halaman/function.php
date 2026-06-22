<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "ifrndweekly";

    // 1. Konsisten menggunakan Procedural Style
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function tampildata($query){
        global $conn; // Menggunakan global $conn agar seragam dengan function lain
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahdata($data, $photo){
        global $conn;

        // 2. Keamanan ganda: Mencegah XSS (htmlspecialchars) dan SQL Injection (mysqli_real_escape_string)
        $nama = mysqli_real_escape_string($conn, htmlspecialchars($data["nama_mhs"]));
        $Nim = mysqli_real_escape_string($conn, htmlspecialchars($data["Nim_mhs"]));
        $jurusan = mysqli_real_escape_string($conn, htmlspecialchars($data["jurusan"]));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($data["email"]));
        $no_hp = mysqli_real_escape_string($conn, htmlspecialchars($data["no_hp"]));
        
        $photoname = $photo['name'];
        $tmp_name = $photo['tmp_name'];
        $upload_dir = 'aset/' . $photoname;

        // Cek apakah ada file yang diunggah
        if ($photo['error'] === 4) {
            // Jika tidak ada foto yang diupload, beri nama file default (opsional)
            $photoname = 'default.png'; 
        } else {
            move_uploaded_file($tmp_name, $upload_dir);
        }

        $query = "INSERT INTO mahasiswa (nama_mhs, Nim_mhs, jurusan, email, no_hp, photo)
                  VALUES ('$nama', '$Nim', '$jurusan', '$email', '$no_hp', '$photoname')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapusData($id){
        global $conn;
        
        // Pastikan ID dipaksa menjadi angka (integer) untuk mencegah eksploitasi
        $id = (int)$id; 

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs = $id");

        return mysqli_affected_rows($conn);
    }

    function uabhData($data, $photo, $id){
        global $conn;

        $id = (int)$id;
        $nama = mysqli_real_escape_string($conn, htmlspecialchars($data["nama_mhs"]));
        $Nim = mysqli_real_escape_string($conn, htmlspecialchars($data["Nim_mhs"]));
        $jurusan = mysqli_real_escape_string($conn, htmlspecialchars($data["jurusan"]));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($data["email"]));
        $no_hp = mysqli_real_escape_string($conn, htmlspecialchars($data["no_hp"]));
        
        // Menangkap nama foto lama dari form (pastikan di form edit.php ada <input type="hidden" name="fotoLama">)
        $fotoLama = htmlspecialchars($data["fotoLama"]); 

        // 3. Logika Foto: Cek apakah user mengunggah foto baru saat diedit
        if ($photo['error'] === 4) {
            // Jika error bernilai 4 (tidak ada file baru), tetap gunakan nama foto yang lama
            $photoname = $fotoLama; 
        } else {
            // Jika ada file baru, jalankan proses upload dan timpa variabel photoname
            $photoname = $photo['name'];
            $tmp_name = $photo['tmp_name'];
            $upload_dir = 'aset/' . $photoname;
            
            move_uploaded_file($tmp_name, $upload_dir);
        }

        $query = "UPDATE mahasiswa SET
                    nama_mhs = '$nama',
                    Nim_mhs = '$Nim',
                    jurusan = '$jurusan',
                    email = '$email',
                    no_hp = '$no_hp',
                    photo = '$photoname'
                  WHERE id_mhs = $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>