<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
            padding: 20px;
        }
        .cv-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        img {
            display: block;
            margin: 0 auto;
            width: 155px;
            height: 160px;
            border: 2px solid #007BFF;
            border-radius: 47%;
        }
        .edit-button {
            text-align: right;
            width: 52%;  
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border: none;
            border-bottom: 1px solid #007BFF;
            border-radius: 0;

        }
        .form-control[readonly] {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: none;
        }
    </style>

    <title>CV</title>
</head>
<body>
<?php
// Koneksi ke database
$host = "localhost";  
$username = "cvts"; 
$password = "cvts1234"; 
$database = "mycv";
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Ambil data dari database
$sql = "SELECT * FROM datacv WHERE id = 1"; 
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <h1>CV | Muhammad Syafiq Agil</h1>
    <br><br>
    <!-- Menampilkan Foto Profile -->
    <div class="mb-3">
        <img src="pp.jpeg" alt="Foto Profile">
    </div>

        <!-- Tombol untuk menghubungkan ke update.php -->
    <div class="edit-button">
        <a class="btn btn-warning" href="update.php">Edit</a>
    </div>

    <!-- Kerangka CV -->
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" rows="3" name="alamat" readonly><?php echo $row['alamat']; ?></textarea>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Telepon</label>
            <input type="text" class="form-control" name="telepon" value="<?php echo $row['telepon']; ?>" readonly>
        </div>
        <div class="col">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Web</label>
        <input type="text" class="form-control" name="web" value="<?php echo $row['web']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Pendidikan</label>
        <textarea class="form-control" rows="3" name="pendidikan" readonly><?php echo $row['pendidikan']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
        <textarea class="form-control" rows="3" name="pengalaman_kerja" readonly><?php echo $row['pengalaman_kerja']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="keterampilan" class="form-label">Keterampilan</label>
        <textarea class="form-control" rows="3" name="keterampilan" readonly><?php echo $row['keterampilan']; ?></textarea>
    </div>

<?php

} else {
    echo "Data tidak ditemukan.";
}

// Tutup koneksi
$koneksi->close();
?>
</body>
</html>