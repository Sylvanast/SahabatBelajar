<!--<?php require_once("auth.php"); ?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Timeline Sahabat Belajar !</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>
                    <a href='../PremiumUser'><button type="button" class="btn btn-success">Mulai Kelas!</button></a>
                    <a href='logout.php'><button type="button" class="btn btn-danger" >Logout</button></a>
                </div>
            </div>

            
        </div>


        <div class="col-md-8">

            <form action="" method="post" />
                <div class="form-group">
                    <textarea class="form-control" placeholder="Apa yang kamu ingin catat hari ini?"></textarea>
                </div>
            </form>

            <?php for($i=0; $i < 6; $i++){ ?>
            <div class="card mb-3">
                <div class="card-body">
                    Disini ada Post Catatan Harian Pengguna
                </div>
            </div>
            <?php } ?>
            
        </div>
    
    </div>
</div>

</body>
</html>