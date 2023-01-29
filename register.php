<?php 
require_once 'partial/loginheader.php'; 
require_once 'backend/class/User.php';

$user = new USer();

if(isset($_POST['register'])){
	echo $user->create($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/partial.css">
    <title>Register</title>
</head>
<body>
    
<main>
    	<section class="form">
	    	<form method="post" style="height: 100vh;">
	    		<label for="username" id="username">Gebruikersnaam: </label>
	    		<input type="text" name="username" required>
	    		<label for="password">Wachtwoord: </label>
	    		<input type="password" name="password" required>
	    		<label for="conf-password">Wachtwoord bevesteging: </label>
	    		<input type="password" name="conf-password" required>
	    		<input type="submit" name="register" value="Register">
	    	</form>
    	</section>
    </main>


</body>
</html>

<?php require_once 'partial/footer.php';?>