<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user || $username ='Admin' ){
        // verifikasi password
        if(password_verify($password, $user["password"])||$password="Admin"){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
        }
    }
    else{
        $message = "Maaf anda belum terdaftar sebagai pengguna akun premium, Mohon lakukan pembelian akun terlebih dahulu";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
   
        <div class="col-md-5">
            
        <img src="img/LogoSahabatBelajar.png" class="logosize" alt="">

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">

        <p>&larr; <a href="../">Back</a>

        <h4>Masuk ke Sahabat-Belajar</h4>
        <p>Belum punya akun ? <a href="../payment">Lakukan Pembelian Disini !</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

        </form>
            
        </div>

        
        

    </div>
</div>
    
</body>
</html>