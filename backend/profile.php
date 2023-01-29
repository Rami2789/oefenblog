<?php 
require_once 'userpartial/header.php';
require_once 'class/user.php';
session_start();
$user = new User();
if(isset($_POST['update'])){
	echo $user->userUpdate($_POST);
}
if(isset($_POST['delete'])){
	echo $user->deleteUser($_POST['id']);
}
?>


<head>
    <link rel="stylesheet" href="../css/partial.css">
    <link rel="stylesheet" href="../css/allposts.css">
</head>

<main>
<?php
        foreach ($user->getUserId($_SESSION['id']) as $users) {
            ?>
            <article style="height: 100vh;" class="all-posts">
                <form method="post">
                    <h1>voornaam</h1>
                    <input value="<?php echo $users->username ?>" type="text" name="username">
                    <h1>wachtwoord</h1>
                    <input value="" type="text" name="password">
                    <input  value="<?php echo $users->id ?>" type="number" name="id" readonly hidden><br>
                    <input type="submit" value="Updaten" name="update">
                    <input type="submit" value="delete" name="delete">
                </form>
            </article>
        <?php } ?>
     
</main>

<?php require_once 'userpartial/footer.php';?>