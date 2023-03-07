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
    <link rel="stylesheet" href="css/style.css">
    </style>
</head>
<body>
    <?php include("header.php") ?>
    <div class="container">
        <form action="php/librarian-login.php" method="POST">
            <?php if (isset($_SESSION['error'])) {?>
                <div class="error">
                    <?php echo $_SESSION['error']; ?>
                    <?php echo $_SESSION['error']="";?>
            </div>
            <?php } ?>
        <div class="form-header"><h4 class="header-line">admin</h4></div>
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" name="lname" id="name">
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