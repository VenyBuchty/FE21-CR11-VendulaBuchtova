<?php

require_once 'db_connect.php';

$sql = "SELECT * FROM dishes";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="d-flex justify-content-center">
    <a href="create.php" class="btn btn-primary btn-lg my-4" tabindex="-1" role="button" aria-disabled="true">Add some dishes</a>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">
<?php			
			 foreach ($rows as $row) {
                echo "<div class='col'>
                        <div class='card shadow'>
                            <img src='" . $row['img']." 'class='card-img-top' style='height: 15rem; width:100%; object-fit:cover;'>
                            <div class='card-body'>
                                <h2 class='card-text text-bold'>" . $row['name'] . "</h2>
                                <p class='card-text'>" . $row['meal_desc'] . "</p>
                                <h5 class='card-text text-danger'>Price: " . $row['price']. " €</h5>
                                <a href='delete.php?dishID=" . $row['dishID'] . "' class='btn btn-danger my-4'>Delete</a>
                            </div>
                        </div>
                    </div>";
                    } 
?>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>