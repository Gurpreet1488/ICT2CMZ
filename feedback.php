<?php
session_start();
include("db/db_connection.php");
include("include/header.php");
include("include/header2.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname        = $_POST['firstname'];
    $lname        = $_POST['lastname'];
    $email        = $_POST['email'];
    $rating       = $_POST['rating'];
    $comment      = $_POST['comment'];
    $current_time = date("Y-m-d h:i:sa");
    $query        = "INSERT INTO feedback(fname, lname, email, rating, comment) " . "VALUES('$fname', '$lname', '$email', '$rating', '$comment')";
    //Database Entry
    $insert       = mysqli_query($con, $query);
    if ($insert) {
        echo "<h1>Feedback is submited successfully</h1>";
    }
}
?>
<style>
    .signup-form {
        margin: 30px 0;
    }
    .signup-image {
        margin: 0 0;
    }
    .signup-form  .form-submit {
        background: #fc6c3f;
        color: #fff;
        box-shadow: none;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 0px;
        transition: all .5s;
    }
    .signup-form .form-submit:hover {
        background: #f94d17;
    }
    .search-form input {
        width: 52%;
        float: left;
    }
    .search-form input:nth-child(2){
        width: 20%;
    }
    .feedback-list h3 {
        font-weight: 700;
        font-size: 27px;
        margin-bottom: 30px;
    }
    .feedback-list .items-list h5 {
        font-size: 18px;
        text-transform: capitalize;
        margin: 10px 0;
    }
    .feedback-list .items-list p {
        font-size: 14px;
        color: #888;
        font-weight: 300;
    }
    .feedback-list .items-list {
        margin-bottom: 20px;
    }
    input[type="radio"] {
        position: relative;
        top: 18px;
    }
</style>
 <!--==========================Feedback Section============================-->
    <!-- ****** Banner Area ****** -->
      <div class="bradcumb-title text-center">
        <h2>Customer Feedback</h2>
        <p>Please provide your feedback!</p>
      </div>
      <!-- ****** Banner Area End ****** -->
      <!-- ****** Welcome Post Area Start ****** -->
        <div class="container">
          <div class="signu-content row">
              <div class="signup-form col-md-6">
                  <form action="" method="POST" class="register-form" id="register-form">
                      <div class="form-group">
                          <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="firstname" id="firstname" placeholder="Your First Name" required="" />
                      </div>
                      <div class="form-group">
                          <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                          <input type="text" name="lastname" id="lastname" placeholder="Your Last Name" required=""/>
                      </div>
                      <div class="form-group">
                          <label for="email"><i class="zmdi zmdi-email"></i></label>
                          <input type="email" name="email" id="email" placeholder="Your Email" required=""/>
                      </div>
                       <div class="form-group">
                          <label for="comment"><i class="zmdi zmdi-email"></i></label>
                          <input type="textarea" name="comment" id="email" placeholder="Your Comments" required=""/>
                      </div>
                      
                      <div class="form-group">
                        <p>How do you rate your overall experience?
                          <input type="radio" name="rating" value="Bad" required=""/> Bad 
                          <input type="radio" name="rating" value="Average" required=""/> Average
                          <input type="radio" name="rating" value="Good" required=""/> Good  
                          <input type="radio" name="rating" value="Excellent" required=""/> Excellent
                        </p>
                      </div>
                      <div class="form-group form-button">
                          <input type="submit" name="submit" type= "submit" id="submit" class="form-submit" />
                      </div>
                    </form>
                  </div>
                  <div class="signup-image col-md-6">
                      <figure><img src="images/feedback.jpg" alt="sign up image"></figure>
                  <!--Displaying the data from database-->
                  </div>
                  <div class="feedback-list col-md-12">
                     <?php 
                    $query = "SELECT * FROM feedback ORDER BY id DESC";
                    $result = mysqli_query($con, $query); 
                    ?>
                    <!-- Single Post -->
                    <?php 
                    if(mysqli_num_rows($result) >=1 ) { ?>
                      <h3>Feedback List</h3>
                      <?php while($row = mysqli_fetch_array($result)) { ?>
                          <div class="items-list">
                            <h5><?php echo $row['fname'].' '.$row['lname']; ?></h5>
                            <p><?php echo $row['rating']; ?></p>
                            <p><?php echo $row['comment']; ?></p>
                          </div>
                        <?php } 
                      } else { ?>
                        <h1>No Feedback found</h1>
                      <?php } ?>
                  </div>
          </div>
      </div>
    <!-- #feedback -->
<?php
include("include/footer.php");
?>