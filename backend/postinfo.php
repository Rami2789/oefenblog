<?php 
require_once 'userpartial/header.php';
require_once 'class/post.php';
require_once 'class/comment.php';

session_start();
$post = new Post();
$comment = new Comment();

if(isset($_POST['create'])){
	echo $comment->commentToevoegen($_POST);
}
if (isset($_POST['delete']) || isset($_GET['delete'])){
    $comment->deleteComment($_POST['id']);
}


?>

<head>
    <link rel="stylesheet" href="../css/partial.css">
    <link rel="stylesheet" href="../css/allposts.css">
</head>



<main>
        <?php
        foreach ($post->getPostID($_GET["posts"]) as $posts) {
            ?>
            <article class="all-posts">
                <p>Title: <?php echo $posts->title ?></p>
                <p>Description: <?php  echo $posts->description ?></p>
                <p>Body:<?php  echo $posts->body ?></p>
                <p>Created_on:<?php  echo $posts->created_on ?></p>
                <p>Updated_on:<?php  echo $posts->updated_on ?></p>
            </article>
        <?php } ?>

        <h1 style="text-align: center;">Add comment</h1>
        <form method="post" style="text-align: center; margin-bottom: 10vh;">
				<input type="text" name="author" placeholder="Je naam" required>
				<input type="text" name="message" placeholder="message" required>
				<input type="number" name="post_id" value="<?php echo $_GET['posts'] ?>" readonly hidden>
		    	<input type="submit" name="create" value="Create">
                
	    </form>
        <?php
        foreach ($comment->getcomment($_GET["posts"]) as $comments) {
            ?>
            <article class="all-posts">
                <p>Naam: <?php echo $comments->author ?></p>
                <p>comment: <?php  echo $comments->message ?></p>
                <form method="post">
                <input  value="<?php echo $comments->id ?>" type="number" name="id" readonly hidden><br>
                <input type="submit" name="delete" value="delete"></form>
            </article>
        <?php } ?>

</main>























<?php require_once 'userpartial/footer.php';?>