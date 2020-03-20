<?php

require('./config/config.php');
require('./config/db.php');

// Create query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);

?>

<?php include('./inc/header.php') ?>
<div class="container">
    <h1>Posts</h1>
    <?php foreach ($posts as $post) : ?>
    <div class="card text-white bg-primary mb-3">
        <h3 class="card-header"><?php echo $post['title']; ?></h3>
        <div class="card-body">
            <p class="card-text"><?php echo $post['body']; ?></p>
            <a class="btn btn-secondary" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read
                More</a>
        </div>
        <small class="card-footer">Created on <?php echo $post['created_at']; ?> by
            <?php echo $post['author']; ?></small>
    </div>
    <?php endforeach; ?>
</div>
<?php include('./inc/footer.php') ?>