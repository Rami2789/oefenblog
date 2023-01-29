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
<h1>
    Je bent ingelogd :)))))))))))
</h1>
        <?php
        foreach ($post->getPost() as $posts) {
            ?>
            <article class="all-posts">
                <h1><a href="postinfo.php?posts=<?php echo $posts->id ?>"><?php echo $posts->title ?></a></h1>
                <p><?php  echo $posts->description ?></p>
                <p><?php  echo $posts->body ?></p>
            </article>
        <?php } ?>
</main>























<?php require_once 'userpartial/footer.php';?>