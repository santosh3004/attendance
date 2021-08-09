<?php
class user{
  private $db;

  function __construct($conn){
    $this->db = $conn;      
  }

  public function insertUser($un,$pass){
    try {
      $rs=$this->getUserByUsername($un);
      if($rs['num']>0){
        return false;
      }else{
      $newP=md5($pass.$un);
      $sql = "INSERT INTO `user` (username,password) values (:username,:password)";
      $stm=$this->db->prepare($sql);
      $stm->bindparam(':username',$un);
      $stm->bindparam(':password',$newP);
    

      $stm->execute();
      return true;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
  public function getUser($un,$pass){
    try{
      $sql = "SELECT * FROM `user` where username = :username AND password=:password;";
    $stm=$this->db->prepare($sql);
    $stm->bindparam(':username',$un);
    $stm->bindparam(':password',$pass);
    $stm->execute();
    $result=$stm->fetch();
    return $result;
    }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function getUserByUsername($un){
    try{
      $sql = "SELECT count(*) as num FROM `user` where username = :username;";
    $stm=$this->db->prepare($sql);
    $stm->bindparam(':username',$un);
    $stm->execute();
    $result=$stm->fetch();
    return $result;
    }catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}
?>