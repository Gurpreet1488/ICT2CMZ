<?php
    session_start();
    include("db/db_connection.php");
    include("include/header.php"); ?>
<style>
    
    .about-img img {
      width: 180px;
    }
    
    .about-img {
      text-align: center;
    }
    
    .free-delivery {
        padding-top: 40px;
        margin-top: 40px;
        border-top: 1px solid #d3d3d3;
    }
</style>
		<div class="bradcumb-title text-center">
			<h2>About Us</h2>
		</div><br>
 <!-- ****** Banner Area End ****** -->
    <!-- ****** Welcome Post Area Start ****** -->
        <div class="container">
			<div class="row">
				<div class="col-md-12" style="text-align: center; margin-bottom:30px; ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                <div class="col-md-4">
                    <div class="about-img">
                        <img src="./images/cart.svg">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="about-cont">
                        <h3>Online Secure Payment</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters ...</p>
                    </div>
                </div>
			</div>
            <div class="free-delivery">
                <div class="row">
                    <div class="col-md-8">
                        <div class="about-cont">
                            <h3>Fast & Free Delivery</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters ...</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-img">
                            <img src="./images/delivery-truck.svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ****** Welcome Area End ****** -->
    <?php include("include/footer.php"); ?>