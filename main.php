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
    <h1>CHAT NOW</h1>
    <img src="./img/chat.png" alt="">
    <script language = "javascript">
        function getdata(){
            input=prompt('How can i help you say book or bye!');
            if(input == 'book'){
                input1=prompt('where to!');
                input2 = prompt('how many days out?');
                input3 = prompt('ADD VIP parking?');
                document.cookie = "location = " + input1;
                document.cookie = "days = " + input2;
                document.cookie = "vip = " + input3;
                document.cookie = "db = true";
            }
            location.reload(); 
        }
        
    </script>
    <button onclick = "getdata()">Chat now!</button>
    <?php
        require_once('Inventory.php');
        if(isset($_COOKIE["db"])){
            if($_COOKIE["db"] == "true"){
                $destination = $_COOKIE["location"];
                unset($_COOKIE["location"]);

                echo $destination;
                $time = $_COOKIE["days"];
                $vip = $_COOKIE["vip"];

                $inventory = new Inventory();
                $db = $inventory -> database;
                $uidnow = $_SESSION["uid"];
                $parking = 20;
                $parkigid = $inventory -> parkingid;
                $flightprice = rand(199, 1234);
                
                if($vip == "yes"){
                    $parking += 200;
                }
                $total = $parking + $flightprice;
                $sql = "INSERT INTO inventory (uid, flight, parking_price, flight_price, parking_id, total_price)
                    VALUES ('$uidnow','$destination','$parking', '$flightprice', '$parkigid', '$total')";
                if ($db->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
                $inventory -> parkingid ++;
                $db->close();
                $_COOKIE["db"] = "false";
                $_SESSION["cart"] = $total;
                echo "<button><a href = 'viewcart.php'>VIEW CART</a></button>";
                
            }
        }
    ?>
    <img src="./img/agent.jpg" alt="">

</body>
</html>