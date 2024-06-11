<?php
include 'connection.php';
 $login=false;
 if(isset($_POST['submit']))
 {
    include 'connection.php';
    $email=mysqli_real_escape_string($conn,$_POST['mail']);
    $password=mysqli_real_escape_string($conn,$_POST['pw']);
    $sql="select * from registeruser where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num_email=mysqli_num_rows($result);
   // $password_check=password_verify($password,$hash);
    $sql="select * from registeruser where password='$password'";
    $result=mysqli_query($conn,$sql);
    $num_password=mysqli_num_rows($result);
    if($num_email == 1 & $num_password==1)
    {
     // $login="true";
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['mail']=$email;
      header('location:welcome.php');
    }
    else{
        ?> <script>alert("invalid user and password")</script>
        <?php
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
    <?php include'style1.css' ?>
    </style>
</head>
<body>
<form method="POST" class="form1">
            <section id="heading">LogIn</section>
            <section class="hero-section">
                   <div class="level">Email Address</div>
                   <div><input type="text" placeholder="enter mail" name="mail"></div>
                   <div class="level">Password</div>
                   <div><input type="password" placeholder="enter password" name="pw"></div>
            <input type="submit" class="login" name="submit" value="Log In">
            </section>
</body>
</html>