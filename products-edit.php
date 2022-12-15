<?php
session_start();
require 'db_con.php';

if (!isset($_SESSION['username'])) {
    die();
} else {
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
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Product</h4>
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $pid = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM products WHERE id='$pid' AND username='$username'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $product = mysqli_fetch_array($query_run);
                        ?>
                                <form action="control.php?id=<?= $product['id']; ?>" method="POST">
                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <input type="text" name="name" value=<?= $product['name'] ?> class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Price</label>
                                        <input type="text" name="price" value=<?= $product['price'] ?> class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Desctription</label>
                                        <input type="text" name="description" value=<?= $product['description'] ?> class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Technical Sheet</label>
                                        <input type="text" name="fiche" value=<?= $product['fiche'] ?> class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Image URL</label>
                                        <input class="form-control" type="text" name="image" value=<?= $product['imgname'] ?> id="formFile">
                                    </div>
                                    <div>
                                        <label>Product Categorie</label>
                                        <select class="form-select" name="categorie" aria-label="Default select example" value=value=<?= $product['categorie'] ?> >
                                            <option>Cars</option>
                                            <option>Fashion</option>
                                            <option>Tech</option>
                                            <option>Food</option>
                                            <option>Health</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update-product" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id</h4>".$username;
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>