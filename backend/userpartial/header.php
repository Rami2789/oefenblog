<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/partial.css">
    <script src="../../js/global.js"></script>
  <script src="https://kit.fontawesome.com/5b96b17e8a.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <img class="logo" src="../img/logo.png" alt="logo" height="115px">
        <a href="#" id="openbtn" onclick="openBtn()"><i class="fas fa-bars"></i></a>
        <nav>
            <ul>
                <li><a href="home.php">Blogs</a></li>
                <li><a href="profile.php">Profiel</a></li>
                <li><a href="post.php">My Blogs</a></li>
                <li><a href="../backend/logout.php">Log Uit</a></li>
            </ul>
        </nav>
    </header>

    <div id="menu" class="menu">
        <a href="#" class="closebtn" onclick="closeBtn()"><i class="fas fa-times"></i></a>
        <li><a class="" href="home.php">Home</a></li>
        <li><a href="profile.php">Profiel</a></li>
        <li><a href="post.php">My Blogs</a></li>
        <li><a href="../backend/logout.php">Log Uit</a></li>
    </div>

</html>
