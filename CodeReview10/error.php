<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <title>Error</title>
        <?php require_once 'components/boot.php'?>
        <style>
            .alert {
               margin: 0 auto;
               border-radius: 20px;
           }
        </style>    
    </head>
   <body>
        <?php require_once 'navbar.php'?>
       <div  class="container">
                <div class="text-center fs-2 alert alert-warning" role="alert">
                    <p>You've made an invalid request. Please go <a href="index.php" class ="alert-link">back</a> and try again.</p> 
                </div>
           
        </div>
   </body>
</html>