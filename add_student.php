<?php
session_start();
if (!isset($_SESSION['librarian'])) {
    header("location: admin-login.php");
}
?>
<html>
    <head>
        <meta name="viewport" content = "width=device-width,initial-scale=1">
        <title>Add new student</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php include("header.php");
    include("navigation-bar.php");
     ?>
        <div class="container">
            <div class="form-container">
                <form method="POST">
                    <div id="error">Error:</div>
                    <div class="form-header"><h4 class="header-line">Add New Student</h4></div>
                    <div class="response"></div>
                    <div class="form-control-input">
                        <label for="fullname">Student Names</label>
                            <input type="text" name="fullname">
                    </div>
                    <div class="form-control-input">
                        <label for="idnumber">Student Card Number</label>
                            <input type="text" name="idnumber">
                    </div>
                    <div class="form-control-input">
                        <label for="class">Class Name</label>
                            <input type="text" name="class">
                    </div>
                    <div class="button">
                        <button class="addbutton" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include("footer.php"); ?>
        <script>
const form = document.querySelector("form");
var button = document.querySelector("button");
form.onsubmit = (ev) =>{
    ev.preventDefault();
}
button.onclick = () =>{
    const http = new XMLHttpRequest();
    http.open("POST","php/add_student.php");
    let forminputvalues = new FormData(form);
    http.send(forminputvalues);
    http.onload = ()=>{
        if (http.readyState===XMLHttpRequest.DONE) {
            if (http.status===200) {
                let responsetext = http.response;
                if (responsetext==="success") {
                    location.href = "student_list.php";
                }else{
                    document.getElementById("error").style.display = "block";
                    document.getElementById("error").innerHTML = responsetext;
                }
                
            }
            
        }
    }
}
        </script>
    </body>
</html>