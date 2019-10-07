<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>#Order ID</th>
		<th>Customer Name</th>
		<th>customer Email</th>
		<th>Customer Phone</th>
		<th>Payment</th>
		<th>Order Date</th>
		<th>Action</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_order = "SELECT billing_address.*, orders.* FROM billing_address LEFT JOIN orders ON billing_address.order_id = orders.id";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order = mysqli_fetch_array($run_order)){
		$order_id = $row_order['order_id'];
		$name = $row_order['name'];
		$email = $row_order['email'];
		$phone = $row_order['phone'];
		$payment_status = $row_order['payment_status'];
		$created_at = date('d F, Y h:i:s',strtotime($row_order['created_at']));
		$i++;
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $order_id; ?></td>
		<td><?php echo $name; ?></td>
		<td>
		<?php echo $email;?><br>
		</td>
		<td><?php echo $phone;?></td>
		<td><?php echo $payment_status;?></td>
		<td><?php echo $created_at; ?></td>
		<!--<td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>-->
		<td><a href="index.php?item_details=<?php echo $order_id; ?>">Show Items</a></td>
	</tr>
	<?php } ?>
</table>