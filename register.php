<?php
    session_start();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="login.php" method="post">
       Username <input type="text" name="name" id="">
       Password <input type="text" name="PW" id="">
       <input type="submit" name = "submit" value="SUBMIT">
    </form>
</body>
</html>