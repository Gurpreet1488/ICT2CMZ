<?php
session_start();
include("db/db_connection.php");
include("include/header.php"); ?>
<div class="bradcumb-title text-center">
	
	<h3>Special Offers</h3>
</div><br>
<div class="container">
	<div class="row">
        <?php $query = "SELECT * FROM brand";
            $result = mysqli_query($con, $query); 
        ?>
        <?php while($row = mysqli_fetch_array($result)) { ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                    <div class="post-content">
                        <h5><a href="#"><?php echo $row['brand_title']; ?></a></h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
    <?php include("include/footer.php"); ?>
