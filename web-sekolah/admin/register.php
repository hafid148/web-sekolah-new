<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");

$dataMasuk="";
$dataGagal="";

if(isset($_POST['submit'])){
    $akun = $_POST['akun'];
    $sandi = $_POST['sandi'];

    $sql = "INSERT INTO login (akun, sandi) VALUES ('$akun', '$sandi')";
    if($db->query($sql)){
            $dataMasuk="Akun berhasil di daftar";
    }else{
        $dataGagal="data tidak berhasil di daftar";
    }

    mysqli_query($db, $sql);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="center">
    <div class="wrap">
        <div class="main">
            <h1>Register</h1>
            <div class="done" ><?php echo $dataMasuk; ?>
            <div class="done" ><?php echo $dataGagal; ?></div>
            </div>
            <form action="register.php" method="post">
                <label for="akun">username</label>
                <input type="text" name="akun" id="akun" maxlength="100" placeholder="enter your new username">
                <br>
                <label for="sandi">new password</label>
                <input type="text" name="sandi" id="sandi"  maxlength="100" placeholder="enter your new password">
                <button type="submit" name="submit">submit</button>
                <a href="index.php"><p>Already have an account? log in now</p></a>

            </form>
        </div>
    </div>
    </div>
</body>
</html>