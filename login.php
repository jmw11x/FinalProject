<?php
    session_start();
    unset($_COOKIE["location"]);

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
<script>

for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i];
    var eqPos = cookie.indexOf("=");
    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
}
</script>
    <?php
        require_once('User.php');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["name"] && !empty($_POST["PW"]))){
                $uname = $_POST["name"];
                $pswd = $_POST["PW"];
                $user = new User();
                $uid = $_SESSION["userid"];
                $_SESSION["userid"]++;
                $db = $user -> database;
                $sql = "INSERT INTO users (userid, username, pswd)
                VALUES ($uid,'$uname','$pswd')";
                if ($db->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
                $user -> uid = $_SESSION["userid"];
                $db->close();
            }else{
                echo "PLEAE ENTER ALL FORMS";
            }
        }   
    ?>
    <h1>NEW USERS REGISTER NOW</h1>
    <button><a href="./register.php">REGISTER NOW</a></button>
    <h1>LOGIN NOW</h1>
    <form action="menu.php" method="post">
       Username <input type="text" name="name_login" id="">
       Password <input type="text" name="PW_login" id="">
       <input type="submit" name = "submit" value="SUBMIT">
    </form>
</body>
</html>