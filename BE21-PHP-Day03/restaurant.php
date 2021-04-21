

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="d-flex justify-content-center">
    <a href="create.php" class="btn btn-primary btn-lg my-4" tabindex="-1" role="button" aria-disabled="true">Add some dishes</a>
</div>

<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php 
            include_once("db_connect.php");
			$sql = "SELECT * FROM dishes";
			$resultset = mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect));			
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
            <div class="col" >
                <div class="card shadow">
                    <img src="<?php echo $record["img"]; ?>" class="card-img-top" alt="..." style="height: 15rem; width:100%; object-fit:cover;">
                    <div class="card-body">
                        <h2 class="card-text text-bold"><?php echo $record["name"]?></h2>
                        <p class="card-text"><?php echo "Descripiton:" . " " . $record["meal_desc"]?></p>
                        <h5 class="card-text text-danger"><?php echo "Price:" . " " . $record["price"]. "€"?></h5>
                        <a href="delete.php?id=<?php echo $record['dishID']?>" class="btn btn-danger my-4" tabindex="-1" role="button" aria-disabled="true">Delete</a>
                    </div>
                </div>
            </div>   
        <?php } ?>
    </div> 
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>