<?php

//tangkap dulu datanya

if (isset($_POST['submit'])) {

    $nim  =  $_POST['nim'];
    $nama  = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $tpt_lahir  =  $_POST['tpt_lahir'];
    $tgl_lahir  =  $_POST['tgl_lahir'];
    $gender  =  $_POST['gender'];
    $alamat  =  $_POST['alamat'];

//1. buat koneksi dengan mysqli
$con = mysqli_connect("localhost", "root", "", "fakultas");

//2. cek koneksi dengan mysqli
if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_error();
} else {
    echo "koneksi berhasil";
}
//buat sql query insert ke database
//buat query insert dan jalankan
$sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
        values ($id_jurusan,'$nim', '$nama', '$gender', '$tpt_lahir', '$tgl_lahir', '$alamat')";


//jalankan query 
if (mysqli_query($con, $sql)) {
    echo "data berhasil ditambahkan";
} else {
    echo "ada error" . mysqli_error($con);
}

//5. tutup koneksi mysql
mysqli_close($con);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>

<body>
    <form action="insert.php" method="post">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        ID Jurusan: <input type="number" name="id_jurusan"><br>
        Jenis Kelamin: <input type="text" name="gender"><br>
        Tempat lahir: <input type="text" name="tpt_lahir"><br>
        Tanggal lahir (yyyy- mm- dd): <input type="text" name="tgl_lahir"><br>
        Alamat: <input type="text" name="alamat"><br>
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>

</html>