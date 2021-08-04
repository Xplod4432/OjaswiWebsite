<?php
$title = 'Comment Deleted';
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
    $blog_id = $_GET['blog_id'];
    if (!isset($_GET['com_id'])) {
        include 'includes/errormessage.php';
    }
    else {
        $com_id = $_GET['com_id'];
        $result = $crud->deleteComment($com_id);

        if ($result) {
            include './includes/successmessage.php';
        }
        else {
            include './includes/errormessage.php';
        }
    }
?>
<a href="view.php?id=<?php echo $blog_id; ?>" class="btn btn-info">Back to List</a>
<a href="index.php" class="btn btn-warning">Back to Home</a>