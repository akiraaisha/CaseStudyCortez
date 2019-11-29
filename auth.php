<?php
    include ("config.php");
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //$myusername = stripslashes($myusername);
        $myusername = mysqli_real_escape_string($db_conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db_conn,$_POST['password']);

        $sql = "SELECT username, password FROM login where username='$myusername' AND password='$mypassword'";
        $result = mysqli_query($db_conn, $sql);
        echo $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);
        if($count == 1) {
            //session_register("$myusername");
            $_SESSION['username'] = $myusername;
            header("location: auth.php");
            echo "<a>Login Successful.</a>";
        }else {
            $error = "Your Login Name or Password is invalid";
            echo "<br>".$error;
        }
    }
?>
