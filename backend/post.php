<?php 
require_once 'userpartial/header.php';
require_once 'class/post.php';
require_once 'class/user.php';
session_start();
$post = new Post();

?>
<head>
    <link rel="stylesheet" href="../css/partial.css">
    <link rel="stylesheet" href="../css/allposts.css">
</head>



    
    <main>
        <?php
        foreach ($post->getPostFromUser($_SESSION['id']) as $posts) {
            ?>
            <article class="all-posts">
                <h1><a href="#"><?php echo $posts->title ?></a></h1>
                <p><?php  echo $posts->description ?></p>
                <p><?php  echo $posts->body ?></p>
            </article>
        <?php } ?>
    </main>












<?php require_once 'userpartial/footer.php';?>