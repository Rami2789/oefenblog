<?php 
    require_once 'partial/loginheader.php';
    require_once 'backend/class/post.php';
    $post = new Post();
?>
<head>
        <link rel="stylesheet" href="css/partial.css">
        <link rel="stylesheet" href="css/allposts.css">
</head>
<main>
<h1 style="text-align: center;">Je bent niet ingelogd</h1>
<h1 style="text-align: center; margin-top: 10vh;">All posts</h1>
<?php
        foreach ($post->getPost() as $posts) {
            ?>
            <article class="all-posts">
                <h1><a href="postinfo.php?posts=<?php echo $posts->id ?>"><?php echo $posts->title ?></a></h1>
                <p><?php  echo $posts->description ?></p>
                <p style><?php  echo $posts->body ?></p>
            </article>
        <?php } ?>



</main>
























<?php require_once 'partial/footer.php';?>