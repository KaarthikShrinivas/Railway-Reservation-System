<?php

$link=mysqli_connect("localhost","root","","login");
if(!$link)
{
    die("Please Check Your Connection".mysqli_error());
}
if(isset($_POST['submit']))
{

$username=mysqli_real_escape_string($link,$_POST["Username"]);
$password=mysqli_real_escape_string($link,$_POST["Password"]);

if(empty($username))
{
    header("Location: ../Railway%20Reservation%20System/index.php?signin=uempty");
    exit();
}
elseif(empty($password))
{
    header("Location: ../Railway%20Reservation%20System/index.php?signin=pempty");
    exit();
}
else{

$queryU=(mysqli_query($link,"SELECT * FROM users WHERE Username='$username'limit 1"));
$query=(mysqli_query($link,"SELECT * FROM users WHERE Username='$username' AND Password='$password' limit 1"));
$result=mysqli_fetch_array($query);
$resultU=mysqli_fetch_array($queryU);

if(empty($resultU))
{
    header("Location: ../Railway%20Reservation%20System/index.php?signin=unotfound");
    exit();
}
elseif(empty($result)&&$resultU['Username']==$username)
{
    header("Location: ../Railway%20Reservation%20System/index.php?signin=nomatch");
    exit();
}
elseif(($result['Username']==$username)&&($result['Password']==$password))
{
    session_start();
    $_SESSION['Username']=$username;
    header("Location:../Railway%20Reservation%20System/ticketBooking.php");
    exit();
}

}

}


?>