<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
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

           .card {
               margin: 0 auto;
               border-radius: 20px;
               
           }
           .btn-create {
                background-color: #2C858D;
                color: white;
            }

            .btn-create:hover {
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
           <legend class='h2 text-center my-4'>Add Media</legend>
           <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Title: </th> 
                        <td><input  class ='form-control' type="text"  name="title"  placeholder ="Title" /></td>
                   </tr>    
                   <tr>
                       <th>Image: </th >
                       <td><input class= 'form-control' type="text"  name= "image" placeholder ="URL-address" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Description: </th >
                       <td><input class= 'form-control' type="text"  name="short_description" placeholder ="Short description"/></td>
                   </tr>
                   <tr>
                       <th>Media type: </th >
                            <td>
                                <select class="form-select" name="media_type" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Book">Book</option>
                                    <option value="CD">CD</option>
                                    <option value="DVD">DVD</option>
                                </select>
                            </td>
                   </tr>
                   <tr>
                       <th>Author first name: </th >
                       <td><input class= 'form-control' type="text"  name="author_first_name" placeholder ="First name"/></td>
                   </tr>
                   <tr>
                       <th>Author last name: </th >
                       <td><input class= 'form-control' type="text"  name="author_last_name" placeholder ="Last name"/></td>
                   </tr>
                   <tr>
                       <th>Date of publishing: </th >
                       <td><input class= 'form-control' type="date"  name="publish_date" /></td>
                   </tr>
                   <tr>
                       <th>Publisher name: </th >
                       <td><input class= 'form-control' type="text"  name="publisher_name" placeholder ="Name"/></td>
                   </tr>
                   <tr>
                       <th>Publisher address: </th >
                       <td><input class= 'form-control' type="text"  name="publisher_address" placeholder ="Address"/></td>
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
               </table>
                <div class="d-flex justify-content-center mb-4">
                    <button class ='btn btn-create mx-2' type="submit">Insert Media</button>
                  <a href="index.php" ><button class= 'btn btn-outline-secondary' type= "button"><i class="fas fa-reply"></i> Go Back</button></a>
                </div>
           </form>
       </fieldset>
       </div>
       </div>
       
   </body> 
</html>