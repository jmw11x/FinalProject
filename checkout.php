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
    Card no: <input type="text" name="cardno" id="card"> security code <input type="text" name="security" id="sec">
    name: <input type="text" name="name" id="name"> experation: <input type="text" name="month" id="month"> / 
    <input type="text" name="year" id="year">
    <button><a href="profile.php">PAY NOW</a></button>
    <div id = "cardtype">
        <p id = "cardt"></p>
    </div>
    <img src = "./img/checkout.png" alt="">
    <script>
        document.getElementById("card").addEventListener("keyup", (event) =>{
            const box = event.target.value;
            if(box == 4){
                document.getElementById("cardt").innerHTML = "visa";
            }
            if(box[0] == 5){
                if(box.length>1){
                    if("12345".includes(box[1])){
                        document.getElementById("cardt").innerHTML = "MasterCard";
                    }
                }
            }
            if(box[0] == 3){
                if(box.length>1){
                    if("4567".includes(box[1])){
                        document.getElementById("cardt").innerHTML = "American Express";
                    }
                }
            }
        });
    </script>
</body>
</html>