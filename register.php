<?php
    session_start();
    include("db/db_connection.php");
	include("include/header.php");
	include("include/header2.php");

   
    
    
    
    $registered = FALSE;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $password = md5($_POST['pass']);
        $current_time = date("Y-m-d h:i:sa");
        $query = "INSERT INTO users(fname, lname, email, phno, password, role) "
                . "VALUES('$fname', '$lname', '$email', '$phno', '$password', 'customer')";
        
        if (!$result = mysqli_query($con, $query)) {
	    exit(mysqli_error($con));
	}
        mysqli_close($con);
	$registered = TRUE;
    }
    
?>
	
    <?php if(isset($_SESSION['id']) AND isset($_SESSION['email']) AND isset($_SESSION['role']) == 'customer' OR isset($_SESSION['id']) AND isset($_SESSION['email']) AND isset($_SESSION['role']) == 'distributer') { ?>
        <div class="container">
            <div class="signin-content">
                <h1>You are already login</h1>
            </div>
        </div>
   <?php } else { ?>      

    <!-- ****** Welcome Post Area Start ****** -->
 
        <div class="container">
			
         
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
						<?php if($registered){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> You are successfully registered with our system.
            </div>
			<?php } ?>	
                        <form action="register.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="firstname" placeholder="Your First Name"/>
                            </div>
							<div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="lastname" placeholder="Your Last Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
							<div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="phone" name="phno" id="phone" placeholder="Your phone number"/>
                            </div>
                            <div class="form-group">
                                <label for="password_1"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password_2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpass" id="cpass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            
        </section>
  </div>
				
				
			</div>
		</div>
	</section>
    <!-- ****** Welcome Area End ****** -->
<?php } ?>
  
   <?php
    
    include("include/footer.php");
?>