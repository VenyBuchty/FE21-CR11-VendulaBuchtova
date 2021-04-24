<?php
require_once 'actions/db_connect.php';

if ($_GET['ISBN_code']) {
    $ISBN_code = $_GET['ISBN_code'];
    $sql = "SELECT * FROM Media WHERE ISBN_code = {$ISBN_code}";
    $result = $connect->query($sql);
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
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <title>Edit Product</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            body {
                background-color: #C9FFD5;
            } 

            .card {
               margin: 0 auto;
               border-radius: 20px;
               
           }
            .btn-save {
                background-color: #2C858D;
                color: white;
            }

            .btn-save:hover {
                background-color: #FFFFCB;
                color: black;
            }

             @media only screen and (max-width: 767px) {
                fieldset {
               width: 100% ;
                }  

                .form-control {
                  width: 10rem;
                }
            }
        </style>
    </head>
    <body> 
       <?php require_once 'navbar.php'?>
       <div class="container">
           <div class="card shadow my-4">
           <fieldset>
           <legend class='h2 text-center my-4'>Update Media</legend>
           <form action="actions/a_update.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Title: </th> 
                        <td><input  class ='form-control' type="text"  name="title"  placeholder ="Title" value="<?php echo $title ?>"/></td>
                   </tr>    
                   <tr>
                       <th>Image: </th >
                       <td><input class= 'form-control' type="text"  name= "image" placeholder ="URL-address" step="any" value="<?php echo $image ?>"/></td>
                   </tr>
                   <tr>
                       <th>Description: </th >
                       <td><input class= 'form-control' type="text"  name="short_description" placeholder ="Short description" value="<?php echo $short_description ?>"/></td>
                   </tr>
                   <tr>
                       <th>Media type: </th >
                            <td>
                                <select class="form-select" name="media_type" aria-label="Default select example" value="<?php echo $media_type ?>"/>>
                                    <option selected>Open this select menu</option>
                                    <option value="Book">Book</option>
                                    <option value="CD">CD</option>
                                    <option value="DVD">DVD</option>
                                </select>
                            </td>
                   </tr>
                   <tr>
                       <th>Author first name: </th >
                       <td><input class= 'form-control' type="text"  name="author_first_name" placeholder ="First name" value="<?php echo $author_first_name ?>"/></td>
                   </tr>
                   <tr>
                       <th>Author last name: </th >
                       <td><input class= 'form-control' type="text"  name="author_last_name" placeholder ="Last name" value="<?php echo $author_last_name ?>"/></td>
                   </tr>
                   <tr>
                       <th>Date of publishing: </th >
                       <td><input class= 'form-control' type="date"  name="publish_date" value="<?php echo $publish_date ?>"/></td>
                   </tr>
                   <tr>
                       <th>Publisher name: </th >
                       <td><input class= 'form-control' type="text"  name="publisher_name" placeholder ="Name" value="<?php echo $publisher_name ?>"/></td>
                   </tr>
                   <tr>
                       <th>Publisher address: </th >
                       <td><input class= 'form-control' type="text"  name="publisher_address" placeholder ="Address" value="<?php echo $publisher_address ?>"/></td>
                   </tr>
                   <tr>
                       <th>Publisher size: </th >
                       <td>
                            <select class="form-select" name="publisher_size" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="small">small</option>
                                    <option value="medium">medium</option>
                                    <option value="big">big</option>
                                </select>
                       </td>
                   </tr>
                   <tr>
                       <th>Available: </th >
                       <td>
                           <select class="form-select" name="availability" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="available">Yes</option>
                                    <option value="reserved">No</option>
                                </select>
                       </td>
                   </tr>   
                   <tr>
                       <input type= "hidden" name= "ISBN_code" value= "<?php echo $data['ISBN_code'] ?>" />
                   </tr>
               </table>
               <div class="d-flex justify-content-center mb-4">
              <button class ='btn btn-save mx-2' type="submit">Save Changes</button>
                <a href="index.php" ><button class= 'btn btn-outline-secondary' type= "button"><i class="fas fa-reply"></i> Go Back</button></a>
                </div>
           </form>
       </fieldset>
       </div>
       </div>
    </body>
</html>