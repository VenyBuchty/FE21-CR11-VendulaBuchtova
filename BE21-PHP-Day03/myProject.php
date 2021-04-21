<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- EXE.1 : Create a for loop which will print your name 50 times on the screen. 
Do the same with while and do while loop.  -->
<?php

for ($i = 0; $i<=50; $i++) {
    echo "Vendula <br/>" ;
}

$j = 0;
$num = 50;
while ($j <= 50)
{
    $num--;
    $j ++;
    echo "Buchtova <br/>" ;
}

$k = 0;
do
{
    echo "Vendula Buchtova <br/>";
    $k++;
} while ($k < 50);

/* EXE.2: Define a numeric array with 10 elements. Use a foreach loop to output the value 
of every array's element. */
$myArray = array(2, 4, 6, 8, 10, 12, 14, 16, 18, 20);
    foreach($myArray as $value) {
        echo "The number is $value <br/>";
    }

/* EXE.3: Create a function that will have a parameter. The argument given to that parameter should be an array.
The function should return the highest value from the array. Try to create an array with at least 10 numbers
created randomly. You may want to take a look at the rand() function from PHP. */
$numArray = array(23, 543, 12, 46634, 3422, 878, 5, 78, 16, 94, 3824, 622564, 53, 75, 153);
function findNum ($ar) {
    $highestValue = max($ar);
    echo "The highest Value in this Array is: $highestValue <br/>"; 
}
echo findNum($numArray);

/* EXE.4: Create a PHP program that iterates the integers from 1 to 100. For multiples of three print "Back-End"
instead of the number and for the multiples of five print "Front-End". For numbers that are multiples 
of both three and five print "Full-Stack". */
function fizzBuzz (){
    for ($i=1;$i<=100;$i++) {
        if ($i % 3 == 0 && $i % 5 == 0)
            echo "Full-Stack <br/>";
         elseif ($i % 5 == 0) 
            echo "Front-End <br/>";
         elseif ($i % 3 == 0) 
            echo "Back-End <br/>";
        else 
            echo $i . "<br/>";
        
    }
}

echo fizzBuzz();
?>
</body>
</html>

