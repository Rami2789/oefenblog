<?php
require_once '../partial/loginheader.php';
require_once '../backend/user.php';


?>
<head>
    <link rel="stylesheet" href="../css/home.css">
</head>


<section id="content" >
        <div class="hobo-form">
            
            <div class="login">
                <h1 class="Sign-in-text">Sign in</h1>

                    <form method="post" >
                            <input class="name" type='email' name='email' placeholder="email" required>
                            <input class="password" type='password' name='password' placeholder="Wachtwoord" required>
                            <Input class="submit-btn" type='submit' name='login' placeholder="inloggen" value="Log in">
                            <p class="Register-p">Heb je nog niet een account? <a href="registreren.php" class="Register-new-acc">Registreer</a></p>

                    </form>
                    
            </div>
        </div>
</section>




<?php require_once '../partial/footer.php'; ?>
