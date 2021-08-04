<?php 
    $title = "View Records";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if (isset($_GET['id'])) {
        $qid = test_input($_GET['id']);
        $qstatus = test_input($_GET['status']);
        $updatesuccess = $crud->updateQuery($qid,$qstatus);
        if ($updatesuccess) {
            include './includes/successmessage.php';
        }
        else{
            include './includes/errormessage.php';
        }
    }

    $results = $crud->getQueries();
?>

    <table class="table">
        <tr>
            <th>Mail</th>
            <th>Contact</th>
            <th>Content</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['qmail'] ?></td>
                <td><?php echo $r['qcontact'] ?></td>
                <td><?php echo $r['qcontent'] ?></td>
                <td><?php echo $r['qdate'] ?></td>
                <td>
                    <?php if ($r['qstatus'] == 1) {?>
                <a href="#" class="btn btn-success">Answered</a>
                <?php }
                else{
                ?>
                <a href="./queryview.php?id=<?php echo $r['qid'] ?>&status=1" class="btn btn-warning">Pending</a>
                <?php }?>
                <a onclick="return confirm('Are you sure you want to delete this record?')" href="deletequery.php?id=<?php echo $r['qid'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>