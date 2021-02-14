<?php
$link=mysqli_connect("localhost","root","","login");
if(!$link)
{
    die("Please Check Your Connection".mysqli_error());
}
if(isset($_POST['submit']))
{
$username=mysqli_real_escape_string($link,$_POST["Username"]);
$email=mysqli_real_escape_string($link,$_POST["Email"]);
$password=mysqli_real_escape_string($link,$_POST["Password"]);
$confirmpass=mysqli_real_escape_string($link,$_POST["ConfirmPassword"]);

if(empty($username))
{
    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=usernameEmpty");
    exit();
}
elseif(empty($email))
{
    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=emailEmpty");
    exit();
}
elseif(empty($password))
{
    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=passEmpty");
    exit();
}
elseif(empty($confirmpass))
{
    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=confpassEmpty");
    exit();
}
elseif($password!=$confirmpass)
{

    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=nomatch");
    exit();
}
elseif(!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
{
    header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=invalidEmail");
    exit();
}
else
{
    $checkusername=mysqli_query($link,"SELECT Username FROM users WHERE Username='$username' limit 1 ");
    $resultusername=mysqli_fetch_array($checkusername);
    $checkemail=mysqli_query($link,"SELECT Email FROM users WHERE Email='$email' limit 1 ");
    $resultemail=mysqli_fetch_array($checkemail);
    if(!empty($resultusername))
    {
        header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=usernameExists");
        exit();
    }
    elseif(!empty($resultemail))
    {
        header("Location: ../Railway%20Reservation%20System/signupPage.php?signup=emailExists");
        exit();
    }
    else{
    mysqli_query($link,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')");
    header("Location: ../Railway%20Reservation%20System/index.php");
    exit();
    }
}
}