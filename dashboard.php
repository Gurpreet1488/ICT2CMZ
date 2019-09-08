<?php
    session_start();
    include("db/db_connection.php");
    include("include/header.php"); ?>
     <?php if($_SESSION['role'] == 'distributer') { ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1>Welcome to dashboard</h1>
                </div>
            </div>
        </div>
   <?php } else { ?>
         <h1>You have don't permission</h1>
   <?php } ?>
    <?php include("include/footer.php"); ?>