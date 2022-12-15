<?php
session_start();
require 'db_con.php'
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./product_view.css" rel="stylesheet">
</head>

<body>
    <?php

    if (isset($_GET['id'])) {
        $pid = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM products WHERE id=$pid";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $product = mysqli_fetch_array($query_run);
    ?>
            
            <div class="container">
            <nav class="navbar" style="background-color: white;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./list/list-product.php">
                    <p style="font-size:30px;font-weight: bold;padding-left: 20px ;cursor: pointer;"><span style="font-size: 35px;color:#088178;">S.</span>hop</p>
                    </a>
                </div>
            </nav>
                <div class="row mt-5">
                    <div class="col-md-6" height="249" id="imgview">
                        <img src="<?= $product['imgname']?>" width="80%" style="margin: auto 0;">
                    </div>
                    <div class="col-md-6" id="description">
                        <?php
                        $username = $product['username'];
                        $query = "SELECT * FROM user where name='$username'";
                        $query_run = mysqli_query($con, $query);
                        $phone = mysqli_fetch_array($query_run);
                        ?>
                        <h3><?= $product['name']?></h3>
                        <h5><?= $product['categorie']?></h5>
                        <p><?= $product['description']?></p>
                        <h1>$<?= $product['price']?></h1>
                        <a href="https://wa.me/<?= $phone['phone']?>">
                        <button class="btn"><?= $phone['phone']?></button>
                        </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <h1>About The Product</h1>
                    <p><?= $product['fiche']?></p>
                </div>
            </div>
    <?php
        } else {
            echo "<h4>No Such Id</h4>";
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>