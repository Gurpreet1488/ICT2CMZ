<?php session_start();
	include("db/db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>CMZ</title>
	
	<!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
   

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
<style>
    .rs_add_to_cart {
  background: #fc6c3f;
  color: #fff;
  box-shadow: none;
  border: none;
  padding: 8px 15px;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
}

.remove, .cart a, .tabl-cm a {
    background: #fc6c3f;
    padding: 8px 15px;
    border: none;
    color: #fff;
    margin-top: 10px;
}

.order-cm table {
    width: 100%;
}

.tab-cm tbody, .order-cm tbody{
    border: 1px solid #868686;
}

.tab-cm tr, .order-cm tr {
    height: 40px;
    border-top: 1px solid #868686;
}

.tab-cm td, .order-cm td {
    border-right: 1px solid #868686;
    text-align: left;
    padding: 0 10px;
}

.order-cm td a {
    color: #3e3e3e;
}

.order-cm td a:hover {
    color: #fc6c3f;
}


.tab-cm h2 {
    font-size: 20px;
    margin: 12px 0;
    color: #333;
}

.tab-cm th:nth-child(2) {
    padding: 0 10px;
}

.tab-cm td:nth-child(4), .tab-cm td:nth-child(5) {
    text-align: center;
}
.my-full-input input {
    margin-right: 5px;
}
.search-form {
	text-align: right !important;
	padding: 1.4px 0;
}
    .post-content h4 {
	font-size: 16px;
}
    .search-form input[type="text"] {
	border: 1px solid #ddd;
	padding-left: 10px;
	padding-top: 5px;
	padding-bottom: 5px;
}
    .search-form input[type="submit"] {
	background: #222;
	border: none;
	padding: 5px 15px;
	color: #fff;
}
    /*single page css*/
    .gold{
	color: #FFBF00;
}.service-image-left #item-display {
	width: 100%;
	height: 100%;
	min-height: 319px;
}

/*********************************************
					PRODUCTS
*********************************************/

.product{
	border: 1px solid #dddddd;
	height: 321px;
}

.product>img{
	max-width: 230px;
}

.product-rating{
	font-size: 20px;
	margin-bottom: 25px;
}

.product-title{
	font-size: 20px;
}

.product-desc{
	font-size: 14px;
}

.product-price{
	font-size: 22px;
}

.product-stock{
	color: #74DF00;
	font-size: 20px;
	margin-top: 10px;
}

.product-info{
		margin-top: 50px;
}

/*********************************************
					VIEW
*********************************************/





.view-wrapper {
	float: right;
	max-width: 70%;
	margin-top: 25px;
}



/*********************************************
				ITEM 
*********************************************/

.service1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}

.service1-item {
	height: 107px;
	width: 120px;
	display: block;
	float: left;
	position: relative;
	padding-right: 20px;
	border-right: 1px solid #DDD;
	border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
}

.service1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}

.service1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}

.service-image-left {
	padding-right: 0;
}

.service-image-right {
	padding-left: 50px;
}

.service-image-left > center > img,.service-image-right > center > img{
	max-height: 155px;
}

.search-form form {
    display: flex;
}

.search-form input.input-key {
    width: 35%;
    margin-left: 14em;
}

.search-form input.input-submit {
    width: 22%;
}
</style>
</head>

	<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

   
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </div>
                </div>
                 <div class="col-7 col-sm-6">
                    <div class="search-form">
                        <form method="GET" action="search.php?">
                            <input class="input-key" type="text" name="keyword" value="<?php echo $_GET['keyword']; ?>" placeholder="Enter Keyword">
                            <input class="input-submit" type="submit" value="Search">
                        </form>
                    </div>
                    <?php if($_SESSION['role'] == 'customer') { ?>
                        <div class="signup-search-area d-flex align-items-center justify-content-end">
                            <div class="login_register_area d-flex">
                                <div class="login">
                                    <a href="logout.php">Logout</a>
                                    <a href="order_list.php">Order List</a>
                                </div>
                            </div>
                            <?php if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                ?>
                                <div class="cart_div">
                                    <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i> Cart<span>
                                    <?php echo $cart_count; ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                <?php } elseif($_SESSION['role'] == 'distributer'){ ?>
                        <div class="signup-search-area d-flex align-items-center justify-content-end">
                            <div class="login_register_area d-flex">
                                <div class="login">
                                   <a href="dashboard.php">Dashboard</a>
                                    <a href="distributer-prod.php">All Products</a>
                                    <a href="order_list.php">Order List</a>
                                     <a href="logout.php">Logout</a>
                                </div>
                            </div>
                            <?php if(!empty($_SESSION["shopping_cart"])) {
                                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                ?>
                                <div class="cart_div">
                                    <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i> Cart<span>
                                    <?php echo $cart_count; ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                <?php } else { ?>
                    <!--  Login Register Area -->
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="login.php">Sign In</a>
                            </div>
                            <div class="register">
                                <a href="register.php">Sign up</a>
                            </div>
                        </div>
                        <?php if(!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                            <div class="cart_div">
                                <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i> Cart<span>
                                <?php echo $cart_count; ?></span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="index.php" class="yummy-logo">CMZ Pvt. LTD</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="brand.php">Brands</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="products.php">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="distributer.php">Distributor</a>
                                </li>
                                <li class="nav-item">
									<a class="nav-link" href="about.php">About us </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contactus.php">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
	</body>