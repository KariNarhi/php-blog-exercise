<?php

require('./config/config.php');
require('./config/db.php');

// Check for submit
if (isset($_POST['delete'])) {
    // Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

    // die($query);

    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}

// Get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create query
$query = 'SELECT * FROM posts WHERE id = ' . $id;

// Get result
$result = mysqli_query($conn, $query);

// Fetch data
$post = mysqli_fetch_assoc($result);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);

?>

<?php include('./inc/header.php') ?>
<br>
<div class="container">
    <div class="card text-white bg-primary mb-3">
        <h1 class="card-header"><?php echo $post['title']; ?></h1>
        <div class="card-body">
            <p class="card-text"><?php echo $post['body']; ?></p>
            <br>
            <a href="<?php echo ROOT_URL; ?>" class="btn btn-secondary mr-3">Back</a>
            <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>"
                class="btn btn-secondary">Edit</a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="float-right">
                <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
        </div>
        <small class="card-footer">Created on <?php echo $post['created_at']; ?> by
            <?php echo $post['author']; ?></small>
    </div>

</div>
<?php include('./inc/footer.php') ?>