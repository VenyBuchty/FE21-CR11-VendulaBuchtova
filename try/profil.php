<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm' ])) {
   header("Location: dashboard.php");
   exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: homepage.php" );
    exit;
}
// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$connect->close();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
<title>Welcome - <?php  echo $row['first_name']; ?></title >
<?php require_once 'components/boot.php' ?>
<style>
.userImage{
width: 150px;
height: 150px;
margin: 1rem auto;
}
.hero {
   background: rgb(2,0,36);
    background: linear-gradient(24deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 100%);   
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
          <a class="nav-link" aria-current="page" href="homepage.php">Our flowers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
<div class ="container">
   <div class="hero text-center"> 
       <img class= "userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
       <p class ="text-white fs-4" >Hi <?php  echo $row['first_name']; ?></p>
   <a href="logout.php?logout" class="text-white mx-3">Sign Out</a>
   <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="text-white">Update your profile</a>
   </div>
</div>
</body >
</html>