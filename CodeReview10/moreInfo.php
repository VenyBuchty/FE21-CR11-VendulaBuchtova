<?php require_once 'actions/db_connect.php';


if ($_GET['ISBN_code']) {
    $ISBN_code = $_GET['ISBN_code'];
    $sql = "SELECT * FROM Media WHERE ISBN_code = {$ISBN_code}";
    $result = $connect->query($sql);
    $check = "";
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $title = $data['title'];
        $image = $data['image'];
        $short_description = $data['short_description'];
        $media_type = $data['media_type'];
        $author_first_name = $data['author_first_name'];
        $author_last_name = $data['author_last_name'];
        $publish_date = $data['publish_date'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $publisher_size = $data['publisher_size'];
        $availability = $data['availability'];
        if ($data['availability'] === "available") {
            $check = ' &#9989;';
        } else {
            $check = ' &#10060;';
        }
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?> 


<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
       <?php require_once 'components/boot.php'?> 
       <title>CodeReview10</title>
       <style>
           body {
                background-color: #C9FFD5;
            }

           fieldset {
               margin: auto;
               width: 60% ;
           }       

           .card-img-top {
               margin: 0 auto;
               width: 100%;
                height: 20rem; 
                object-fit:contain;
           }

           .card {
               margin: 0 auto;
               border-radius: 20px;
           }


            .btn_show {
                background-color: #2C858D;
                color: white;
                transition: all .2s ease-in-out;
            }

            .btn_show:hover {
                background-color: #74CEB7;
                color: white;
                font-weight: 600;
                transform: scale(1.1);
            }

            .btn-edit {
                background-color: #2C858D;
                color: white;
            }

            .btn-edit:hover {
                background-color: #74CEB7;
                color: white;
            }

          
       </style>
   </head>
   <body> 
       <?php require_once 'navbar.php'?>
       <div class="container">
           <div class="card shadow my-4" >
           <img src="<?php echo $image ?>" class="card-img-top mt-4" alt="...">
                <div class="card-body mt-3">
                    <h5 class="card-title fw-bolder fs-2"><?php echo $title ?></h5>
                    <p class="card-text fs-4"><?php echo $short_description ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="card-text fst-italic">Author: <?php echo $author_first_name . " " . $author_last_name ?></p></li>
                    <li class="list-group-item"><p class="card-text">Type: <?php echo $media_type ?></p></li>
                    <li class="list-group-item">
                        <p class="card-text">Published at <?php echo $publish_date . " by " . $publisher_name . ", " . $publisher_address ?></p>
                    </li>
                    <li class="list-group-item"><p class="card-text">Available: <?= $check;?></p></li>
                </ul>
                <div class="card-body d-flex justify-content-between">
                    <a href="index.php" ><button class= 'btn btn-outline-secondary' type= "button"><i class="fas fa-reply"></i> Go Back</button></a>
                    <a href="update.php?ISBN_code=<?php echo $ISBN_code ?>"><button class="btn-edit btn" type="button">Edit</button></a>
                    <a href="delete.php?ISBN_code=<?php echo $ISBN_code ?>"><button class="btn-danger btn" type="button">Delete</button></a>
                </div>
       </div>
       </div>
       
   </body> 
</html>