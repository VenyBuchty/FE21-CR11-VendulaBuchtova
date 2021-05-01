<?php 
session_start();
require_once '../components/db_connect.php' ;


if (isset($_SESSION['user']) != "") {
   header("Location: ../homepage.php");
   exit;
}

if (! isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../login.php" );
    exit;
}



$sql = "SELECT * FROM products";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
       $tbody .= "<tr>
            <th scope='row'><img class='img-thumbnail' src='../pictures/" .$row['picture']."'</th>
            <td>" .$row['name']."</td>
           <td>" .$row['price']."</td>
           <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
        </tr>";
    };
} else  {
   $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();


?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta  charset="UTF-8">
   <meta name="viewport"  content="width=device-width, initial-scale=1.0">
   <title>PHP CRUD</title>
   <?php require_once '../components/boot.php'  ?>
   <style type= "text/css">
       .manageProduct {           
           margin: auto;
       }
       .img-thumbnail{
        width: 80px !important;
        height: 80px !important;
        object-fit: cover;
       }
       td 
       {          
           text-align: left;
           vertical-align: middle;
       }
       tr
       {
           text-align: center;
       }
       .navbar {
      background-color: #000000; 
    }
   </style>
</head> 

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
          <a class="nav-link" href="../login.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
<div class="manageProduct w-75 mt-3">    
  <div class='mb-3'>
  <a href= "create.php"><button class='btn btn-success shadow'type="button">Add Product</button></a>
  </div>
  <p class ='h2'>Products</p> 
  
    <table class="table shadow">
  <thead>
    <tr>
      <th scope="col">Picture</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?= $tbody; ?>
  </tbody>
</table>
</div>

</body>
</html>