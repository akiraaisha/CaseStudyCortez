<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="css/semantic.js"></script>
    <style>
        th {text-align: center;
            color: #20a826;
            background-color: #d9ffc7;
        }
        tr:nth-child(even) {
            background: #ffffff;
        }
        tr:nth-child(odd) {
            background: #eaeaea;
        }
    </style>
</head>
<body>
<table class="ui table celled" style="width:50%; margin-left: auto;margin-right: auto;margin-top: 5%">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact</th>
        <th>Type</th>
        <th>Number</th>
        <th>Street</th>
    </tr>

<?php
    include('config.php');
    $sql = "
SELECT member.id, Fname, Lname, contact, type, number, street
 FROM a_prime.member
 INNER JOIN a_prime.member_type mt ON mt.id=member.member_type_id
 INNER JOIN a_prime.address ma ON ma.id=member.address_id";

    $result = $db_conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result-> fetch_assoc()) {
            echo "<tr><td>" . $row["id"];
            echo "</td><td>" . $row["Fname"];
             echo   "</td><td>" . $row["Lname"] .
                "</td><td style='text-align: center'>" . $row["contact"] .
                "</td><td style='text-align: center'>" . $row["type"] .
                "</td><td style='text-align: center'>" . $row["number"] .
                "</td><td>" . $row["street"]. "</td>";
             echo "</td><td>" ."<div style=text-align:center><a href=# >EDIT</a>"."<br><a href=# style=text-align:center>INFO</a></div>";
        }
    }

 ?>
