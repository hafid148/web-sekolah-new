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
$q1 = mysqli_query($db, $sql);

if ($q1->num_rows > 0) {
    header("location:dashboard.php");
    $done = "akun di temukan";
} else {
    $error = "akun tidak di temukan";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="center">
        <div class="wrap">
            <div class="main">
                <h1>LOGIN</h1>
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