<?php 
session_start();

$nav='';
if (isset($_SESSION[ 'user']) != "") {
   $nav = ' <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Our animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Your Profil</a>
        </li>';
}

if (isset($_SESSION['adm']) ) {
   $nav = ' <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Our animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="animals/index.php">Animals List</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Users List</a>
        </li>';
}
require_once 'components/db_connect.php' ;

$sql = "SELECT * FROM animals WHERE age >= 8";
$result = mysqli_query($connect ,$sql);
$card=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
       $card .= '<div class="col">
                        <div class="card shadow">
                            <img src="pictures/'. $row["image"] . '" class="card-img-top my-3 shadow" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder text-center fs-3">'. $row["name"]. '</h5>
                                <p class="card-text fw-bold text-center">'. $row["description"] .'</p>
                                <p class="card-text fst-italic">Age: '. $row["age"] .'</p>
                                <p class="card-text fst-italic">Size: '. $row["size"] .'</p>
                                <p class="card-text fst-italic">Hobbies: '. $row["hobbies"] .'</p>
                                <p class="card-text text-muted">Currently living in  '. $row["location"].'</p>
                            </div>
                        </div>
                </div>';
                };
    } else {
        $card =  '<div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">No Data Available</p>
                        </div>
                    </div>
                </div>';
    }

    $connect->close();



?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta  charset="UTF-8">
   <meta name="viewport"  content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
   <title>Pet-shop |  Senior Animals</title>
   <?php require_once 'components/boot.php'  ?>
   <style type= "text/css">
       .card-img-top {
                margin: 0 auto;
                width: 18rem; 
                height: 20rem; 
                object-fit:cover;
                border-radius: 20px;
                
            }

            .card {
                border-radius: 20px;
            }
       .navbar {
      background-color: #232428; 
    }
    body {
        background: rgb(140,150,118);
        background: linear-gradient(265deg, rgba(140,150,118,1) 48%, rgba(114,154,114,1) 100%);
    }

    .btn-show {
        background-color: #e4ebe9;
        border-radius: 20px;
        transition: all .2s ease-in-out;
    }

    .btn-show:hover {
        background-color: #dce0be;
        border-radius: 20px;
        transform: scale(1.1);
    }

    .show {
        text-align: center;
        margin: 2rem 0;
    }

        h1, h3 {
        color: #729a72;
    }

        h5 {
        color: #729a72;
        text-shadow: 0.5px 0.5px #000000;
    }
   </style>
</head> 

</head>
<body> 
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <?= $nav;?>
        </ul>
    </div>
  </div>
</nav>
            <div class="container">
            <div class="card text-center p-4 shadow">
                <h1>Be welcome in our Pet-Center</h1>
                <h4>On our site we collect information about dogs and cats that are just ready for adoption.</h4>
                <h3><i class="fas fa-arrow-down"></i></h3>
            </div>
            <div class='show'>
                <a href= "home.php"><button class='btn btn-show shadow'type="button">Show all animals</button></a>
            </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?= $card;?>
                </div>    
            </div>

</body>

</html>