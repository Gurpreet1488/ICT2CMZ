<?php
session_start();
include("db/db_connection.php");
include("include/header.php");
$status="";
if (isset($_POST['remove_action']) && $_POST['remove_action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
          if($_POST["pro_id"] == $value['pro_id']){
            unset($_SESSION["shopping_cart"][$key]);
            $status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
          }
          if(empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
          } 
    }
}
 
if (isset($_POST['remove_action']) && $_POST['remove_action']=="change"){
    foreach($_SESSION["shopping_cart"] as &$value){
        if($value['pro_id'] === $_POST["pro_id"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }  
}

?>


<style>
    .carts h1 {
        font-size: 20px;
    }
    
    .carts h4 {
        font-size: 16px;
    }
    
    input {
        background: #fc6c3f;
        padding: 8px 15px;
        border: none;
        color: #fff;
        margin-top: 10px;
        cursor: pointer;
        margin-left: 10px;
    }
</style>
<div class="bradcumb-title text-center">
    <h2>Cart Page</h2>
</div><br>
<div class="container">
    <div class="carts">
        <div class="cart">
            <p><?php echo $status; ?></p>
            <?php if(isset($_SESSION["shopping_cart"])){
                $total_price = 0;
            ?> 
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>ITEM NAME</td>
                        <td>QUANTITY</td>
                        <td>UNIT PRICE</td>
                        <td>ITEMS TOTAL</td>
                    </tr> 
                    
                    <?php foreach ($_SESSION["shopping_cart"] as $product){
                        $pro_id = $product['pro_id'];
                        $pro_qty = "select * from products WHERE product_id=$pro_id";
                        $run_pro_qty = mysqli_query($con, $pro_qty); 
                        while ($row_pro=mysqli_fetch_array($run_pro_qty)){
                     ?>
                    <tr>
                        <td>
                            <img src='admin_area/product_images/<?php echo $product["product_image"]; ?>' width="50" height="40" />
                        </td>
                        <td><?php echo $product["product_title"]; ?><br />
                            <form method='post' action=''>
                               <input type='hidden' name='pro_id' value="<?php echo $product["pro_id"]; ?>" />
                                <input type='hidden' name='remove_action' value="remove" />
                                <button type='submit' class='remove'>Remove Item</button> 
                            </form>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='pro_id' value="<?php echo $product["pro_id"]; ?>" />
                                <input type='hidden' name='remove_action' value="change" />
                                <select name='quantity' class='quantity' onChange="this.form.submit()">
                                    <?php for ($x = 1; $x <= $row_pro['product_qty']; $x++) { ?>
                                         <option <?php if($product["quantity"]== $x) echo "selected";?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </td>
                        <td><?php echo "Rs".' '.$product["product_price"]; ?></td>
                        <td><?php echo "Rs".' '.$product["product_price"]*$product["quantity"]; ?></td>
                    </tr>
                    <?php } ?>
                    <?php $total_price += ($product["product_price"]*$product["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="5" align="right">
                            <h1>Cart totals</h1>
                            <h4>Shipping</h4>
                            <form method="POST" action="checkout.php">
                               <div class="my-full-input"> <input type="radio" name="shipping" value="5.00">Flat Rate : Rs 5.00</div>
                               <div class="my-full-input"> <input type="radio" name="shipping" value="0.00" checked="checked">Free Shipping</div>
                                <strong>TOTAL: <?php echo "Rs".' '.$total_price; ?></strong>
                            <div class="my-full-input"><input type="submit" name="submit_cart" value="PROCEED TO CHECKOUT"></div>
                        </td>
                    </tr>
                </tbody>
            </table> 
        <?php } else {
            echo "<h3>Your cart is empty!</h3>";
        } ?>
        </div>
    </div>
</div>
  <?php include("include/footer.php"); ?>