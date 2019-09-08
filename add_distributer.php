<!DOCTYPE>
<?php include("includes/db.php"); ?>
<html>
	<head>
		<title>Add Distributer</title> 	
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>
		        tinymce.init({selector:'textarea'});
		</script>
	</head>
<body bgcolor="skyblue">
	<form class="insert-product" action="add_distributer.php" method="post" enctype="multipart/form-data"> 
		<table align="center" width="795" border="2" bgcolor="#187eae">
			<tr align="center">
				<td colspan="7"><h2>Add New Distributer Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Fname:</b></td>
				<td><input type="text" name="fname" value="" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Lname:</b></td>
				<td><input type="text" name="lname" value="" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="email" name="email" value="" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="distt_password" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Phone No:</b></td>
				<td><input type="text" name="phno" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Address:</b></td>
				<td><input type="text" name="address" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>City:</b></td>
				<td><input type="text" name="city" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Shop Name:</b></td>
				<td><input type="text" name="shop_name" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Account No:</b></td>
				<td><input type="text" name="account_no" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Ifsc No:</b></td>
				<td><input type="text" name="ifsc_no" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Branch Name:</b></td>
				<td><input type="text" name="branch_name" value="" size="60" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Category:</b></td>
				<td>
					<select name="category">
						<option>Select Category</option>
						<option value="G">G</option>
						<option value="A">A</option>
					</select>
				</td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_distributer" value="Add Distributer"/></td>
			</tr>
		
		</table>
	</form>
</body> 
</html>
<?php 

	if(isset($_POST['insert_distributer'])){
	
		//getting the text data from the fields
		$fname = $_POST['fname'];
		$lname= $_POST['lname'];
		$email = $_POST['email'];
		$distt_password = md5($_POST['distt_password']);
		$phno = $_POST['phno'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$shop_name = $_POST['shop_name'];
		$account_no = $_POST['account_no'];
		$ifsc_no = $_POST['ifsc_no'];
		$branch_name = $_POST['branch_name'];
		$category = $_POST['category'];
	
		 $insert_query = "insert into users (fname,lname,email,password,phno,address,city,shop_name,account_no,ifsc_no,branch_name,category,role) values ('$fname','$lname','$email','$distt_password','$phno','$address','$city','$shop_name','$account_no','$ifsc_no','$branch_name','$category','distributer')";
		 
		 $insert_dist = mysqli_query($con, $insert_query);
		 
		 if($insert_dist){
		 echo "<script>alert('Distributer Has been Added!')</script>"; 
		 echo "<script>window.open('index.php?add_distributer','_self')</script>";
		 }
	}
?>