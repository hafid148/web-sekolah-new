<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");
$done = "";
$error = "";

if (isset($_POST['login'])) {
    $akun   = $_POST['akun'];
    $sandi  = $_POST['sandi'];
}

@$sql = "SELECT * FROM login WHERE 
    akun='$akun' AND sandi='$sandi'
    ";
$result = $db->query($sql);
if ($db->query($sql)) {
} else {
}

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    header("location:dashboard.php");
    $done = "akun di temukan";
} else {
    $error = "masukan nama dan sandi dengan benar";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login e learing</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="center">
        <div class="wrap">
            <div class="main">
                <img src="elearning.png" alt="" width="100%">
                <div class="error"><?php echo $error; ?></div>
                <div class="error"><?php echo $done; ?></div>

                <form action="index.php" method="post">
                    <label for="akun">user</label>
                    <input type="text" name="akun" id="akun" maxlength="100" placeholder="enter your username">
                    <br>
                    <label for="sandi">password</label>
                    <input type="password" name="sandi" id="sandi" maxlength="100" placeholder="enter your password">

                    <button type="submit" name="login" value=<?php echo date("h:i:sa") ?>>Login</button>
                    <a href="register.php" .>
                        <p>create account</p>

                </form>

            </div>
        </div>
    </div>
</body>

</html>