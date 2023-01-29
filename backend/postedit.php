<?php 
require_once 'userpartial/header.php';
require_once 'class/post.php';
$post = new Post();
if (isset($_POST['update'])) {
    $post->postUpdate($_POST, $_GET['posts']);
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
                <form method="post">
                    <h3>Title: <input type="text" name="title" value="<?php echo $posts->title ?>"></h3>
                    <h3>Description: <input type="text" name="description" value="<?php echo $posts->description ?>"></h3>
                    <h3>Body: <input type="text" name="body" value="<?php echo $posts->body ?>"></h3>
                    <input type="submit" name="update" value="Update">
                </form>
            </article>
        <?php } ?>
</main>



<?php require_once 'userpartial/footer.php';?>