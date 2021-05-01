<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION[ 'adm' ]) && !isset($_SESSION['user'])) {
   header("Location: login.php" );
    exit;
}

if ( isset($_SESSION["user"])) {
   header("Location: profil.php");
   exit;
}

$id = $_SESSION['adm' ];
$status = 'adm';
$sqlSelect = "SELECT * FROM user WHERE status != ? ";
$stmt = $connect->prepare($sqlSelect);
$stmt->bind_param("s", $status);
$work = $stmt->execute();
$result = $stmt->get_result();

$tbody = ''; 
if ($result->num_rows > 0) {
   while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
       $tbody .= "<tr>
           <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
           <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
           <td>" . $row['date_of_birth'] . "</td>
           <td>" . $row['email'] . "</td>
           <td><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-success' type='button'><i class='far fa-edit'></i></button></a>
           <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger' type='button'><i class='fas fa-trash-alt'></i></button></a></td>
        </tr>";
   }
} else {
   $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
   <title>Pet-shop |  List of users</title> 
   <?php require_once 'components/boot.php' ?> 
   <style type="text/css" > 
        body {
            background: rgb(140,150,118);
            background: radial-gradient(circle, rgba(140,150,118,0.927608543417367) 39%, rgba(125,121,121,0.8267682072829132) 74%);
        }    
        .img-thumbnail{
            width: 100px !important;
            height: 100px !important;
            object-fit: cover;
        }

        td {
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .userImage{
            width: 100px ;
            height: 100px;
            object-fit: cover;

        }
        .navbar {
            background-color: #232428; 
        }
        .table {
            background-color: #e4ebe9;
        }

        .btn-success,
        .btn-danger {
            transition: all .2s ease-in-out;

        }

        .btn-success:hover,
        .btn-danger:hover {
            transform: scale(1.1);
        }

   </style>
</head>
<body >
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Our animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="animals/index.php">Animals List</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Users List</a>
        </li>
    </div>
  </div>
</nav>
<div class="container" >
   <div class= "row align-items-center">
       <div  class="col-2 text-center">
       <img class="rounded-circle img-thumbnail"  src="pictures/adm.png" alt= "Adm avatar" >
       <p class="fw-bold">Administrator</p>
       <a  href="logout.php?logout" class="text-white">Sign Out </a>
       </div >
       <div  class="col-8">
        <h2 class="text-center my-3">List of Users</h2>
       <table class='table shadow table-striped'> 
           <thead class="table-success">
               <tr>
                   <th>Picture</th>
                   <th>Name</th >
                   <th>Date of birth</th>
                   <th>Email</th>
                   <th>Action</th >
               </tr>
           </thead>
           <tbody>
            <?=$tbody?>
            </tbody>
        </table>
       </div>
   </div> 
</div> 
</body> 
</html>