<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");

$id = "";
$dataMasuk = "";
$dataGagal = "";

if (isset($_POST['submit'])) {
    $akun = $_POST['akun'];
    $sandi = $_POST['sandi'];
    $mapel = $_POST['mapel'];

    $sql = "INSERT INTO guru_learning VALUES ('$id','$akun', '$sandi','$mapel','$status')";
    $q1 = mysqli_query($db, $sql);
    $dataMasuk = "data terkirim";
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
                <h1>Buat akun guru</h1>
                <div class="done"><?php echo $dataMasuk; ?>
                    <div class="done"><?php echo $dataGagal; ?></div>
                </div>
                <form action="" method="post">
                    <label for="akun">username</label>
                    <input type="text" name="akun" id="akun" maxlength="100" placeholder="enter your new username">
                    <br>
                    <label for="sandi">new password</label>
                    <input type="text" name="sandi" id="sandi" maxlength="100" placeholder="enter your new password">
                    <br>
                    <label for="mapel">mapel</label>
                    <select name="mapel">
                        <option value="Matematika">matematika</option>
                        <option value="ipas">ipas</option>
                        <option value="B.Indo">B.Indo</option>

                    </select>
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