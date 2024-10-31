<?php
    session_start();
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Outfit:wght@100..900&family=Pacifico&family=Sriracha&display=swap" rel="stylesheet">
</head>

<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .josefin-sans-400 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }

    .josefin-sans-600 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
    font-size: 20px;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <div class="josefin-sans-600">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>

                <div class="josefin-sans-600">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="josefin-sans-400">
                    <button type="submit" name="loginbtn" class="btn btn-success form-control mt-3">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3" style = "width: 500px;">
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
                    $countdata= mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if($countdata>0){
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: index.php');
                        }else{
                    ?>
                        <div class="alert alert-warning josefin-sans-400" role="alert">
                            Password Salah
                        </div>
                    <?php
                        }
                    }else{
                    ?>
                        <div class="alert alert-warning josefin-sans-400" role="alert">
                            Akun Tidak Tersedia
                        </div>
                    <?php
                    }
                }
            ?>
        </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>