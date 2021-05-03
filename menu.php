<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
    <h1>WELCOME TO PARADISE</h1>
    <?php
        
        require_once('User.php');

        $username = $_POST["name_login"];
        $user = new User();
        $query = "SELECT * from users WHERE username = '{$username}'";

        $db = $user -> database;

        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $pw = $_POST["PW_login"];
        $_SESSION["uid"] = $row["userid"];



        if($pw == $row["pswd"]){
            echo "LOGIN AUTHENTICATED BOOK NOW!";
            echo "<button><a href = main.php>GO TO MAIN PAGE</a></button>";
        }else{
            echo "Invalid password";
            echo "<a href = login.php>LOGIN NOW</a>";
        }
        $db ->close();
    ?>
    <img src="./img/airplane.jpg" alt="">
</body>
</html>