<?php
include('config.php');

$getDataSQL = "SELECT t.* FROM a_prime.hoa_street t where hoaStreet='Noble'";
$getDataResult = mysqli_query($db_conn, $getDataSQL);

if (mysqli_num_rows($getDataResult) > 0) {
    while($row = $getDataResult->fetch_assoc()) {
        echo "ID: ". $row['hoaStreetID']. " - Street: ". $row['hoaStreet']. "<br>";
    }
}
$last_id = mysqli_insert_id($db_conn);
echo "New record created successfully. Last inserted ID is: " . $last_id;