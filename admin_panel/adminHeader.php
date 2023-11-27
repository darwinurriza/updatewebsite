<?php
   session_start();
   include_once "./config/dbconnect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #8B4513;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/cof.jpg" width="70" height="70" alt="Swiss Collection">

    </a>
    <a class="navbar-brand ml-5" href="./index.php">

        <img src="./assets/images/logo.png" width="70" height="70" alt="Your Image">
    </a>

    <!-- Centered Text -->
    <div class="navbar-text mx-auto">
        <h3 style="color: beige;">A Start Up Cafe!</h3>

    </div>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    <a href="/website/logins system/login_form.php" class="ac">Account</a>
    

    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
