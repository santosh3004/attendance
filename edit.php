<?php
$title = "Edit Record";
require_once "includes/header.php";
require_once "db/DatabaseConnection.php"; 
$results=$crud->getSpec();
if(!isset($_GET['id'])){
  // echo "<h1 class='text-danger'>Please check details and try again</h1>";
  include 'includes/error.php';
  header('Location: viewrecords.php');
}else{
  $id=$_GET['id'];
  $attendee=$crud->getAttendeeDetails($id);
}
?>
<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
  <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required name="firstname" value="<?php echo $attendee['firstname'] ?>" type="text" class="form-control" id="firstname" placeholder="Enter your First Name">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required name="lastname" value="<?php echo $attendee['lastname'] ?>" type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required name="dob" value="<?php echo $attendee['dob'] ?>" type="text" class="form-control" id="dob">
  </div>
  <div class="mb-3">
    <label for="speciality" class="form-label">Speciality</label>
    <select name="speciality" class="form-select" id='speciality' aria-label="Default select example">
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $r['spec_id'];?>"
        <?php if($r['spec_id']== $attendee['speciality']){echo 'selected';
          }?>
        >
        <?php echo $r['spec_name']; ?>
      </option>
        <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input required name="email" value="<?php echo $attendee['email'] ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input required name="phone" value="<?php echo $attendee['contact'] ?>" type="text" class="form-control" id="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
</form>
<?php require_once "includes/footer.php"; ?>