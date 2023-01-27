<?php require_once 'partial/loginheader.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <head>
        <link rel="stylesheet" href="css/home.css">
    </head>


    <form method="post" style="height: 100vh;">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>



</body>
</html>
<?php require_once 'partial/footer.php'; ?>
