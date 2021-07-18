<?php
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    if (!isset($_GET['id'])) {
        include 'includes/errormessage.php';
    }
    else {
        $id = $_GET['id'];
        $result = $crud->deleteBlog($id);

        if ($result) {
            header("Location: viewrecords.php");
        }
        else {
            include 'errormessage.php';
        }
    }
?>