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
    <div class="wrapper">
    <h1>Thank you for your purchase</h1>
    <?php
        require_once('Inventory.php');
        $inventory = new Inventory();
        $db = $inventory -> database;
        $user_id = $_SESSION["userid"] -1;
        $sql = "select * from inventory where uid in (select userid from users where userid = '{$user_id}')";
        $sql_userinfo = "select * from users where userid = '{$user_id}'";
        $result = mysqli_query($db, $sql);
        $result_user = mysqli_query($db, $sql_userinfo);
        $row = mysqli_fetch_assoc($result);
        $rowu = mysqli_fetch_assoc($result_user);
        echo "USER: " . $rowu["username"] . "<br>flight: " . $row["flight"] . " " . $row["flight_price"] . "<br>" . 
        "Parking: " . $row["parking_price"] . "<br>" . 
        "Total: " . $row["total_price"];
        $_SESSION["userid"]++;
        $db -> close();
    ?>
    </div>
    <button><a href="index.php">LOGOUT</a></button>
</body>
</html>