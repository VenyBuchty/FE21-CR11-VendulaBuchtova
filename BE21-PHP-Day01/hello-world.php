<!DOCTYPE html>
<html lang= "en">
   <head>
        <meta charset="UTF-8"> 
       <meta name="viewport"  content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="style.css">
       <title>Hello World</title>
   </head >
   <body>
       

<?php
//1.Exercise
$firstName = "Vendula";
$secondName = "Buchtova";
echo "<h1>$firstName $secondName</h1>";

//2.Exercise   
 $age = "28";
 $jobTitle = "Web Programmer";
 
 echo "Hi, my name is " . $firstName . " " . $secondName . ", and I am " . $age .  " and I work as a " . $jobTitle . "<br/>";

//3.Exercise   
$players = ["Mark", "John", "Georg", "Lisa"];
echo "The third player in the team is " . $players[2]."<br/>";
           
//Advanced
$simpsons = [
   "Marge" => "blue hair",
   "Homer" => "donut",
   "Bart" => "problem",
   "Lisa" => "inteligence",
   "Maggie" => "soother"
];

   echo " <br> Typical association of Marge is ".$simpsons["Marge"]."<br/>";
   echo " <br> Typical association of Homer is ".$simpsons["Homer"]."<br/>";
   echo " <br> Typical association of Bart is ".$simpsons["Bart"]."<br/>";
   echo " <br> Typical association of Lisa is ".$simpsons["Lisa"]."<br/>";
   echo " <br> Typical association of Maggie is ".$simpsons["Maggie"]."<br/>";



$signs = array(
   "Marge" => array(
      "hair" => "blue",
      "age" => 45,
      "clothesColor" => "green dress"
   ),
   "Homer" => array (
      "hair" => "bald",
      "age" => 48,
      "clothesColor" => "white T-shirt"
   ),
   "Bart" => array (
      "hair" => "prickly",
      "age" => 10,
      "clothesColor" => "orange T-shirt"
   ),
   "Lisa" => array (
      "hair" => "less prickly",
      "age" => 8,
      "clothesColor" => "orange dress"
   ),
   "Maggie" => array (
      "hair" => "blue bow in hair",
      "age" => "2",
      "clothesColor" => "blue baby-body"
   )
   );

   echo "<br> Marge hair color is: ";
   echo $signs["Marge"]["hair"]."<br/>";

   echo "Homer age is: ";
   echo $signs["Homer"]["age"]."<br/>";

   echo "Bart is wearing: ";
   echo $signs["Bart"]["clothesColor"]."<br/>";

   echo "Lisa's hair is: ";
   echo $signs["Lisa"]["hair"]."<br/>";

   echo "Maggie has: ";
   echo $signs["Maggie"]["hair"]."<br/>";
  



   
   
   
   ?>
   </body> 
</html>