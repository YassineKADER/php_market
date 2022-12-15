<?php
require './../db_con.php';



?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" type="text/css" href="list-product.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<title></title>
</head>

<body>
	<section id="header">
		<p style="font-size:30px;font-weight: bold;padding-left: 20px ;cursor: pointer;"><span style="font-size: 35px;color:#088178;">S.</span>hop</p>
		<div class="btn-singn">
			<a href="./../signup.php" class="sign-up">Seller Space</a>
		</div>

	</section>

	<section id="hero">
		<h4>Trade in Offer</h4>
		<h2 style="font-size: 40px;">Super Value Deals</h2>
		<h1 style="font-size: 40px;">On all Products</h1>
		<!--<button class="btn" style="margin-top: -10px;cursor: pointer;"><a href="#" style="text-decoration: none;">Visite our Products</a></button>-->
		<div class="btn" style="margin-top: -10px;cursor: pointer;">
			<a href="#product" class="sign-up" style="text-decoration: none;"> Visite our Products</a>
		</div>

	</section>
	<section id="product">

		<h1 style="font-size: 50px;">Featured Products</h1>
		<p style="margin-top:-90px;margin-bottom: 50px;">New Modern Design </p>

		<div class="search">
			<form action="" method="post" id="myform">
			<a onclick="document.getElementById('myform').submit(); ">
			<div class="icon"></div>
			</a>
			<div class="input">
				<input type="text" name="search" placeholder="Search" id="mysearch">
			</div>
			</form>
			<span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
		</div>


		<div id="dpr" class="pro-container">
			<?php
			$query = "";
			if(isset($_POST['search'])){
				if($_POST['search'] != ""){
					$query = "SELECT * FROM products WHERE name LIKE '%".$_POST['search']."%';";
				}
				else{
					$query = "SELECT * FROM products;";
				}
			}
			else{
				$query = "SELECT * FROM products;";
			}
			
			$query_run = mysqli_query($con, $query);
			if (mysqli_num_rows($query_run) > 0) {
				foreach ($query_run as $product) {

			?>
					<div class="pro">
						<a href="./../product_view.php?id=<?= $product['id'];?>" style="text-decoration:none;">
						<img src="<?= $product['imgname'] ?>">
						<div class="des">
							<span><?= $product['username'] ?></span>
							<h5><?= $product['name'] ?></h5>
							<h4>$<?= $product['price'] ?></h4>
						</div>
						</a>
					</div>
			<?php
				};
			} else {
				echo "<h4>No item found !!!</h4>";
			}

			?>
		</div>


	</section>
</body>

</html>