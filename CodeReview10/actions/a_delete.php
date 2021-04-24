<?php 
require_once 'db_connect.php';

if ($_POST) {
    $ISBN_code = $_POST['ISBN_code'];
    $sql = "DELETE FROM Media WHERE ISBN_code = {$ISBN_code}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <title>Delete</title>
        <?php require_once '../components/boot.php'?>
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
        <div class="container">
            <div class="text-center alert alert-<?=$class;?>" role="alert">
                <p class="text-center fs-2"><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-edit" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>