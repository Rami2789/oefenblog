<?php 
    require_once 'partial/loginheader.php'; 
    require_once 'backend/class/User.php';

$user = new User();


if (isset($_POST['login'])) {

    echo $user->login($_POST);
}
?>
    <head>
        <link rel="stylesheet" href="css/partial.css">
    </head>


    <main>
        <section class="form" >
            <form method="post" style="height: 100vh;">
                <label for="username" id="username">Gebruikersnaam: </label>
                <input type="text" name="username" required>
                <label for="password">Wachtwoord: </label>
                <input type="password" name="password" required>
                <input type="submit" name="login" value="Login">
            </form>
            <a href="registratie.php">Registreren</a>
        </section>
    </main>


<?php require_once 'partial/footer.php'; ?>
