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

require_once '../../components/db_connect.php' ;
require_once '../../components/file_upload.php';

if ($_POST) {   
   $name = $_POST['name'];
   $price = $_POST['price'];
    $supplier = $_POST['supplier'];    
   $uploadError = '';
   //this function exists in the service file upload.
   $picture = file_upload($_FILES['picture'], 'product');  
  
   if($supplier == 'none'){
  //checks if the supplier is undefined and insert null in the DB
   $sql = "INSERT INTO products (name, price, picture, fk_supplierId) VALUES ('$name', $price, '$picture->fileName', null)";
  }else{
   $sql = "INSERT INTO products (name, price, picture, fk_supplierId) VALUES ('$name', $price, '$picture->fileName', $supplier)";
  }
    if ($connect->query($sql) === true) {

       $class = "success";
       $message = "The entry below was successfully created <br>
                       <table class='table w-50'><tr>
                       <td> $name </td>
                       <td> $price </td>
                       </tr></table><hr>
                       ";
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   } else {
       $class = "danger";
       $message = "Error while creating record. Try again: <br>" . $connect->error;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   }
   $connect->close();
} else {
   header("location: ../error.php");
}
?> 
<!DOCTYPE html>
<html lang ="en">
<head> 
    <meta charset= "UTF-8" >
   <title>Update</title>
   <?php require_once '../../components/boot.php' ?>
<style type= "text/css"> 
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
          <a class="nav-link" aria-current="page" href="index.php">Our flowers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
<body>
   <div class="container"> 
       <div class= "mt-3 mb-3">
           <h1>Create request response</h1> 
       </div>
       <div class="alert alert-<?=$class;?>"  role="alert">
           <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php' ><button class="btn btn-primary"  type='button'> Home</button></a> 
       </div>
   </div>
</body>
</html>