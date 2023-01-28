<?php 
require_once 'userpartial/header.php';
require_once 'class/post.php';
session_start();
$post = new Post();
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
</main>























<?php require_once 'userpartial/footer.php';?>