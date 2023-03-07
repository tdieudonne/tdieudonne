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
    <style>
        *{
            box-sizing: border-box;
        }
body{
    ont-family: Verdana, Geneva, Tahoma, sans-serif;f
    margin: 0;
    padding: 0;
}
.main-header{
            text-align: center;
            font-family: verdana;
            box-sizing: border-box;
            padding: 30px;
            border-bottom: 3px solid yellow;
            margin-bottom: 10px;
        }
        .main-header h2.header-line{
            color: yellow;
        }
form{
    padding: 15px;
    border: 1px solid green;
    box-shadow: 1px 2px 3px 1px black;
    max-width: 500px;
    margin: auto;
    box-sizing: border-box;
    border-radius: 5px;
}
form input{
    display: inline-block;
    width: 100%;
    padding: 7px;
    outline: none;
    font-size: 16px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid green;
}
label{
    color: black;
}
button{
               width: 100px;
               padding: 6px;
               background-color: green;
               border: none;
               color: white;
               font-size: 16px;
               font-family: verdana;
               border-radius: 5px;
           }
           .form-header h4.header-line{
               text-align: center;
               text-transform: uppercase;
               color: green;
               border-bottom: 1px solid green;
           }
           .error{
               background-color: red;
               text-align: center;
               color: white;
           }
    </style>
</head>
<body>
    <?php include("header.php") ?>
    <div class="container">
        <form action="php/login.php" method="POST" >
            <?php if (isset($_SESSION['error'])) {?>
                <div class="error"><h4 class="header-line"><?php echo $_SESSION['error']; ?></h4>
                <?php $_SESSION['error']=""; ?>
            </div>
            <?php } ?>
        <div class="form-header"><h4 class="header-line">student</h4></div>
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" name="sname" id="name">
            </div>
            <div class="form-control">
                <label for="pwd">Password</label>
                    <input type="password" name="pwd" id="pwd">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>