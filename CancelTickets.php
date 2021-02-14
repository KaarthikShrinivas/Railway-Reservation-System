<?php
    $link=mysqli_connect("localhost","root","","login");
    $UserId=$_GET['UserId'];
    $TrainNumber=$_GET['TrainNumber'];
    $DateOfJourney=$_GET['DateOfJourney'];
    $q=mysqli_query($link,"SELECT * FROM bookinghistory WHERE UserID='$UserId' AND TrainNumber='$TrainNumber' AND DateOfJourney='$DateOfJourney'");
    $r=mysqli_fetch_array($q);
    $No=$r['NoOfTickets'];
    mysqli_query($link,"UPDATE trains SET NumberOfSeats=NumberOfSeats+'$No' WHERE TrainNumber='$TrainNumber' AND DateOfJourney='$DateOfJourney'");
    mysqli_query($link,"DELETE FROM bookinghistory WHERE UserID='$UserId' AND TrainNumber='$TrainNumber' AND DateOfJourney='$DateOfJourney'");
    mysqli_query($link,"DELETE FROM passengerdetails WHERE UserID='$UserId' AND TrainNumber='$TrainNumber' AND DateOfJourney='$DateOfJourney'");
    header("Location:../Railway%20Reservation%20System/ticketBooking.php");
    exit();


?>
