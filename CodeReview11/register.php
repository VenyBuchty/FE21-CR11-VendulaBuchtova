<?php
session_start(); 
if ( isset($_SESSION['user']) != "") {
   header("Location: home.php" );
}
if (isset($_SESSION[ 'adm' ]) != "") {
   header("Location: dashboard.php"); 
}

require_once  'components/db_connect.php';
require_once 'components/file_upload.php' ;
$error = false;
$fname = $lname = $email = $date_of_birth = $pass = $picture = '';
$fnameError = $lnameError = $emailError = $dateError = $passError = $picError = '';
if (isset($_POST[ 'btn-signup'])) {

   $fname = trim($_POST['fname']);
   $fname = strip_tags($fname);
   $fname = htmlspecialchars($fname);
   
   $lname = trim($_POST['lname']);
   $lname = strip_tags($lname);
   $lname = htmlspecialchars($lname);    

   $email = trim($_POST['email']);
   $email = strip_tags($email);
   $email = htmlspecialchars($email);

   $date_of_birth = trim($_POST['date_of_birth']);
   $date_of_birth = strip_tags($date_of_birth);
   $date_of_birth = htmlspecialchars($date_of_birth);

   $pass = trim($_POST['pass']);
   $pass = strip_tags($pass);
   $pass = htmlspecialchars($pass);

   $uploadError = '';
   $picture = file_upload($_FILES['picture']);

   // basic name validation
   if (empty($fname) || empty($lname)) {
       $error = true;
       $fnameError = "Please enter your full name and surname";
   } else if (strlen($fname) < 3  || strlen($lname) < 3) {
       $error = true;
       $fnameError = "Name and surname must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
       $error = true;
       $fnameError = "Name and surname must contain only letters and no spaces.";
   }
  
   //basic email validation
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $error = true;
       $emailError = "Please enter valid email address.";
   } else {
   // checks whether the email exists or not
       $query = "SELECT email FROM user WHERE email='$email'";
       $result = mysqli_query($connect, $query);
       $count = mysqli_num_rows($result);
       if ($count != 0) {
           $error = true;
           $emailError = "Provided Email is already in use.";
       }
   }
   //checks if the date input was left empty
   if (empty($date_of_birth)) {
       $error = true;
       $dateError = "Please enter your date of birth.";
   }
   // password validation
   if (empty($pass)) {
       $error = true;
       $passError = "Please enter password.";
   } else if (strlen($pass) < 6 ) { 
       $error = true;
       $passError = "Password must have at least 6 characters." ;
   }

   // password hashing for security
   $password = hash('sha256', $pass);
   // if there's no error, continue to signup 
    if (!$error) {

       $query = "INSERT INTO user(first_name, last_name, password, date_of_birth, email, picture)
                 VALUES('$fname', '$lname', '$password', '$date_of_birth', '$email', '$picture->fileName')";
       $res = mysqli_query($connect, $query);

       if ($res) {
           $errTyp = "success";
           $errMSG = "Successfully registered, you may login now";
           $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';

       } else {
           $errTyp = "danger";
           $errMSG = "Something went wrong, try again later..." ;
           $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
       }
   }
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8"> 
    <meta name="viewport"   content="width=device-width, initial-scale=1.0">
<title>Pet-shop |  Registration</title>
<?php require_once  'components/boot.php'?>
<style>
.card {
                border-radius: 20px;
            }
body {
        background: rgb(140,150,118);
        background: linear-gradient(265deg, rgba(140,150,118,1) 48%, rgba(114,154,114,1) 100%);
    }
.navbar {
      background-color: #232428; 
    }

form {
    margin: 1rem;
}
   </style>
</head> 
<body> 
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Our animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Your Profil</a>
        </li>
    </div>
  </div>
</nav>
<body>
<div class ="container">
<div class="card">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"  enctype="multipart/form-data">
            <h2>Sign Up.</h2>
           <hr/>
           <?php
           if (isset($errMSG)) {
           ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <p><?php echo $errMSG; ?></p>
                        <p><?php echo $uploadError; ?></p>
           </div> 

           <?php
           }
           ?>

           <input type ="text"  name="fname"  class="form-control"   placeholder="First name" maxlength="50" value= "<?php echo $fname ?>"   />
              <span class="text-danger" > <?php echo $fnameError; ?> </span>

            <input type ="text"   name="lname"  class ="form-control"  placeholder= "Surname" maxlength="50"  value="<?php echo $lname ?>"  />
              <span class="text-danger" > <?php echo  $fnameError; ?> </span >

           <input  type="email"  name="email" class ="form-control" placeholder ="Enter Your Email" maxlength="40" value = "<?php echo $email ?>"  />
              <span  class="text-danger" > <?php  echo $emailError; ?> </span>
            <div class ="d-flex">
               <input class='form-control w-50'  type="date"   name="date_of_birth"  value = "<?php echo $date_of_birth ?>"/> 
                <span  class="text-danger" > <?php  echo $dateError; ?> </span>

                <input  class='form-control w-50' type="file" name= "picture" > 
                <span  class= "text-danger" >  <?php   echo  $picError; ?>   </span > 
            </div> 
            <input   type = "password"   name = "pass"   class = "form-control"   placeholder = "Enter Password"   maxlength = "15"   /> 
              <span   class = "text-danger" >   <?php   echo  $passError; ?>   </span > 
            <hr/> 
            <button   type = "submit"   class = "btn btn-block btn-primary"   name = "btn-signup" > Sign Up </button > 
            <hr/> 
            <a href = "login.php" > Sign in Here... </a> 
  </form> 

</div>

  </div> 
</body> 
</html>