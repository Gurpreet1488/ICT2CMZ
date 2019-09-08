<?php session_start(); ?>
<!DOCTYPE>
<html>
	<head>
		<title>Login Form</title>
<link rel="stylesheet" href="styles/login_style.css" media="all" /> 

	</head>
<body>
<div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
	
	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" value="" placeholder="Eamil" required="required" />
        <input type="password" name="password" value="" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>


</body>
</html>
<?php 

include("includes/db.php"); 
	
	if(isset($_POST['login'])){
		$user_email = $_POST['email'];
		$user_pass = md5($_POST['password']);

		$sel_user = "select * from users where email='$user_email' AND password='$user_pass' AND role='admin'";
		
		$run_user = mysqli_query($con, $sel_user); 
		
		 $check_user = mysqli_num_rows($run_user); 

		if($check_user == 1){
			$results = mysqli_fetch_array($run_user,MYSQLI_ASSOC);

			$_SESSION['user_id']= $results['id'];
			$_SESSION['user_email']= $results['id'];
			$_SESSION['user_role']= $results['role'];
			
			echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
		} else {
			echo "<script>alert('Password or Email is wrong, try again!')</script>";
		} 
	}
?>