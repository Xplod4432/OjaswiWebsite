<?php
$title = 'Blog Deleted';
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';
    if (!isset($_GET['id'])) {
        include 'includes/errormessage.php';
    }
    else {
        $id = test_input($_GET['id']);
        $result = $crud->deleteBlog($id);

        if ($result) {
            include './includes/successmessage.php';
        }
        else {
            include './includes/errormessage.php';
        }
    }
?>
<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="index.php" class="btn btn-warning">Back to Home</a>