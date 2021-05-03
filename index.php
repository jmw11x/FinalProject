<?php
    session_start();
    require_once('Inventory.php');
    $inventory = new Inventory();
    $db = $inventory -> database;
    $query = "SELECT max(userid) as userid from users";


    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $_SESSION["userid"] = $row["userid"]+1;
    $db->close();
?>
<script>
    function clearcooks(){
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <button onclick = "clearcooks()"><a href="login.php">LOGIN now</a></button>
    <img src="./img/welcom.jpg" alt="">
    <img src="./img/airplane.jpg" alt="">
</body>
</html>