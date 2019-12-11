<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rek="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="css/semantic.js"></script>
    <link rek="stylesheet" type="text/css" href="../css/styles.css">

    <style>
        body {
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: grayscale;
            background: #dedede;
        }

        .forms {
            margin-top: 2% !important;
            margin-left: 2% !important;
        }
        .ui.borderless.menu {
            background-color: #f8f8f8;
            box-shadow: none;
            flex-wrap: wrap;
            border: none;
            padding-left: 0;
            padding-right: 0;
        }

        .ui.borderless.menu .header.item {
            font-size: 18px;
            font-weight: 400;
        }

        .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
            display: none;
        }

        .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon {
            float: unset;
        }

        .ui.mobile.only.grid .ui.vertical.menu .dropdown.icon:before {
            content: "\f0d7";
        }

        .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
            position: static;
            width: 100%;
            background-color: unset;
            border: none;
            box-shadow: none;
        }

        .ui.mobile.only.grid .ui.vertical.menu .ui.dropdown.item .menu {
            margin-top: 6px;
        }

        .ui.container > .ui.message {
            background-color: rgb(238, 238, 238);
            box-shadow: none;
            padding: 5rem 4rem;
            margin-top: 1rem;
        }

        .ui.message h1.ui.header {
            font-size: 4.5rem;
        }

        .ui.message p.lead {
            font-size: 1.3rem;
            color: #333333;
            line-height: 1.4;
            font-weight: 300;
        }
        table {
            border-collapse: collapse;

        }

        th, td {
            text-align: center;
            padding: 8px;
            border: 1px black;
        }

        tr:nth-child(even) {background-color: rgba(130, 255, 128, 0.22);}
        tr:hover {background-color: rgba(127, 245, 85, 0.4);}
        td:hover {background-color: rgba(130, 255, 123, 0.22);}
    </style>
</head>
<body>
<div class="ui tablet computer only padded grid">
    <div class="ui borderless fluid huge menu">
        <div class="ui container">
            <a class="header item">A-Prime Homeowner Association</a>
            <a class="active item">Home</a>
            <a class="item" href="add.php">Add Data</a>
            <a class="item" href="payment.php">Payment</a>
            <a class="item" href="logout.php">Logout</a>
        </div>
    </div>
</div>
<table class="ui table celled" style="width:95%; margin-left: auto;margin-right: auto;margin-top: 2%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Number</th>
        <th>Street</th>
        <th>Date Since</th>
        <th></th>

    </tr>

<?php
    #include('config.php');
    include('session.php');
    $sql = "SELECT member.id, Fname, Lname, type, DateSince, addressNumber, street 
FROM a_prime.member 
INNER JOIN a_prime.member_type mt ON mt.id=member.member_type_id
INNER JOIN a_prime.streets st ON st.id=member.streets_id ORDER BY ID ASC LIMIT 20";

    $result = $db_conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result-> fetch_assoc()) {
            echo "<tr><td>" ."<div style=text-align:center>". $row["id"];
            echo "</td><td>" ."<div style=text-align:center>". $row["Fname"]. " " . $row["Lname"] .
                "</td><td style='text-align: center'>" . $row["type"] .
                "</td><td style='text-align: center'>" . $row["addressNumber"] .
                "</td><td>" ."<div style=text-align:center>". $row["street"]. "</td>".
                "</td><td>" ."<div style=text-align:center>" . $row["DateSince"]. "</td>";
             echo "</td><td>" ."<a href=# >EDIT</a>"."<br><a href=# style=text-align:center>INFO</a></div>";
        }
    }

 ?>
</body>
</html>