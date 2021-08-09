<?php
$title = "Index";
require_once "includes/header.php";
require_once "db/DatabaseConnection.php"; 
$results=$crud->getSpec();
?>
<h1 class="text-center">Registration for IT Conference</h1>

<form method="post" action="success.php">
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter your First Name">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required name="lastname" type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required name="dob" type="text" class="form-control" id="dob">
  </div>
  <div class="mb-3">
    <label for="speciality" class="form-label">Speciality</label>
    <select name="speciality" class="form-select" id='speciality' aria-label="Default select example">
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $r['spec_id'];?>"><?php echo $r['spec_name']; ?></option>
        <?php } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input required name="phone" type="text" class="form-control" id="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your contact number with anyone else.</div>
  </div>
  <div class="custom-file">
    <label for="avatar" class="form-label">Upload Image(Optional)</label>
    <input accept="image/*" required name="dp" type="file" class="custom-file-input" id="dp" aria-describedby="phoneHelp">
    <label class="custom-file-label"></label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php require_once "includes/footer.php"; ?>