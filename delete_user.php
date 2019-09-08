<?php 
	include("includes/db.php"); 
	
	$delete_id = $_GET['delete_distributer'];
	
	$delete_pro = "delete from users WHERE id=$delete_id"; 
	
	$run_delete = mysqli_query($con, $delete_pro); 
	
	if($run_delete){
		echo "<script>alert('A distributer has been deleted!')</script>";
		echo "<script>window.open('index.php?view_distributer','_self')</script>";
	}
?>