<?php
require_once ('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
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
            <a class="item" href="add.php">Add Data</a>
            <a class="item active" href="payment.php">Payment</a>
            <a class="item" href="logout.php">Logout</a>
        </div>
    </div>
</div>


<div class="ui middle aligned center aligned grid error">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="ui form" >
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
                <!--                    FOR BUTTONS-->
                <div class="ui" style="align-items: center;display: flex;justify-content: center;">
                    <button class="ui primary button submit">Submit</button>
                    <button class="green ui button">Preview</button>
                    <input value="Clear" type="button" class="ui button" onclick="this.form.reset();document.getElementsByName('type').value ='';"/>
                </div>
    </form>
</div>
<?php
    //require_once ('session.php');
    echo date('Y-m-d'). "<br>";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //$FirstName = $_POST["FirstName"];

        // username and password sent from form
        $FirstName = mysqli_real_escape_string($db_conn, $_POST['id']);
        $LastName = mysqli_real_escape_string($db_conn, $_POST['amount']);

echo $FirstName. "<br>";
echo $LastName. "<br>";

//        $sql = "INSERT INTO member (id, Fname, Lname, DateSince, addressNumber, member_type_id, streets_id) VALUES
//                                    (null, '$FirstName', '$LastName', '$dateSince', '$HouseNumber', '$memberType', '$street')";
        //$query  = mysqli_query($db_conn, $sql);
    }
    mysqli_close($db_conn);
?>
<script>
    $('.ui.dropdown')
        .dropdown();
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
</script>
</body>
</html>
