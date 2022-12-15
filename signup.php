<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signupcss.css">
	<title></title>
</head>
<body>
	        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header style="color:#088178;">Login</header>
                    <form action="control.php" method="post">
                        <div class="field input-field">
                            <input type="text" placeholder="UserName" class="input" name="name">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>
                        <?php
                            if(isset($_SESSION['message_signin'])){
                                $message=$_SESSION['message_signin'];
                                echo "<label style='color:red; margin-top:5px;'>$message</label>";
                            }
                        ?>
                        <div class="field button-field">
                            <button type="submit" name="signin" >Log in</button>
                        </div>
                        
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link" style="color:#088178;">Signup</a></span>
                    </div>
                </div>


            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header style="color:#088178;">Sign Up</header>
                    <form action="control.php" method="post">
                        <div class="field input-field">
                            <input type="text" placeholder="UserName" class="input" name="username">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password">
                        </div>

                        <div class="field input-field">
                            <input type="text" placeholder="Ponenumber" class="input" name="market">
                        </div>
                        <?php
                            if(isset($_SESSION['message_signup'])){
                                $message=$_SESSION['message_signup'];
                                echo "<label style='color:red'>$message</label>";
                            }
                        ?>

                        <div class="field button-field">
                            <button type="submit" name="signup">Sign Up</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link" style="color:#088178;">Login</a></span>
                    </div>
                </div>

            </div>
        </section>

        <!-- JavaScript -->
        <script src="sing-in/signjs.js"></script>


</body>
</html>