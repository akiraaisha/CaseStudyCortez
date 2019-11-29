<?php
    include('config.php');
    if(isset($_POST['login_button'])) {
$user = $_POST['username'];
$pass = $_POST['password'];

if( $user && $pass ) {
setcookie("authorization","ok" );
header( "Location:auth.php");
exit();
}
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="css/semantic.js"></script>

<style type="text/css">
    body {
        background-color: #b9b9b9;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
    .ui.teal.header {
        color: #38ac46 !important;
</style>
<script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        username: {
                            identifier  : 'username',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : 'Please enter your username'
                                }
                            ]
                        },
                        password: {
                            identifier  : 'password',
                            rules: [
                                {
                                    type   : 'empty',
                                    prompt : 'Please enter your password'
                                }
                            ]
                        }
                    }
                })
            ;
        })
    ;
</script>
<title>Homeowner Login</title>
<link rel="stylesheet" type="text/css" href="css/components/reset.css">
<link rel="stylesheet" type="text/css" href="css/components/site.css">

<link rel="stylesheet" type="text/css" href="css/components/container.css">
<link rel="stylesheet" type="text/css" href="css/components/grid.css">
<link rel="stylesheet" type="text/css" href="css/components/header.css">
<link rel="stylesheet" type="text/css" href="css/components/image.css">
<link rel="stylesheet" type="text/css" href="css/components/menu.css">

<link rel="stylesheet" type="text/css" href="css/components/divider.css">
<link rel="stylesheet" type="text/css" href="css/components/segment.css">
<link rel="stylesheet" type="text/css" href="css/components/form.css">
<link rel="stylesheet" type="text/css" href="css/components/input.css">
<link rel="stylesheet" type="text/css" href="css/components/button.css">
<link rel="stylesheet" type="text/css" href="css/components/list.css">
<link rel="stylesheet" type="text/css" href="css/components/message.css">
<link rel="stylesheet" type="text/css" href="css/components/icon.css">
<script src="css/components/form.js"></script>

</head>
<body>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header"><!--
            <img src="assets/images/logo.png" class="image">-->
            <div class="content">
                Homeowner Login
            </div>
        </h2>
        <form class="ui large form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" method = "post">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="ui fluid large teal submit button">Login</div>
            </div>
            <div class="ui error message"></div>
        </form>
    </div>
</div>
</body>
</html>