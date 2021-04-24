<?php 
require_once 'actions/db_connect.php';

if ($_GET['ISBN_code']) {
    $ISBN_code = $_GET['ISBN_code'];
    $sql = "SELECT * FROM Media WHERE ISBN_code = {$ISBN_code}" ;
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
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
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Media</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            body {
                background-color: #C9FFD5;
            }

            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }     
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }    

            .card {
               margin: 0 auto;
               border-radius: 20px;
               width: 40rem;
           }
        </style>
    </head>
    <body>
        <?php require_once 'navbar.php'?>
        <fieldset>
            <div class="card p-5">
            <h5>You have selected the media below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td><?php echo $title . " by " . $short_description?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this media?</h3>
            <form action ="actions/a_delete.php" method="post">
                <input type="hidden" name="ISBN_code" value="<?php echo $ISBN_code ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php" ><button class= 'btn btn-outline-secondary' type= "button"><i class="fas fa-reply"></i> No, Go Back</button></a>
            </form> 
            </div>
            
        </fieldset>
    </body>
</html>