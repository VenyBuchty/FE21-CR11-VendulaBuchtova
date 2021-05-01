<?php
session_start();
require_once '../components/db_connect.php' ;
if (isset($_SESSION['user']) != "" ) {
   header("Location: ../homepage.php");
   exit;
}

if (!isset($_SESSION['adm' ]) && !isset($_SESSION['user'])) {
   header("Location: ../login.php" );
    exit;
}


$suppliers = "";
$result = mysqli_query($connect, "SELECT * FROM supplier");

while ($row = $result->fetch_array(MYSQLI_ASSOC)){
      $suppliers .= 
"<option value='{$row['supplierId']}'>{$row['sup_name']}</option>";
   }
?>
<!DOCTYPE html> 
<html lang="en">
<head>
   <meta charset="UTF-8"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
   <?php require_once '../components/boot.php' ?>
   <title>PHP CRUD  |  Add Product</title >
   <style>
       fieldset {
           margin: auto;
           margin-top: 100px;
            width: 60% ;
       }    
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
          <a class="nav-link" href="../index.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
<fieldset> 
  <legend class='h2' >Add Product</legend>
  <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
  <table  class='table'>
          <tr>
              <th>Name</th> 
              <td><input  class='form-control' type ="text" name="name"   placeholder="Flower Name" /></td>
          </tr>    
          <tr>
              <th >Price</th>
              <td><input class='form-control'  type="number"  step="any" name = "price" placeholder= "Price" /></td> 
          </tr> 
          <tr> 
              <th >Picture</th> 
              <td ><input class= 'form-control' type= "file" name= "picture"/></td >
          </tr>
          <tr >
              <th>Supplier </th> 
              <td >
              <select  class="form-select"  name= "supplier"  aria-label= "Default select example" > 
                <?php  echo $suppliers; ?>
               <option selected value ='none'> Undefined </option > 
              </select > 
              </td > 
          </tr > 
          <tr > 
              <td ><button class = 'btn btn-success' type = "submit"> Insert Product </button ></td > 
              <td ><a href = "index.php" ><button   class = 'btn btn-warning'   type = "button" > Home </button></a></td> 
          </tr > 
      </table > 
  </form > 
</fieldset > 
</body > 
</html >