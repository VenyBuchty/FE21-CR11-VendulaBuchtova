<?php 
require_once 'db_connect.php';

if(isset($_GET["dishID"])){
   $dishID = $_GET[ "dishID" ]; // graphing the id value that is in the url

   $sql = "DELETE FROM dishes WHERE dishID = $dishID";
   if(mysqli_query($connect, $sql) == true){
        echo '<div class="d-flex justify-content-center text-center">
                    <h5>Dish deleted!</h5>
                    <a href="restaurant.php" class="btn btn-primary my-4" tabindex="-1" role="button" aria-disabled="true">Go back</a>
                </div>';
   } 
}

?>