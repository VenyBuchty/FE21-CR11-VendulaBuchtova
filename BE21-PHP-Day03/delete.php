<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
   require_once 'db_connect.php';

   if (isset($_GET["dishID"])) { // "dishID" comes from <a href=...?dishID=...
      $id = $_GET["dishID"]; // graphing the id value that is in the url

      $sql = "DELETE FROM dishes WHERE dishID = $id";
      if (mysqli_query($connect, $sql) == true) {
         echo "<div class='container m-auto text-center m-5 p-5 fw-bold'>Record deleted - return to <a href='restaurant.php' class='text-primary'>Home</a></div>";
      }
   }
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>