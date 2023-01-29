<?php 
require_once 'userpartial/header.php';
require_once 'class/post.php';
require_once 'class/user.php';
session_start();
$post = new Post();

if(isset($_POST['create'])){
	echo $post->create($_POST);
}
if(isset($_GET['delete'])){
	echo $post->deletePost($_POST, $_GET['posts']);
}

?>
<head>
    <link rel="stylesheet" href="../css/partial.css">
    <link rel="stylesheet" href="../css/allposts.css">
</head>




    
    <main>
        <h1 style="text-align: center;">Add posts</h1>
        <form method="post" style="text-align: center; margin-bottom: 10vh;">
				<input type="text" name="title" placeholder="Title" required>
	    		<input type="text" name="description" placeholder="Description" required>
	    		<input type="text" name="body" placeholder="Body" required>
	    		<input type="submit" name="create" value="Create">
	    </form>
        <h1 style="text-align: center;">My posts</h1>
        <?php
        foreach ($post->getPostFromUser($_SESSION['id']) as $posts) {
            ?>
            <article class="all-posts">
                <form method="post">
                <h1><a href="postinfo.php?posts=<?php echo $posts->id ?>"><?php echo $posts->title ?></a></h1>
                <p><?php echo $posts->description ?></p>
                <p><?php echo $posts->body ?></p>
                <a href="postedit.php?posts=<?php echo $posts->id ?>">Edit</a>
                <a href="postedit.php?posts=<?php echo $posts->id ?> &delete=true">Delete</a>
                </form>
            </article>
        <?php } ?>
    </main>












<?php require_once 'userpartial/footer.php';?>