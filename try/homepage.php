<?php 

require_once 'components/db_connect.php' ;

$sql = "SELECT * FROM products";
$result = mysqli_query($connect ,$sql);
$card=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
      $card .= '<div class="col">
                        <div class="card shadow">
                            <img src="pictures/'.$row['picture']. '" class="card-img-top my-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder">'.$row['name']. '</h5>
                                <p class="card-text">Price: '.$row['price'].'</p>
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
   <title>PHP CRUD</title>
   <?php require_once 'components/boot.php'  ?>
   <style type= "text/css">
       .card-img-top {
                margin: 0 auto;
                width: 18rem; 
                height: 20rem; 
                object-fit:contain;
                
            }

            .card {
                border-radius: 20px;
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
          <a class="nav-link" aria-current="page" href="homepage.php">Our flowers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?= $card;?>
                </div>    
            </div>

</body>
</html>