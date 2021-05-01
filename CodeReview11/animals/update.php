<?php
session_start();

if (isset($_SESSION[ 'user']) != "") {
   header("Location: ../home.php");
   exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: ../login.php" );
    exit;
}

require_once '../components/db_connect.php' ; 

if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM animals WHERE id = {$id}";
   $result = $connect->query($sql);
   if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $breed = $data['breed']; 
        $name = $data['name'];
        $image = $data['image'];  
        $description = $data['description'];
        $location = $data['location'];
        $hobbies = $data['hobbies'];
        $age = $data['age'];
        $size = $data['size'];   
/* 
       $resultSup = mysqli_query($connect, "SELECT * FROM supplier");
       $supList = "";
       if(mysqli_num_rows($resultSup) > 0){
           while ($row = $resultSup->fetch_array(MYSQLI_ASSOC)){
               if($row['supplierId'] == $supplier){
                   $supList .= "<option selected value='{$row['supplierId']}'>{$row['sup_name']}</option>";  
               }else {
                   $supList .= "<option value='{$row['supplierId']}'>{$row['sup_name']}</option>";
               }}                
           }else{
           $supList = "<li>There are no suppliers registered</li>";
       } */
   } else {
       header("location: error.php");
   }
   $connect->close();
} else {
   header("location: error.php");
}
?>
<!DOCTYPE html>
<html >
<head>
  <title>Pet-shop |  Edit Animal</title>
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <?php  require_once '../components/boot.php'?>
  <style type= "text/css">
        .card {
                        border-radius: 20px;
                    }

        body {
                background: rgb(140,150,118);
                background: radial-gradient(circle, rgba(140,150,118,0.927608543417367) 39%, rgba(125,121,121,0.8267682072829132) 74%);
            }

        .navbar {
            background-color: #232428; 
            } 
        
        form {
            margin: auto;
            width: 60% ;
        }

        .img-thumbnail{
            width: 70px !important;
            height: 70px !important;
            object-fit: cover;
        }

        legend {
            padding: 1rem;
        }

        .btn-success,
        .btn-warning {
            transition: all .2s ease-in-out;

        }

        .btn-success:hover,
        .btn-warning:hover {
            transform: scale(1.1);
        }
  </style>
</head> 
<body>
<nav class="navbar navbar-expand navbar-dark mb-3 sticky-top shadow">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../home.php">Our animals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Animals List</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="../dashboard.php">Users List</a>
        </li>
    </div>
  </div>
</nav>
<div class ="container">
<div class="card shadow">
  <legend class= 'h2 text-center'>Update <?php echo $name ?> <img  class='img-thumbnail rounded-circle' src= '../pictures/<?php echo $image ?>' alt="<?php echo $name ?>" ></legend>
  <form  action="actions/a_update.php"  method="post" enctype= "multipart/form-data">
        <table class="table" >
                <tr>
                <th>Breed</th> 
                <td><input  class='form-control' type ="text" name="breed"   placeholder="Animal breed" value="<?php echo $breed ?>" /></td>
            </tr>    
            <tr>
                <th>Name</th>
                <td><input class='form-control'  type="text"  step="any" name ="name" placeholder= "Animal name" value="<?php echo $name ?>" /></td> 
            </tr> 
            <tr> 
                <th>Picture</th> 
                <td><input class= 'form-control' type= "file" name="image" /></td>
            </tr>
            <tr>
                <th>Descripiton</th> 
                <td><input  class='form-control' type ="text" name="description"   placeholder="Animal description" value="<?php echo $description ?>" /></td>
            </tr> 
            <tr>
                <th>Location</th> 
                <td><input  class='form-control' type ="text" name="location"   placeholder="Animal located at" value="<?php echo $location ?>"  /></td>
            </tr> 
            <tr>
                <th>Hobbies</th> 
                <td><input  class='form-control' type ="text" name="hobbies"   placeholder="Animal hobbies" value="<?php echo $hobbies ?>"  /></td>
            </tr>
            <tr>
                <th>Age</th> 
                <td><input  class='form-control' type ="number" name="age"   placeholder="Animal age" value="<?php echo $age ?>" /></td>
            </tr>  
            <tr>
                <th>Size</th> 
            <td>
                <select class="form-select" name="size" aria-label="Default select example" value="<?php echo $size ?>
                    <option selected>Open this select menu</option>
                    <option value="small">small</option>
                    <option value="large">large</option>
                </select>
            </td>
          </tr> 
          <tr> 
              <input   type = "hidden"   name = "id"   value = "<?php echo $data['id'] ?>"/> 
              <input   type = "hidden"   name = "image"   value = "<?php echo $data['image'] ?>"/> 
          </tr> 
      </table> 
            <div class="card-body d-flex justify-content-center">
                <button   class = "btn btn-success mx-2"   type = "submit" ><i class="far fa-save"></i> Save Changes </button > 
                <a   href = "index.php" ><button   class = "btn btn-warning"   type = "button" ><i class="fas fa-reply"></i> Back </button ></a >
            </div>
        </form > 
    </div>
</div > 
</body > 
</html >