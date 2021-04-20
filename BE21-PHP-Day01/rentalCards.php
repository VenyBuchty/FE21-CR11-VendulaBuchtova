
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php 
            include_once("db_connect.php");
			$sql = "SELECT availability, make, brand, model, price, location, image FROM Cars";
			$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
            <div class="col" >
                <div class="card shadow">
                    <img src="<?php echo $record["image"]; ?>" class="card-img-top" alt="..." style="height: 15rem; width:100%; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-text text-danger"><?php echo "Price/hour:" . " " . $record["price"]?></h5>
                        <p class="card-text"><?php echo "Made:" . " " . $record["make"]?></p>
                        <p class="card-text"><?php echo "Brand:" . " " . $record["brand"]?></p>
                        <p class="card-text"><?php echo "Model:" . " " . $record["model"]?></p>
                        <p class="card-text"><?php echo "Location:" . " " . $record["location"]?></p>
                        <h5 class="card-title"><?php echo "Availabile:" . " " . $record["availability"]?></h5>
                    </div>
                </div>
            </div>    
        <?php } ?>

