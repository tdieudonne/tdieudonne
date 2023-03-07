<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="title">SEARCH BOOK</div>
        <hr>
        <div class="search">
            <input type="text" name="search" id="search" placeholder="Enter book name..">
            <input type="text" id="number" name="number" placeholder="Enter book number"><button class="searchbutton" onclick="search(document.getElementById('search').value, document.getElementById('number').value)">Search</button>
        </div>
        <div id="result"></div>
    </div>
    <script src="js/search1.js"></script>
</body>
</html>