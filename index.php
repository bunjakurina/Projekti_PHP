<?php
define("Hotel", "Welcome to our Hotel!");
?>
<html>
<title>
    <?php
    echo Hotel;
    ?>
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css1.css">
<link rel="stylesheet" href="css2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">
<div class="w3-bar w3-white w3-large">
    <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Logo</a>
    <a href="login.php" class="w3-bar-item w3-button w3-mobile">Rooms</a>
    <a href="login.php" class="w3-bar-item w3-button w3-mobile">About</a>
    <a href="login.php" class="w3-bar-item w3-button w3-mobile">Contact</a>

    <a href="login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Log in</a>
</div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="w3images/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
    <div class="w3-display-left w3-padding w3-col l6 m8">
        <div class="w3-container w3-red">
            <h2><i class="fa w3-margin-right"></i>
                <?php
                $str1='*****';
                $cookie_name = $str1;
                $cookie_value = "Hotel";
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                if(!isset($_COOKIE[$cookie_name])) {
                    echo "Cookie named '" . $cookie_name . "' is not set!";
                } else {
                    echo  $_COOKIE[$cookie_name].$cookie_name;

                }

                ?>
                </h2>
            <h2><i class="fa fa-bed w3-margin-right"></i><a href="#room">Reserve now</a></h2>
        </div>

        </div>
    </div>
</header>
</body>
</html>
