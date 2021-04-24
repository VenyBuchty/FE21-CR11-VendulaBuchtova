<?php require_once 'actions/db_connect.php';


$sql = "SELECT * FROM Media";
$result = mysqli_query($connect ,$sql);
$card=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
      $card .= '<div class="col">
                        <div class="card shadow">
                            <img src="'. $row["image"] . '" class="card-img-top my-3" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder">'. $row["title"]. '</h5>
                                <p class="card-text fst-italic">by '. $row["author_first_name"] . ' ' . $row["author_last_name"] .'</p>
                                <p class="card-text">Type of Media: '. $row["media_type"] .'</p>
                                <p class="card-text text-muted">Published  '. $row["publish_date"].'</p>
                                <div class="d-flex justify-content-center">
                                    <a href="moreInfo.php?ISBN_code=' .$row["ISBN_code"].'"><button class="btn btn_show" type="button">Show more</button></a>
                                </div>
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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CodeReview10</title>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">
            body {
                background-color: #C9FFD5;
            }

            .card-img-top {
                margin: 0 auto;
                width: 18rem; 
                height: 20rem; 
                object-fit:contain;
                
            }

            .card {
                border-radius: 20px;
            }

            .btn_show {
                background-color: #2C858D;
                color: white;
                transition: all .3s ease-in-out;
            }

            .btn_show:hover {
                background-color: #FFFFCB;
                color: black;
                -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
                font-weight: 600;
                transform: scale(1.1);
            }
        </style>
    </head>
    <body>
        <?php require_once 'navbar.php'?>

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?= $card;?>
                </div>    
            </div>
        <?php require_once 'footer.php'?>
    </body>
</html>