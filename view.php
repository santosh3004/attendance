<?php
$title = "Attendee Details";
require_once "includes/header.php";
require_once "includes/auth_check.php";
require_once "db/DatabaseConnection.php"; 

if(!isset($_GET['id'])){
  // echo "<h1 class='text-danger'>Please check details and try again</h1>";
  include 'includes/error.php';
}else{
  $id=$_GET['id'];
  $results=$crud->getAttendeeDetails($id);
?>

<img src="<?php echo empty($results['avatar_path'])?'uploads/blank.png':$results['avatar_path']?>" style="width:200pxpx;height:200px" class="rounded-circle"/>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $results['firstname'] . ' ' . $results['lastname'];
 ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $results['spec_name'];
 ?></h6>
    <p class="card-text">Date of Birth: <?php echo $results['dob'];
 ?></p>
 <p class="card-text">E-mail: <?php echo $results['email'];
 ?></p>
 <p class="card-text">Contact: <?php echo $results['contact'];
 ?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $results['attendee_id']; ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Sure want to delete the record?')" href="delete.php?id=<?php echo $results['attendee_id']; ?>" class="btn btn-danger">Delete</a>
<?php }?>

<?php require_once "includes/footer.php"; ?>
