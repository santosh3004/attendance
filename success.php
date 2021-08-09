<?php
$title = "Success";
require_once "includes/header.php";
require_once "db/DatabaseConnection.php";

if (isset($_POST['submit'])) {
  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $phone=$_POST['phone'];
  $spec=$_POST['speciality'];

  $isSuccess=$crud->insert($fname,$lname,$dob,$email,$spec,$phone);

  if ($isSuccess) {
    # code...
  include 'includes/error.php';
    
    // echo "<h1 class='text-center text-success'>You have been  Registered</h1>";
  } else {
    # code...
    // echo "<h1 class='text-center text-danger'>Error found while processing</h1>";
    include 'includes/successM.php';
  }
  
}

?>
  <!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'];
 ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['speciality'];
 ?></h6>
    <p class="card-text">Date of Birth: <?php //echo $_GET['dob'];
 ?></p>
 <p class="card-text">E-mail: <?php //echo $_GET['email'];
 ?></p>
 <p class="card-text">Contact: <?php //echo $_GET['phone'];
 ?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];
 ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality'];
 ?></h6>
    <p class="card-text">Date of Birth: <?php echo $_POST['dob'];
 ?></p>
 <p class="card-text">E-mail: <?php echo $_POST['email'];
 ?></p>
 <p class="card-text">Contact: <?php echo $_POST['phone'];
 ?></p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<?php require_once "includes/footer.php"; ?>