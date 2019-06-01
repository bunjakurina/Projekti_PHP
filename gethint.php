<?php
include_once 'databaseconfig.php';
$q = intval($_GET['q']);

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAM);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,DBNAM);
$sql="SELECT * FROM reser WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table border='1' style='color: #2b542c'>
<tr>
<th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Room</th>
        <th>CheckIn</th>
        <th>CheckOut</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['emri'] . "</td>";
    echo "<td>" . $row['mbiemri'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['room'] . "</td>";
    echo "<td>" . $row['checkin'] . "</td>";
    echo "<td>" . $row['checkout'] . "</td>";
}
echo "</table>";
mysqli_close($con);
?>