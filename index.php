<?php
    session_start();
    include("db/db_connection.php");
    include("include/header.php");
?>
	 <!-- ****** Banner Area ****** -->
	<div class="container">	
    	<div class="row">
    		<img src="img/blog-img/banner.jpg"  alt="avtar" class="responsive1" height="200px" width="1024px">  	
        </div>
    </div>
 <!-- ****** Banner Area End ****** -->

    <!-- ****** Welcome Post Area Start ****** -->
   <section class="archive-area section_padding_80">
        <div class="container">
			
            <div class="row">
                <?php $query = "SELECT * FROM products WHERE is_featured='1' order by product_id DESC";
                    $result = mysqli_query($con, $query); 
                ?>
                <!-- Single Post -->
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="single.php?id=<?php echo $row['product_id']; ?>">
                                <img src="admin_area/product_images/<?php echo $row['product_image']; ?>" alt="" heigh="10px"></a>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                           <a>Launched Date</a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="single.php?id=<?php echo $row['product_id']; ?>"><?php echo date("M",strtotime($row['created_at'])); ?> <?php echo date("d",strtotime($row['created_at'])); ?>, <?php echo date("Y",strtotime($row['created_at'])); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    
                                </div>
                               
                                    <a href="single.php?id=<?php echo $row['product_id']; ?>"><h5><?php echo $row['product_title']; ?></h5></a>
                                    <p><?php echo $row['product_desc']; ?></p>
                                    <h4>Rs <?php echo $row['product_price']; ?></h4>
    								<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="HS9AS4XZQLP4G">
                                    <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                    </form>-->
                                    <button class="rs_add_to_cart" data-product_id="<?php echo $row['product_id']; ?>">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
			</div>
		</div>
	</section>
    <!-- ****** Welcome Area End ****** -->
    <?php include("include/footer.php"); ?>