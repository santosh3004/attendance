<?php

require_once "db/DatabaseConnection.php";
 if(!$_GET['id']){
   include 'includes/error.php';
     header('Location: viewrecords.php');
 }else {
   $id=$_GET['id'];
   $result=$crud->delete($id);
   if ($result) {
     header('Location: viewrecords.php');
   }else {
   include 'includes/error.php';
   }
 }
?>