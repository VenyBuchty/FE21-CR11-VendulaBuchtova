<?php
   require_once 'db_connect.php';

if(isset($_POST["submit"])){ // if the input that has the type submit has a value (when clicked
        $img = $_POST["img"];
        $name = $_POST["name"]; // takes the value from the input whose name attribute is equals to first_name using the $POST method
        $price = $_POST["price"]; // takes the value from the input whose name attribute is equals to last_name
        $meal_desc = $_POST["meal_desc"];
        $sql = "INSERT INTO dishes (img, name, price, meal_desc) VALUES ('$img', '$name', '$price', '$meal_desc')";
                // query that creates a new record in the table test. The values come from the form

       if(mysqli_query($connect, $sql) == true){ // if the query runs successfully it will show a message and a link to go back to the home page.
           echo  '<div class="d-flex justify-content-center text-center">
                    <h5>Dish successfully saved!</h5>
                    <a href="restaurant.php" class="btn btn-primary my-4" tabindex="-1" role="button" aria-disabled="true">Go back</a>
                </div>';
       }    
    }
?>
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
 <form method="post" >
           <input type="text"  name="img" placeholder= "Type img src">
           <input type="text"  name="name" placeholder= "Type dish name">
           <input type="text"  name="price" placeholder= "Type price of dish">
           <input type="text"  name="meal_desc" placeholder= "Type some description">
           <input type="submit"  name="submit" value= "submit">
       </form> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>