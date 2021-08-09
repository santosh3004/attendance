<?php
  class crud{
    private $db;
    function __construct($conn){
      $this->db=$conn;      
    }

    public function insert($fn,$ln,$dob,$email,$spec,$num,$dest){
      try {
        $sql = "INSERT INTO `attendance` (firstname,lastname,dob,email,contact,speciality,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact,:spec,:desti)";
        $stm=$this->db->prepare($sql);
        $stm->bindparam(':fname',$fn);
        $stm->bindparam(':lname',$ln);
        $stm->bindparam(':dob',$dob);
        $stm->bindparam(':email',$email);
        $stm->bindparam(':contact',$num);
        $stm->bindparam(':spec',$spec);
        $stm->bindparam(':desti',$dest);

        $stm->execute();
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    } 

    public function getAttendees(){
      try{
        $sql = "SELECT * FROM `attendance` a inner  join specialities s on a.speciality = s.spec_id;";
      $result=$this->db->query($sql);
      return $result;
      }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function getSpec(){
      try{
        $sql = "SELECT * FROM `specialities`;";
      $result=$this->db->query($sql);
      return $result;
      }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
      
    }

    public function getAttendeeDetails($id){
      try{
        $sql = "SELECT * FROM `attendance` a inner  join specialities s on a.speciality = s.spec_id where attendee_id = :id;";
      $stm=$this->db->prepare($sql);
      $stm->bindparam(':id',$id);
      $stm->execute();
      $result=$stm->fetch();
      return $result;
      }catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
      
    }

    public function editAttendee($id,$fn,$ln,$dob,$email,$spec,$num){
      try {
        //code...
        $sql="UPDATE `attendance` SET `firstname`=:fname,`lastname`=:lname,`dob`=:dob,`email`=:email,`contact`=:contact,`speciality`=:spec WHERE `attendee_id`=:id";
      $stm=$this->db->prepare($sql);
      $stm->bindparam(':fname',$fn);
        $stm->bindparam(':lname',$ln);
        $stm->bindparam(':dob',$dob);
        $stm->bindparam(':email',$email);
        $stm->bindparam(':contact',$num);
        $stm->bindparam(':spec',$spec);
        $stm->bindparam(':id',$id);
        $stm->execute();
        return true;

      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
      
    }

    public function delete($id){
      try {
        $sql="delete from attendance where attendee_id=:id";
      $stm=$this->db->prepare($sql);
      $stm->bindparam(':id',$id);
      $stm->execute();
      return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }
?>