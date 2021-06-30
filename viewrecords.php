<?php 
    $title = "View Records";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';

    $results = $crud->getBlogs();
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Date</th>
            <th>Preview</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['blog_id'] ?></td>
                <td><?php echo $r['blogtitle'] ?></td>
                <td><?php echo $r['blogpreview'] ?></td>
                <td><?php echo $r['dateofblog'] ?></td>
                <td>
                <a href="view.php?id=<?php echo $r['blog_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['blog_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['blog_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>