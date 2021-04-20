<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
        

        <!-- /*  Create a form with input fields for your firstname, lastname and age. 
        Extract the values from each input field and display them all in a separate div. 
        Use the POST method.
        If the length of your name is larger than 5 characters, change the text colour to green. 
        Otherwise, change the text-colour to red.Now extend with adding a new input field "hobbies". 
        Use the GET method to extract and display the hobbies */ -->
        <form action="myProject.php"  method ="POST">
           First Name: <input type="text"   name="firstName" />
           Last Name: <input type ="text"  name="lastName" />
           Age: <input type ="text"  name="age" />
           <input  type="submit"  name="submit2"  />
        </form>
        <?php 
        if( isset($_POST['submit2'])) {

        $fName = $_POST[ 'firstName'];
        $lName = $_POST[ 'lastName'];
        $age = $_POST[ 'age'];
        
        echo "<div>$fName</div>";
        echo "<div>$lName</div>";
        echo "<div>$age</div>";
    
        }
        
        ?>



        <!-- ADVANCED -->
        <!-- Create a function that can convert °F in °C and show the result on the screen. -->
        <?php

        function convertFahrenheit($celsius){
            $result = ($celsius * 1.8) + 32;
            return $result . "<br/>";
        }

        $converted = convertFahrenheit(30);
        echo $converted;

        ?>





        <!--  You can play with the results creating conditionals and showing on the screen 
        a different img and message depending on the temp:
        From 0°C to 5°C: Very cold
        From 6°C to 10°C: Cold
        From 11°C to 15°C: Pleasant
        From 16°C to 20°C: Warm
        Above 21°C: Hot -->
        <?php
        function weather($temp) {
            if ($temp >= 21) {
                echo '<div class="card shadow text-center" style="width: 18rem;">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTziA3Y7YepsWmAwhe1VD9lPlz6w-EeFzhZGw&usqp=CAU" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-text">Is very hot outside</h5>
                            </div>
                        </div>';
            } elseif ($temp >=16 && $temp <=20) {
                echo '<div class="card shadow text-center" style="width: 18rem;">
                            <img src="https://previews.123rf.com/images/kavram/kavram1610/kavram161000091/65652925-warm-sunny-day-in-suburbs-of-montreal-concept-of-automobile-tourism.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-text">Is warm outside</h5>
                            </div>
                        </div>';
            } elseif ($temp >=11 && $temp <=15) {
                echo '<div class="card shadow text-center" style="width: 18rem;">
                            <img src="https://www.oregonlive.com/resizer/bOwuNuCNlGahkOFkXS1N12WRPgE=/450x0/smart/arc-anglerfish-arc2-prod-advancelocal.s3.amazonaws.com/public/FOEWKTAH45C7NFD4YXZPQYAIQY.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-text">Is pleasant outside</h5>
                            </div>
                        </div>';
            } elseif ($temp >=6 && $temp <=10) {
                echo '<div class="card shadow text-center" style="width: 18rem;">
                            <img src="https://cdn.theculturetrip.com/wp-content/uploads/2016/09/fall.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-text">Is cold outside</h5>
                            </div>
                        </div>';
            } else {
                echo '<div class="card shadow text-center" style="width: 18rem;">
                            <img src="https://greatexpectationspainting.com/wp-content/uploads/2016/11/cold-weather.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-text">Is very cold outside</h5>
                            </div>
                        </div>';
            }
        }
        
        $temperatur = weather(23);
        echo $temperatur;

        ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   </body> 
</html>

