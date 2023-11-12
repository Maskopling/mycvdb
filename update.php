<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $host = "localhost";  // Ganti sesuai host Anda
    $username = "cvts"; // Ganti sesuai username MySQL Anda
    $password = "cvts1234"; // Ganti sesuai password MySQL Anda
    $database = "mycv"; // Ganti sesuai nama database Anda
    $koneksi = new mysqli($host, $username, $password, $database);

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

    // Ambil data yang dikirim melalui form
    $id = $_POST['id']; // ID data yang ingin diupdate
    $namabaru = $_POST['nama'];
    $alamatbaru = $_POST['alamat'];
    $teleponbaru = $_POST['telepon'];
    $emailbaru = $_POST['email'];
    $webbaru = $_POST['web'];
    $pendidikanbaru = $_POST['pendidikan'];
    $pengalaman_kerjabaru = $_POST['pengalaman_kerja'];
    $keterampilanbaru = $_POST['keterampilan'];

    // Update data dalam database
    $sql = "UPDATE datacv SET nama='$namabaru', alamat='$alamatbaru', telepon='$teleponbaru', email='$emailbaru', web='$teleponbaru', pendidikan='$pendidikanbaru', pengalaman_kerja='$pengalaman_kerjabaru', keterampilan='$keterampilanbaru' WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil diupdate.";

        // Setelah mengupdate data, kembalikan ke cv.php
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

form {
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}

textarea {
    height: 100px;
}

button {
    background-color: #008000;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #006400;
}

    </style>

</head>
<body>
<h1>Update Data</h1>
<form method="post" action="update.php">
    <input type="hidden" name="id" value="1"> <!-- Ganti dengan ID data yang ingin diupdate -->
    <label for="nama">Nama:</label>
    <input type="text" name=" nama" id="nama" value="">
    <br>
    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" id="alamat" value="">
    <br>
    <label for="telepon">Telepon:</label>
    <input type="text" name="telepon" id="telepon" value="">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="">
    <br>
    <label for="web">Web:</label>
    <input type="text" name="web" id="web" value="">
    <br>
    <label for="pendidikan">Pendidikan:</label>
    <textarea name="pendidikan" id="pendidikan" rows="3"></textarea>
    <br>
    <label for="pengalaman_kerja">Pengalaman Kerja:</label>
    <textarea name="pengalaman_kerja" id="pengalaman_kerja" rows="3"></textarea>
    <br>
    <label for="keterampilan">Keterampilan:</label>
    <textarea name="keterampilan" id="keterampilan" rows="3"></textarea>
    <br>
    <button class="btn btn-success">Submit</button>
</form>
</body>
</html>
