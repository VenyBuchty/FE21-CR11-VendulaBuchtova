<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <title ></title>
   </head>
   <body> 

   <!-- Create a PHP script which will accept two parameters from the form name and surname. 
   The user must insert name and surname into the form to get the output:
   "Welcome Name Surname!" otherwise you will output the message: 
   please insert your name, or please insert your surname. -->
       <form action="myProject.php"  method ="POST">
           Name: <input type="text"   name="name" />
           Surname: <input type ="text"  name="surname" />
           <input  type="submit"  name="submit"  />
        </form>
       <?php
       if( isset($_POST['submit']))
       {
           if( $_POST["name"] && $_POST["surname"] )
           {
               echo "Welcome ". $_POST[ 'name']. " " . $_POST['surname']. "<br />" ;
            } elseif ($_POST["name"]) {
                echo "Please, insert your surname";
            } else {
                echo "Please, inser your name";
            }
        }


        // Create a function which takes two integer parameters - divide them and output the 
        //result on the screen.
        function divided($num1, $num2) {
            return $num1 / $num2;
        }
        $result = divided(100, 5);
        echo $result . "<br />"; 
        


        // Make a function that will accept 3 parameters, which are the grades from Math, Physics and English. 
        // then make the calculation and print them on the screen. 
        // Make sure that the variables are numbers.
        function grades($gradeMath, $gradePhysics, $gradeEnglish) {
            echo "Sum: " . ($gradeMath + $gradePhysics + $gradeEnglish) . "<br />";
            echo "Average: " . ($gradeMath + $gradePhysics + $gradeEnglish) / 3 . "<br />";
        }
        $gradesResult = grades(3, 4, 5);
        echo $gradesResult;


        /* Create a function that calculates the area and volume of a box.
        Formulas:
        area = width x height
        volume = width x height x depth
        Pass three different numbers as arguments and get calculated results using the return statement.
        You should get the following results:
        The area of the box is: 14
        The volume of the box is: 70 */
        function area($width, $height, $depth) {
            $sum = ($width * $height) ;
            $volume = ($width * $height * $depth);
            return "The area of the box is: " . $sum . "<br />" . "The volume of the box is: " . $volume . "<br />";
        }
        $areaResult = area(2, 7, 5);
        echo $areaResult;


         
        /*Create a function that will return the number of minutes, in hours and minutes. 
        The function should accept only one argument.
        E.g. If we call the function and pass the number of minutes 200 we should get the message
         "200 minutes = 3 hour(s) and 20 minute(s)." */
        function converter($input){
            $hours = round($input / 60);
            $minutes = $input % 60;
            return $input . " minutes = " . $hours ." hours and " . $minutes . " minutes.";
        }
        
        $converterResult = converter(200);
        echo $converterResult;

        ?>
   </body> 
</html>

