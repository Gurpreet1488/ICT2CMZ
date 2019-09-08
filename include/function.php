<?php 
// After uploading to online server, change this connection accordingly
$con = mysqli_connect("localhost","ictatjcu_ecomm","123zxc","ictatjcu_ecomm");

if (mysqli_connect_errno())
  {
  echo "The Connection was not established: " . mysqli_connect_error();
  }
 // getting the user IP address
  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
  function getfeedback(){
	
	global $con; 
	
	$get_cats = "select * from feedback";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	
		
		$lname = $row_cats['lastname'];
		 $rating = $row_cats['rating'];
      
	
	echo "<li><a href='feedback.php?cat=$id'>$rating</a></li>";
	
	
	}


}