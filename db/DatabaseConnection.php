<?php
//require_once "DatabaseCredentials.php";
// class DatabaseConnection{
//      $con;
//     function __construct()
//     {
//         $dc=new DatabaseCredentials();
//         $this->con=mysqli_connect($dc->getHostName(),$dc->getUserName(),$dc->getPassword(),$dc->getDatabaseName());
        
//     }
//     function checkConnection(){
//         if($this->con){
//             echo"Connection Successfull";
//         }
//     }
// }
// $dbc=new DatabaseConnection();
// $dbc->checkConnection();
  // $hostname="localhost";
  // $username="root";
  // $password="";
  // $dbname="loginregister";
  // $charset="utf8mb4";

  $hostname="remotemysql.com";
  $username="c0avElH5Sp";
  $password="JgOYzLeth4";
  $dbname="c0avElH5Sp";
  $charset="utf8mb4";
  $dsn = "mysql:host=$hostname;dbname=$dbname;charset=$charset";

  try {
    $pdo=new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    // echo "NO DATABASE FOUND";
    throw new PDOException($e->getMessage());
  }
  require_once 'crud.php';
  $crud=new crud($pdo);
?>