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
        $qid = test_input($_GET['id']);
        $result = $crud->deleteQuery($qid);

        if ($result) {
            include './includes/successmessage.php';
        }
        else {
            include './includes/errormessage.php';
        }
    }
?>
<a href="queryview.php" class="btn btn-info">Back to List</a>