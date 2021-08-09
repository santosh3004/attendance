<?php
$title = "Update Success";
require_once "db/DatabaseConnection.php";

if (isset($_POST['submit'])) {
  $id=$_POST['id'];
  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $email=$_POST['email'];
  $dob=$_POST['dob'];
  $phone=$_POST['phone'];
  $spec=$_POST['speciality'];

  $result=$crud->editAttendee($id,$fname,$lname,$dob,$email,$spec,$phone);

  if ($result){
    header('Location: viewrecords.php');
    # code...
  } else {
    # code...
    echo "<h1 class='text-center text-danger'>Error found while processing</h1>";
  }
  
}else{

}
?>