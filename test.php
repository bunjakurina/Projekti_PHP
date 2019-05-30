
<?php
include_once 'databaseconfig.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAM);
if(!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}
$sql1="SELECT * FROM reser group by id  desc LIMIT 1;";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$person =new person($row1['emri'],$row1['mbiemri'],$row1['room']);
echo "Last reservation is made from ".$person->getName($row1['emri'])." ".$person->getSurname($row1['mbiemri'])." in room:".$person->getRoom( $row1['room']);
$sql = "Select * from reser";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['emri'] . "</td>";
        echo "<td>" . $row['mbiemri'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['room'] . "</td>";
        echo "<td>" . $row['checkin'] . "</td>";
        echo "<td>" . $row['checkout'] . "</td>";
        echo "</tr>";
    }

}
$conn->close();
?>
