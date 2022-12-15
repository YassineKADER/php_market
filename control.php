<?php
require 'db_con.php';

session_start();

if (isset($_POST['save-product'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $fiche = mysqli_real_escape_string($con, $_POST['fiche']);
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']);
    $username = mysqli_real_escape_string($con, $_SESSION['username']);
    $query = "INSERT INTO products (name,price,description,fiche,imgname,categorie, username) VALUES 
            ('$name', '$price', '$description', '$fiche','$image','$categorie','$username')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Product Added Successfuly";
        header("Location: products.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Added ".$username;
        header("Location: products.php");
        exit(0);
    }
}

if (isset($_POST['update-product'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $fiche = mysqli_real_escape_string($con, $_POST['fiche']);
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $categorie = mysqli_real_escape_string($con, $_POST['categorie']);
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $query = "UPDATE products SET name='$name',price='$price',description='$description',fiche='$fiche', imgname='$image', categorie='$categorie' WHERE id =$id AND username='$username'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Product Updated Successfuly";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = $query;
        header("location: index.php");
        exit(0);
    }
}

if (isset($_POST['delete_prod'])) {
    $id = $_POST['delete_prod'];
    echo "done";
    $query = "DELETE FROM products WHERE id = $id;";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Product Deleted Successfuly";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $market = mysqli_real_escape_string($con, $_POST['market']);
    $query = "INSERT INTO user(name, password, phone) VALUES('$username', '$pass', '$market');";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        $_SESSION['message_signup'] = null;
        //$_SESSION['username'] = $username;
        header("Location: signup.php");
    }
    else{
        header("Location: signup.php");
        $_SESSION['message_signup'] = "Username already exist !!!";
        $_SESSION['message_signin'] = "Username already exist !!!".$query;
    }
}

if(isset($_POST['signin'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $query = "SELECT * FROM user WHERE name = '$name' and password = '$pass';";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run)>0){
        header("Location: index.php");
        $_SESSION['message_signin']=null;
        $_SESSION['username'] = $_POST['name'];
    }
    else{
        $_SESSION['message_signin'] = "Username or password incorrect !!!!";
        header("Location: signup.php");
    }
}
echo "hello";
?>