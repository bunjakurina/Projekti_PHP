
<?php
define("Hotel", "Welcome to our Hotel!");
session_start();
include_once 'person.php';
$person=new person($_SESSION['username'],"","");

echo "<h1>".$person->getName($_SESSION['username'])."</h1>";
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

<!-- Navigation Bar -->
<?php
if( isset( $_SESSION['numeruesi'] ) )
{
    $_SESSION['numeruesi'] += 1;
}
else
{
    $_SESSION['numeruesi'] = 1;
}

$msg = "Ju keni vizituar kete faqe ". $_SESSION['numeruesi'];
echo $msg;


?>
<div class="w3-bar w3-white w3-large">
    <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Logo</a>
    <a href="#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
    <a href="#about" class="w3-bar-item w3-button w3-mobile">About</a>
    <a href="#contact" class="w3-bar-item w3-button w3-mobile">Contact</a>

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
                    echo  $_COOKIE[$cookie_name].$cookie_name;}
                ?>
            </h2>
            <h2><i class="fa fa-bed w3-margin-right"></i><a href="#room">Reserve now</a></h2>
        </div>
    </div>
    </div>
</header>
<div class="w3-content" style="max-width:1532px;">
    <div class="w3-container w3-margin-top" id="rooms">
        <h3>Rooms</h3>
        <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
        <?php
        /*index array*/
        $room=array("Single Room","Double Room","Deluxe Room");
        echo "We have  three types of rooms: " . $room[0] . ", " . $room[1] . " and " . $room[2] . ".";
        /*associative array*/

        $age=array("single"=>"99","double"=>"149","delux"=>"199");
        /*multidimensional array*/
        $floor=array
        (
            array("Single Room",1,2),
            array("Double Room",2,3),
            array("Deluxe Room",3,5)
        );
        echo "<br>".$floor[0][0]." are placed between ".$floor[0][1]."st and ".$floor[0][2]."nd floor<br>";
        echo $floor[1][0]." are placed between ".$floor[1][1]."nd and ".$floor[1][2]."rd floor<br>";
        echo $floor[2][0]." are placed between ".$floor[2][1]."rd and ".$floor[2][2]."th floor<br>";
        ?>
    </div>
    <div class="w3-row-padding w3-padding-16" id="room">

        <div class="w3-third w3-margin-bottom">
            <img src="w3images/room_single.jpg" alt="Norway" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Single Room</h3>
                <h6 class="w3-opacity"><?php
                    echo "From $".$age['single'];
                    ?></h6>
                <p>Single bed</p>
                <p>15m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
                <button class="w3-button w3-block w3-black w3-margin-bottom"><a href="reservation.php"> Choose Room</a></button>
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
            <img src="w3images/room_double.jpg" alt="Norway" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Double Room</h3>
                <h6 class="w3-opacity"><h6 class="w3-opacity"><?php
                        echo "From $".$age['double'];
                        ?></h6></h6>
                <p>Queen-size bed</p>
                <p>25m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
                <button class="w3-button w3-block w3-black w3-margin-bottom"><a href="reservation1.php"> Choose Room</a></button>
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
            <img src="w3images/room_deluxe.jpg" alt="Norway" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Deluxe Room</h3>
                <h6 class="w3-opacity"><h6 class="w3-opacity"><?php
                        echo "From $".$age['delux'];
                        ?></h6></h6>
                <p>King-size bed</p>
                <p>40m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
                <button class="w3-button w3-block w3-black w3-margin-bottom"><a href="reservation2.php"> Choose Room</a></button>
            </div>
        </div>
        <?php
        sort($age);
        echo "Our lowest price for room  is ".$age[0]."<br>";

        rsort($age);
        echo "Our highest price for room  is ".$age[0];
        ?>
    </div>


    <div class="w3-row-padding" id="about">
        <div class="w3-col l4 12">
            <h3>About</h3>
            <h6>Our hotel is one of a kind. It is truely amazing.
                <?php

                echo "Our hotel has ".strlen($str1)." stars";
                ?>
                iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
            <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
        </div>
        <div class="w3-col l8 12">
            <!-- Image of location/map -->
            <img src="w3images/map.jpg" class="w3-image w3-greyscale" style="width:100%;">
        </div>
    </div>

    <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
        <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i> 423 Some adr, Chicago, US</div>
        <div class="w3-third"><i class="fa fa-phone w3-text-red"></i> Phone: +00 151515</div>
        <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: mail@mail.com</div>
    </div>

    <div class="w3-panel w3-red w3-leftbar w3-padding-32">
        <h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i>
            <?php

            $phrase  = "On demand, we can offer playstation, babycall and children care.";
            $h = array("playstation", "babycall", "children care");
            $y   = array("pool", "massage", "playstation");
            $newphrase = str_replace($h, $y, $phrase);
            echo "<a href='hangman/hangmanindex.php'>".$newphrase."</a>";
            ?></h6>
    </div>
    <div class="w3-container">
        <h3>Our Hotels</h3>
        <h6>You can find our hotels anywhere in the world:</h6>
    </div>

    <div class="w3-row-padding w3-padding-16 w3-text-white w3-large">
        <div class="w3-half w3-margin-bottom">
            <div class="w3-display-container">
                <img src="w3images/cinqueterre.jpg" alt="Cinque Terre" style="width:100%">
                <span class="w3-display-bottomleft w3-padding">Cinque Terre</span>
            </div>
        </div>
        <div class="w3-half">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half w3-margin-bottom">
                    <div class="w3-display-container">
                        <img src="w3images/newyork2.jpg" alt="New York" style="width:100%">
                        <span class="w3-display-bottomleft w3-padding">New York</span>
                    </div>
                </div>
                <div class="w3-half w3-margin-bottom">
                    <div class="w3-display-container">
                        <img src="w3images/sanfran.jpg" alt="San Francisco" style="width:100%">
                        <span class="w3-display-bottomleft w3-padding">San Francisco</span>
                    </div>
                </div>
            </div>
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half w3-margin-bottom">
                    <div class="w3-display-container">
                        <img src="w3images/pisa.jpg" alt="Pisa" style="width:100%">
                        <span class="w3-display-bottomleft w3-padding">Pisa</span>
                    </div>
                </div>
                <div class="w3-half w3-margin-bottom">
                    <div class="w3-display-container">
                        <img src="w3images/paris.jpg" alt="Paris" style="width:100%">
                        <span class="w3-display-bottomleft w3-padding">Paris</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin:32px 0;">
        <h2>Get the best offers first!</h2>
        <p>Join our newsletter.</p>
        <label>E-mail</label>
        <input class="w3-input w3-border" type="text" placeholder="Your Email address">
        <button type="button" class="w3-button w3-red w3-margin-top">Subscribe</button>
    </div>

    <div class="w3-container" id="contact">
        <h2><?php
            $s="Contact";
            printf("[%10s]\n",    $s);
            ?></h2>
        <p>If you have any questions, do not hesitate to ask them.</p>
        <i class="fa fa-map-marker w3-text-red" style="width:30px"></i><?php
        $s="Chicago, US";
        printf("[%'#10s]\n",    $s);
        ?> <br>
        <i class="fa fa-phone w3-text-red" style="width:30px"></i>
        <?php
        echo substr('Phone: +00 151515', 0, 16);  // bcd
        ?><br>
        <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> <?php
        $str = 'Email: mail@mail.com';
        print_r(explode(',',$str,0));?><br>
        <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
            <p><button class="w3-button w3-black w3-padding-large" type="submit">SEND MESSAGE</button></p>
        </form>
    </div>
    </div>
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
    <h5><?php
        $arr = array('Find', 'Us', 'On');
        echo implode(" ",$arr);
        ?></h5>
    <div class="w3-xlarge w3-padding-16">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <?php
    echo "PHP Self".$_SERVER['PHP_SELF'];
    ?>
</footer>
<script>
    function myMap() {
        myCenter=new google.maps.LatLng(41.878114, -87.629798);
        var mapOptions= {
            center:myCenter,
            zoom:12, scrollwheel: false, draggable: false,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
</body>
</html>