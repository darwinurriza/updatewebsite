<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            
            $_SESSION['admin_name'] = $row['name'];
            header('location:\website\admin_panel\index.php');

        }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php');

        }elseif($row['user_type'] == 'employee'){

            $_SESSION['employee_name'] = $row['name'];
            header('location:employee_page.php');
            
        }

    }else{
      $error[] = 'incorrect email or password!';

    }

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<header>
    <div class="logo">
    </div>
</header>
<div class="form-container">
    
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        </select>
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>Don't Have An Account? <a href="register_form.php">Register Now</a></p>
    </form>

</div>

</body> 
</html>                                                                          