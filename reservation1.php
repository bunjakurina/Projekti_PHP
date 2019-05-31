
<?php

include_once 'person.php';

$nameErr = $emailErr = $checkinErr =$surnameErr= $roomErr = $checkoutErr = "";
$name = $email = $checkout = $surname = $room = $checkin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["surname"])) {
        $surnameErr = "surname is required";
        $nameErr="Name is required";
        $name="";
    } else {
        $surname = test_input($_POST["surname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $surnameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }



    if (empty($_POST["room"])) {
        $roomErr = "Room number is required";
    } else {
        $room = test_input($_POST["room"]);
    }




    if (empty($_POST["checkin"])) {

        $checkinErr= "CheckIn date is required";
    } else {
        $checkin = test_input($_POST["checkin"]);
    }


    if (empty($_POST["checkout"])) {

        $checkoutErr= "CheckOut date is required";
    } else {
        $checkout = test_input($_POST["checkout"]);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
?>
<?php
include "databaseconfig.php";

try {
    $conn = new PDO("mysql:host=". HOST . ";dbname=" . DBNAM, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stm2 = $conn->prepare("INSERT INTO reser(emri, mbiemri, email,gender,room,checkin,checkout)
                                    VALUES(:emri, :mbiemri, :email,:gender,:room,:checkin,:checkout)");
    $stm2->bindParam(':emri', $name);
    $stm2->bindParam(':mbiemri', $surname);
    $stm2->bindParam(':email', $email);
    $stm2->bindParam(':gender',$gender);
    $stm2->bindParam(':room',$room);
    $stm2->bindParam(':checkin',$checkin);
    $stm2->bindParam(':checkout',$checkout);

    $stm2->execute();

    header("Location: reservation1.php");

    echo "Connection successfully";

} catch(PDOException $ex) {
     $ex->getMessage();
}
?>
<html>
<head>
    <title>Rezervimi</title>
    <link rel="stylesheet" href="css1.css">
    <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.cssrm">
    <style>
        .kuq {color: #FF0000;}
    </style>
</head>
<body>
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="w3images/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
    <div class="w3-display-left w3-padding w3-col l6 m8">
        <div class="w3-container w3-red">
            <h2><i class="fa fa-bed w3-margin-right"></i>Reservation info</h2>
        </div>
        <div class="w3-container w3-white w3-padding-16">
            <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i> Emri</label>
                        <span class="kuq">* <?php echo $nameErr;?></span>
                        <input class="w3-input w3-border" type="text"  name="name">

                    </div>
                    <div class="w3-half">

                        <label><i class="fa fa-calendar-o"></i> Mbiemri</label>
                        <span class="kuq">* <?php echo $surnameErr;?></span>
                        <input class="w3-input w3-border" type="text"  name="surname" >
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i>Email</label>
                        <span class="kuq">* <?php echo $emailErr;?></span>
                        <input class="w3-input w3-border" type="text"  name="email">
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-calendar-o"></i> Gender</label>
                        <br>
                        <br>
                        <input  type="radio"  name="gender" value="m">Male
                        <input type="radio" name="gender" value="f">Female
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i> Check In</label>
                        <span class="kuq">* <?php echo $checkinErr;?></span>
                        <input class="w3-input w3-border"  type="date"   name="checkin">
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-calendar-o"></i> Check Out</label>
                        <span class="kuq">* <?php echo $checkoutErr;?></span>
                        <input class="w3-input w3-border" type="date"  name="checkout" >
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-male"></i> Room</label>
                        <span class="kuq">* <?php echo $roomErr;?></span>
                        <input class="w3-input w3-border" type="text"  name="room" >
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i> Adults</label>
                        <input class="w3-input w3-border" type="number"  name="Adults" min="1" max="4">
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-calendar-o"></i> Kids</label>
                        <input class="w3-input w3-border" type="number"  name="kids" min="1" max="6" >
                    </div>
                </div>
                <button class="w3-button w3-dark-grey" type="submit" name="submit"><i class="fa fa-search w3-margin-right"></i>Submit</button>
                <button class="w3-button w3-dark-grey" type="reset" name="reset"><i class="fa fa-search w3-margin-left"></i>Reset</button>
                            </form>
        </div>
    </div>
</header>
<table border="1">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Room</th>
        <th>CheckIn</th>
        <th>CheckOut</th>
    </tr>
    <?php
    include 'test.php';
    ?>
</table>
</body>
</html>