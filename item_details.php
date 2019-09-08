<?php
session_start();
include("db/db_connection.php");
include("include/header.php"); ?>
<div class="bradcumb-title text-center">
	<h2>All customer Order List</h2>
</div><br>
<div class="container">
    <div class="row tabl-cm">
        <?php if(isset($_SESSION['id']) AND isset($_SESSION['email']) AND isset($_SESSION['role']) == 'customer') { ?>
            <table class="tab-cm" width="100%" align="center"> 
                <tr align="center">
                    <td colspan="6"><h2>View all orders items here</h2></td>
                </tr>
                
                <tr align="center" bgcolor="skyblue">
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                </tr>
                <?php 
                $order_id = $_GET['order_id'];

                $get_items = "select products.*, order_items.* FROM products LEFT JOIN order_items ON products.product_id = order_items.product_id where order_items.order_id='$order_id'";
                
                $run_order_items = mysqli_query($con, $get_items); 
                
                $i = 0;
                
                while ($row_items = mysqli_fetch_array($run_order_items)){
                    $product_title = $row_items['product_title'];
                    $item_price = $row_items['item_price'];
                    $product_quantity = $row_items['product_quantity'];
                    $item_price = $row_items['item_price'];
                    $product_image = $row_items['product_image'];
                    $i++;
                ?>
                <tr align="center">
                    <td><?php echo $i;?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="admin_area/product_images/<?php echo $product_image;?>" width="50" height="50" /></td>
                    <td><?php echo $product_quantity;?></td>
                    <td><?php echo $item_price;?></td>
                </tr>
                <?php } ?>
            </table>
            <a href="order_list.php">Back Order Page</a>
        <?php } else { ?>
            <h1>Please login first</h1>
        <?php } ?>
    </div>
</div>
<?php include("include/footer.php"); ?>