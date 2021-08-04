<?php
    $title = 'View Events';
    require './includes/header.php';
    require_once './includes/header.php';
    require_once './includes/auth_check.php';
    require_once './db/conn.php';

    $results = $crud->getEvents();
?>
<p>
<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
    Add Event
  </button>
</p>
<div class="collapse" id="collapseExample2">
  <div class="card card-body">
  <form method="post" action="insertevent.php" enctype="multipart/form-data">
                        <div class="mb-3">
                        <label for="event_name" class="form-label">Event Name</label>
                        <input required type="text" class="form-control" id="event_name" name="event_name"/>
                        </div>
                        <div class="mb-3">
                        <label for="event_type" class="form-label">Event Type</label>
                        <input required type="email" class="form-control" id="event_type" name="event_type"></input>
                        </div>
                        <button type="submit" name="submiteve" class="btn btn-primary">Submit</button>
                </form>
  </div>
</div>
<table class="table">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Overall</th>
            <th>Friendliness</th>
            <th>Appropriate</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['event_name'] ?></td>
                <td><?php echo $r['event_type'] ?></td>
                <td><?php $crud->OverallAvg($r['event_id']); ?></td>
                <td><?php $crud->FrenAvg($r['event_id']); ?></td>
                <td><?php $crud->ApprAvg($r['event_id']); ?></td>
                <td>
                <a href="view_feeds.php?id=<?php echo $r['event_id'] ?>" class="btn btn-primary">View</a>
                <input type="text" value="./Feedback_Form.php?evid=<?php echo $r['event_id']; ?>" id="myInput" disabled hidden/>
<button class="btn btn-primary" onclick="myFunction()">Copy Link</button>
                </td>
            </tr>
        <?php }?>
    </table>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
<?php
  require './includes/footer.php'
?>