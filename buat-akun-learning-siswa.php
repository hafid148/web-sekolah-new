<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");
$id = "";
$dataMasuk = "";
$dataGagal = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $nis = $_POST['nis'];
    $sandi = $_POST['sandi'];

    $sql = "INSERT INTO murid_learning VALUES ('$id','$nama','$kelas','$jurusan','$nis','$sandi')";
    $q1 = mysqli_query($db, $sql);

    $dataMasuk = "data berhasil terkirim";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register-learning.css">
</head>

<body>
    <div class="center">
        <div class="wrap">
            <div class="main">
                <h1>Buat akun siswa</h1>
                <div class="done"><?php echo $dataMasuk; ?>
                    <div class="done"><?php echo $dataGagal; ?></div>
                </div>
                <form action="" method="post">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" id="akun" maxlength="100" placeholder="enter your new name">
                    <br>
                    <label for="kelas">kelas</label>
                    <select name="kelas">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <label for="jurusan">jurusan</label>
                    <select name="jurusan">
                        <option value="tkj">TKJ</option>
                        <option value="bdp">BDP</option>
                        <option value="mp">MP</option>
                    </select>
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" placeholder="enter your nis">
                    <label for="sandi">new password</label>
                    <input type="text" name="sandi" id="sandi" maxlength="100" placeholder="enter your new password">
                    <button type="submit" name="submit">submit</button>
                    <a href="login-elearning.php">
                        <p>Sudah punya akun?login sekarang</p>
                    </a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>