<?php
    require_once ('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>A-Prime</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="css/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/components/dropdown.css">
    <script src="css/components/dropdown.js"></script>
    <link rel="stylesheet" type="text/css" href="css/components/form.css">
    <link rel="stylesheet" type="text/css" href="css/components/button.css">
    <script src="css/components/form.js"></script>
    <link rel="stylesheet" type="text/css" href="css/components/divider.css">
    <link rel="stylesheet" type="text/css" href="css/components/input.css">
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
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="ui tablet computer only padded grid" >
    <div class="ui borderless fluid huge menu" >
        <div class="ui container">
            <a class="header item">A-Prime Homeowner Association</a>
            <a class="item" href="index.php">Home</a>
            <a class="active item" href="add.php">Add Member</a>
            <a class="item" href="payment.php">Payment</a>
            <a class="item" href="logout.php">Logout</a>
            <a>
            <div class="ui right aligned" style="width:95%; margin-left: auto;margin-right: auto;margin-top: 3.6em; text-align: right"></div>
            </a>
        </div>
    </div>
</div>


<div class="ui middle aligned center aligned grid error">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="ui form" >
            <div class="ui segment gray" style="background-color: #f9f9f9">
                <div class="fields">
                    <div class="field">
                        <label>First name</label>
                        <input type="text" placeholder="First Name" name="FirstName" id="FirstName" autocomplete="off">
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" name="LastName" autocomplete="off">
                    </div>
                    <div class="field">
                        <label>Type</label>
                        <select class="field ui search dropdown" name="type">
                            <div class="text" contenteditable="true"></div>
                            <option value="" selected disabled hidden>Type</option>
                            <?php
                                //require_once ('config.php');
                                $sql_type = "SELECT id, type from member_type";
                                $result = $db_conn->query($sql_type);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=".html_entity_decode('&quot;');
                                        echo $row["id"].html_entity_decode('&quot;');
                                        echo ">". $row["type"]. "</option>". "\n";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="ui divider"></div>

                <div class="fields">
                    <div class="field" style="width:10em">
                        <label>Number</label>
                        <input type="text" pattern="\d{0,9}" max="3" maxlength="3"name="number" placeholder="House Number" autocomplete="off">
                    </div>
                    <div class="field" style="width:10em">
                        <label>Date Since</label>
                        <input type="text" pattern="\d{0,9}" max="4" maxlength="4" minlength="4" name="since" placeholder="Year" autocomplete="off">
                    </div>
                    <div class="field" style="width:5em">
                        <label>Street</label>

                        <select class="ui search dropdown" name="street">
                            <option value="" selected disabled hidden>Street</option>
                            <?php
                                //require_once ('session.php');
                                $sql_streets = "SELECT DISTINCT id, street from streets ORDER BY street ASC";
                                $result = $db_conn->query($sql_streets);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=".html_entity_decode('&quot;');
                                        echo $row["id"] .html_entity_decode('&quot;') . ">";
                                        echo $row["street"]. "</option>". "\n";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="ui" style="align-items: center;display: flex;justify-content: center;">
                    <button class="ui primary button submit">Submit</button>
                    <button class="green ui button">Preview</button>
                    <input value="Clear" type="button" class="ui button" onclick="this.form.reset();document.getElementsByName('type').value ='';"/>
                </div>
            </div>
        </div>
        <div class="ui error message"><i class="close icon"></i></div>
        <?php
            //require_once ('session.php');
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //$FirstName = $_POST["FirstName"];

                // username and password sent from form
                $FirstName = mysqli_real_escape_string($db_conn, $_POST['FirstName']);
                $LastName = mysqli_real_escape_string($db_conn, $_POST['LastName']);
                $memberType = mysqli_real_escape_string($db_conn, $_POST['type']);
                $dateSince = mysqli_real_escape_string($db_conn, $_POST['since']);
                $HouseNumber = mysqli_real_escape_string($db_conn, $_POST['number']);
                $street = mysqli_real_escape_string($db_conn, $_POST['street']);

                $sql = "INSERT INTO member (id, Fname, Lname, DateSince, addressNumber, member_type_id, streets_id) VALUES 
                                    (null, '$FirstName', '$LastName', '$dateSince', '$HouseNumber', '$memberType', '$street')";
                //$query  = mysqli_query($db_conn, $sql);

                if (mysqli_query($db_conn, $sql)) {
                    echo "<div class=\"ui positive message\">
  <i class=\"close icon\"></i>
  <div class=\"header\">
   Input Successful!
  </div>
  Go to <a class=\"ui\" href=\"/displaytables.php\">Home</a>?
</div>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($db_conn);
                    echo "<div class=\"ui negative message compact\">";
                    echo "<i class=\"close icon\"></i>";
                    echo "<div class=\"header\">Error: $sql  <br>";
                    echo "mysqli_error($db_conn)</div></p></div>";
                }
            }
            mysqli_close($db_conn);
        ?>
    </form>

</div>



<script>
    $('.ui.dropdown')
        .dropdown();
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        });
    $('.ui.form')
        .form({
            fields: {
                type: {
                    identifier: 'type',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter Type'
                        }
                    ]
                },
                number: {
                    identifier: 'number',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter House Number'
                        }
                    ]
                },
                street: {
                    identifier: 'street',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter Street'
                        }
                    ]
                },
                LastName: {
                    identifier: 'LastName',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter a Last Name'
                        }
                    ]
                }
            }
        })
    ;
</script>
</body>
</html>


