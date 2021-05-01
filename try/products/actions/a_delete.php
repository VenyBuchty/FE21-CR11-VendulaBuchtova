<?php 
session_start();

if (isset($_SESSION[ 'user']) != "") {
   header("Location: ../../profil.php");
   exit;
}

if  (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../../login.php" );
    exit;
}

require_once '../../components/db_connect.php';

if ($_POST) {
   $id = $_POST['id'];
   $picture = $_POST['picture'];
   ($picture =="flower.jpg")?: unlink("../../pictures/$picture" );

  $sql = "DELETE FROM products WHERE id = {$id}";
  if ($connect->query($sql) === TRUE) {
   $class = "success";
   $message = "Successfully Deleted!";
} else {
   $class = "danger";
   $message = "The entry was not deleted due to: <br>" . $connect->error;
}
$connect->close();
} else {
header( "location: ../error.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8">
   <title>Delete</title>
   <?php require_once '../../components/boot.php' ?>  
   <style>
    .navbar {
      background-color: #000000; 
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Our flowers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../home.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
   <div class="container"> 
       <div class= "mt-3 mb-3">
           <h1>Delete request response</h1> 
       </div>
       <div class="alert alert-<?=$class;?>"  role="alert">
           <p><?=$message;?></p >
           <a  href='../index.php'><button  class="btn btn-success" type= 'button'>Home</button></a>
       </div >
   </div>
</body>
</html>