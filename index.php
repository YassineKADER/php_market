<?php
session_start();
require 'db_con.php';

if(!isset($_SESSION['username'])){
    die();
}
else{
    $username = $_SESSION['username'];
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php include("message.php") ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="padding-top: 20px;">Product Details</h4>
                        <a href="products.php" class="btn btn-primary float-end" style="margin-bottom: 20px;">Add Products</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-border">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Image</th>
                                    <th>NAME</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th width="50%">Fiche Technique</th>
                                    <th>Categorie</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM products WHERE username='$username';";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $product) {
                                ?>
                                        <tr height="110px">
                                            <td style="text-align: center;">
                                                <img height="100px" width="100px" src="<?= $product['imgname']; ?>">
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $product['name']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $product['price']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $product['description']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $product['fiche']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $product['categorie']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                
                                                <form action="control.php" method="post">
                                                    <a href="products-edit.php?id=<?= $product['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="submit" name="delete_prod" value="<?=$product['id']?>" class="btn btn-danger btn-sm">Delete</button>
                                                    <a href="product_view.php?id=<?= $product['id']; ?>" class="btn btn-success btn-sm">View</a>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    };
                                } else {
                                    echo "<h5>No Product Founds</h5>";
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>