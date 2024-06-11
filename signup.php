<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mail=mysqli_real_escape_string($conn,$_POST['mail']);
    $phno=mysqli_real_escape_string($conn,$_POST['phno']);
    $pw=mysqli_real_escape_string($conn,$_POST['pw']);
    $cpw=mysqli_real_escape_string($conn,$_POST['cpw']);
    $sql="select * from registeruser where name='$name'";
    $result=mysqli_query($conn,$sql);
    $count_user=mysqli_num_rows($result);
    $sql="select * from registeruser where email='$mail'";
    $result=mysqli_query($conn,$sql);
    $count_mail=mysqli_num_rows($result);
    if($count_user == 0 & $count_mail == 0)
     {
      if($pw == $cpw)
      {
       // $hash=password_hash($pw,PASSWORD_DEFAULT);
        $sql="insert into registeruser (name,gender,email,phno,password) VALUES 
        ('$name','$gender','$mail','$phno','$pw')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header("location:login.php");
            echo'<script> 
            alert("Registration Successful");
            </script>';

        }
      }
      else
      {
        echo '<script>
        alert("Password not match.try again!");
        window.location.href="signup.php";
        </script>';
      }
     }
     else{
        if($count_user>0)
        {
            echo'<script>
            alert("user already exist");
            window.location.href="login.php";
            </script>';
        }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
    <?php include'style.css' ?>
    </style>
</head>
<body>
<form method="POST">
            <section id="heading">Registration form</section>
            <section class="hero-section">
                   <div class="level">Name</div>
                   <div><input type="text" placeholder="enter name" name="name"></div>
                   <div class="level">Email Address</div>
                   <div><input type="text" placeholder="enter mail" name="mail"></div>
                   <div class="level">Password</div>
                   <div><input type="password" placeholder="enter password" name="pw"></div>
            </section>
            <section class="hero-section">
                <div class="level">Gender</div>
                <div><input type="text" placeholder="enter gender" name="gender"></div>
                <div class="level">Phone number</div>
                <div><input type="text" placeholder="+91 " name="phno"></div>
                <div class="level">confirm Password</div>
                   <div><input type="password" placeholder="enter confirm password" name="cpw"></div>
            </section>
             <section>
            <input type="submit" class="button" name="submit">
        <!-- <input type="Reset" class="hero-section" id="button2" name="reset"> -->
        </section>
         </form>
</body>
</html>