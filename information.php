<?php
    require_once ('session.php');
    //error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
    //require_once('session.php');

?>
<input type = "hidden" name="post_id" value = "<?php echo $_GET['id']; ?> ">
<!DOCTYPE html>
<html>
<head>
    <title>A-Prime</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rek="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="css/semantic.js"></script>
    <link rek="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/components/search.css">
    <script src="css/components/search.js"></script>

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
            text-align: left;
            padding: 8px;
            border: 1px black;
        }
    </style>
</head>
<body>
<div class="ui middle aligned center aligned grid error">
    <div class="ui form">
        <div class="ui segment gray">
            <div class="ui fields">
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        $INFORMATION = mysqli_real_escape_string($db_conn, $_POST['id']);
                        $SQL_INFORMATION = "SELECT member.id, Fname, Lname, type, DateSince, addressNumber, street FROM member INNER JOIN a_prime.member_type mt ON mt.id=member.member_type_id
INNER JOIN a_prime.streets st ON st.id=member.streets_id LIMIT 1";
                        $result = $db_conn->query($SQL_INFORMATION);
                        if($result->num_rows > 0) {
                            while($row = $result-> fetch_assoc()) {
                                echo "<label>" ."". $row["id"];

                            }
                        }
                        mysqli_query($db_conn, $SQL_INFORMATION);
                    }

                ?>
                <div class="ui field">

                    <label>Member ID: </label>
                    <label><?php echo $row["id"];?></label>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="ui table celled" style="width:35%; margin-left: auto;margin-right: auto;margin-top: 2em; margin-bottom: 2em;">
    <tr>
        <th>ID:<?php echo "" ?></th>
        <th>Name:</th>
        <th>Type:</th>
        <th>Number:</th>
        <th>Street:</th>
        <th>Date Since:</th>
        <th></th>

    </tr>


</body>
</html>
