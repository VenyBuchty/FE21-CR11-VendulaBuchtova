<?php
require_once 'db_connect.php';

if ($_POST) {   
   $title = $_POST['title'];
   $image = $_POST['image'];
   $short_description = $_POST['short_description'];
   $media_type = $_POST['media_type'];
   $author_first_name = $_POST['author_first_name'];
   $author_last_name = $_POST['author_last_name'];
   $publish_date = $_POST['publish_date'];
   $publisher_name = $_POST['publisher_name'];
   $publisher_address = $_POST['publisher_address'];
   $publisher_size = $_POST['publisher_size'];
   $availability = $_POST['availability'];
   //this function exists in the service file upload.
   $sql = "INSERT INTO Media (title, image, short_description, media_type, author_first_name, author_last_name, publish_date, publisher_name, publisher_address, publisher_size, availability) VALUES ('$title', '$image', '$short_description', '$media_type', '$author_first_name', '$author_last_name', '$publish_date', '$publisher_name', '$publisher_address', '$publisher_size', '$availability')";

   if ($connect->query($sql) === true ) {
       $class = "success";
       $message = "Media " . $title . " by " . $author_first_name . " " . $author_last_name . " was successfully created!";
   } else {
       $class = "danger";
       $message = "Error while creating record. Try again: <br>" . $connect->error;
   }
   $connect->close();
} else {
   header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <title>Insert Media</title> 
       <?php require_once '../components/boot.php' ?>
       <style>
           .navbar {
            background-color: #004056; 
            }

            .btn-edit {
                background-color: #2C858D;
                color: white;
            }

            .btn-edit:hover {
                background-color: #FFFFCB;
                color: black;
            }

            .alert {
               margin: 0 auto;
               border-radius: 20px;
           }
        </style>
   </head>
   <body>
<head>
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="../img/library.png" alt="" width="100" height="50">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Our database</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../create.php">Insert Media</a>
        </li>
    </div>
  </div>
</nav>
       <div  class="container">
            <div class="text-center alert alert-<?=$class;?>" role="alert">
               <p class="text-center fs-2"><?php echo ($message) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-edit" type='button'>Home</button></a>
           </div >
       </div>
   </body>
</html>