<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <title ></title>
   </head>
   <body> 
       <p>GET METHOD</p >
       <form action= "test.php" method= "GET">
           Name: <input type="text"   name="name" />
           Age: <input type= "text"  name="age" />
           <input  type="submit"  name="submit" />
        </form>
       <?php
       if(isset($_GET[ 'submit']))
       {
           if( $_GET["name"] || $_GET["age" ] )
           {
               echo "Welcome ". $_GET['name']. "<br />";
               echo "You are ". $_GET['age' ]. " years old.";
           }
       }
       ?>
   </body> 
</html>