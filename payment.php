<?php
require_once ('session.php');
$myUniqueID = uniqid('0x', false);
$currentTime= date('h:i:s A');
$currentDate = date('Y-m-d');
$currentDateTime= date('Y-m-d H:i:s');
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
    <link rel="stylesheet" type="text/css" href="css/components/input.css.css">
    <link rek="stylesheet" type="text/css" href="../css/styles.css">
    <style>
        body {
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: grayscale;
            background: #dedede;
        }
        th {text-align: center;
            color: #35a862;
            background-color: #d9ffc7;
        }
        tr:nth-child(even) {
            background: #ffffff;
        }
        tr:nth-child(odd) {
            background: #eaeaea;
        }
        body {
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: grayscale;
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
<div class="ui tablet computer only padded grid">
    <div class="ui borderless fluid huge menu">
        <div class="ui container">
            <a class="header item">A-Prime Homeowner Association</a>
            <a class="item" href="index.php">Home</a>
            <a class="item" href="add.php">Add Member</a>
            <a class="item active" href="payment.php">Payment</a>
            <a class="item" href="logout.php">Logout</a>
            <a>
                <div class="ui right aligned" style="width:95%; margin-left: auto;margin-right: auto;margin-top: 3.6em; text-align: right"></div>
            </a>
        </div>
    </div>
</div>


<div class="ui middle aligned center aligned grid error">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="ui form">
            <div class="ui segment gray" style="background-color: #f9f9f9">
                <div class="fields">
                    <div class="field">
                        <label>Member Name</label>
                        <select class="ui search dropdown" name="id">
                            <option value="" selected disabled hidden>Member</option>
                            <?php
                                //require_once ('session.php');
                                $sql_members = "SELECT DISTINCT id, concat(fname,' ', lname) AS Fullname FROM member ORDER BY id ASC";
                                $result = $db_conn->query($sql_members);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=".html_entity_decode('&quot;');
                                        echo $row["id"] .html_entity_decode('&quot;') . ">";
                                        echo $row["Fullname"]. "</option>". "\n";
                                    }
                                }

                            ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Amount</label>
                        <input type="number" pattern="\d{0,9}" placeholder="PHP" name="amount" id="amount" autocomplete="off">
                    </div>
                </div>
                <div class="ui divider"></div>
                <div class="ui" style="align-items: center;display: flex;justify-content: center">
                <div class="fields cet">
                    <div class="ui field left aligned" style="align-items: inherit;justify-content: left; margin-right: 50px">
                        <label>Transaction Number:</label>
                        <a><?php echo $myUniqueID;?></a>
                    </div>

                    <div class="field" style="align-items: inherit;justify-content: right;">
                        <label>Current DateTime:</label>
                        <a><?php echo $currentDate;?></a><br>
                        <a><?php echo $currentTime;?></a>
                        </div>
                    </div>
            </div>
                <!--                    FOR BUTTONS-->
                <div class="ui divider"></div>
                <div class="ui" style="align-items: center;display: flex;justify-content: center; margin-top: 1em;">
                    <button class="ui primary button submit">Submit</button>
                    <button class="green ui button">Preview</button>
                    <input value="Clear" type="button" class="ui button" onclick="this.form.reset();document.getElementsByName('type').value ='';"/>
                </div>
                </div>
                </div>



    <div class="ui error message"><i class="close icon"></i></div>




<?php
    //require_once ('session.php');
   //echo date('Y-m-d'). "<br>";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //$FirstName = $_POST["FirstName"];

        // username and password sent from form
        $memberID = mysqli_real_escape_string($db_conn, $_POST['id']);
        $payedAmount = mysqli_real_escape_string($db_conn, $_POST['amount']);


//       $payment_sql = "INSERT INTO payment (id, member_id, amount, datePayed, TransNumber) VALUES
//                                           // (null, '$memberID', '$payedAmount', '$currentDate', '$myUniqueID')";
        $payment_sql = "INSERT INTO payment(id, member_id, amount, datePayed, TransNumber)
                                    SELECT null, '$memberID','$payedAmount', '$currentDateTime', '$myUniqueID' FROM DUAL
                                    WHERE NOT EXISTS(SELECT TransNumber FROM payment WHERE TransNumber='$myUniqueID')";

        $query  = mysqli_query($db_conn, $payment_sql);

        if (mysqli_query($db_conn, $payment_sql)) {
                    echo "<div class=\"ui positive message\">
  <i class=\"close icon\"></i>
  <div class=\"header\">
   Input Successful!
  </div>
  Go to <a class=\"ui\" href=\"/displaytables.php\">Home</a>?
</div>";
                } else {
                    echo "Error: " . $payment_sql . "<br>" . mysqli_error($db_conn);
                    echo "<div class=\"ui negative message compact\">";
                    echo "<i class=\"close icon\"></i>";
                    echo "<div class=\"header\">Error: $payment_sql  <br>";
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
    $('.ui.form')
        .form({
            fields: {
                memberID: {
                    identifier: 'id',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please select a Member'
                        }
                    ]
                },
                amount: {
                    identifier: 'amount',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter an Amount'
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
                            prompt : 'Please enter a username'
                        }
                    ]
                },
                Clear: {
                    identifier: 'clear'
                }

            }
        })
    ;

    function resetFunction() {
        document.getElementById("form").reset();
    }
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        });
</script>
</body>
</html>
