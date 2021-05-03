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
    <div class="checkout">
    <?php
        require_once('Inventory.php');
        $inventory = new Inventory();
        $db = $inventory -> database;
        $user_id = $_SESSION["userid"] -1;
        echo "USER ID: " .$user_id . "<br>";
        $sql = "select * from inventory where uid in (select userid from users where userid = '{$user_id}')";
        $sql_userinfo = "select * from users where userid = '{$user_id}'";

        $result = mysqli_query($db, $sql);
        $result2 = mysqli_query($db, $sql_userinfo);
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result2);
        echo "Username: " . $row1["username"];
        echo "<br>flight: " . $row["flight"] . " " . $row["flight_price"] . "<br>" . 
                "Parking id: " . $row["parking_id"] . "<br>ParkingPrice: " .$row["parking_price"] . "<br>" . 
                "Total: " . $row["total_price"];
        $_SESSION["total"] = $row["total_price"];
        $db -> close();

    ?>
    </div>

    <form action="checkout.php" method ="post">
        <input type="submit" name = "pay" value="CHECKOUT">
    </form>
    <img src="./img/cart.jpg" alt="">

</body>
</html>