<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Distributer Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Fname</th>
		<th>Lname</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_dist = "select * from users WHERE role='distributer'";
	
	$run_dist = mysqli_query($con, $get_dist); 
	
	$i = 0;
	
	while ($row =mysqli_fetch_array($run_dist)){
		
		$id = $row['id'];
		$fname = $row['fname'];
		$lname = $row['lname'];
		$email = $row['email'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $fname;?></td>
		<td><?php echo $lname;?></td>
		<td><?php echo $email;?></td>
		<td><a href="index.php?edit_distributer=<?php echo $id; ?>">Edit</a></td>
		<td><a href="delete_user.php?delete_distributer=<?php echo $id;?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>