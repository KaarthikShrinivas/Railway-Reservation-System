<html>
    <head>
        <title>Book Tickets</title>
        <link rel="stylesheet" href="BookingHistory.css">
    </head>
    <body>
        <div class="navbar">
            <h1>Welcome to Railways</h1>
            <?php
            session_start();
            echo('<h3 id="Username">Welcome '.$_SESSION['Username'].'</h3>');
            ?>
            <p>
              <a href="Logout.php">Logout</a></p>
        </div>
        <?php
        $link=mysqli_connect("localhost","root","","login");
        if(isset($_POST['submit']))
        {
            $TrainNumber=$_POST['TrainNumber'];
            $NoOfTickets=$_POST['x'];
            $Date=$_POST['Date'];
            $Username=$_SESSION['Username'];
            $quid=mysqli_query($link,"SELECT ID FROM users WHERE Username='$Username'");
            $rqid=mysqli_fetch_array($quid);
            $UserId=$rqid['ID'];
            mysqli_query($link,"UPDATE trains SET NumberOfSeats=NumberOfSeats-'$NoOfTickets' WHERE TrainNumber='$TrainNumber' AND DateOfJourney='$Date'");
            mysqli_query($link,"INSERT INTO bookinghistory(UserID,TrainNumber,DateOfJourney,NoOfTickets) VALUES('$UserId','$TrainNumber','$Date','$NoOfTickets')");
            for($i=0;$i<$NoOfTickets;$i++)
            {
                $PassengerName=$_POST['Name'.$i];
                $PassengerAge=$_POST['Age'.$i];
                mysqli_query($link,"INSERT INTO passengerdetails(UserId,TrainNumber,DateOfJourney,PassengerName,PassengerAge) VALUES('$UserId','$TrainNumber','$Date','$PassengerName','$PassengerAge')");
            }
        }
        ?>
        <div class="History">
            <h2>BOOKING DETAILS</h2>
            <table>
            <thead>
                <th>Train Number</th>
                <th>Train Name</th>
                <th>Date Of Journey</th>
                <th>Number Of Tickets Booked</th>
                <th>Details</th>
                <th>Cancel Tickets</th>
            </thead>
            <?php
            $Username=$_SESSION['Username'];
            $qid=mysqli_query($link,"SELECT ID FROM users WHERE Username='$Username'"); 
            $rid=mysqli_fetch_array($qid);
            $UserID=$rid['ID'];
            $query=mysqli_query($link,"SELECT * FROM bookinghistory WHERE UserID='$UserID'");
            if(mysqli_num_rows($query)>0)
            {
            while($row=mysqli_fetch_array($query))
            {
            echo('<tr>');
            echo("<td>".$row['TrainNumber']."</td>"); 
            $TrainNumber=$row['TrainNumber'];
            $qtname=mysqli_query($link,"SELECT * FROM trains WHERE TrainNumber='$TrainNumber'");
            $resName=mysqli_fetch_array($qtname);
            echo("<td>".$resName['TrainName']."</td>");
            echo("<td>".$row['DateOfJourney']."</td>");
            $Date=$row['DateOfJourney'];
            echo("<td>".$row['NoOfTickets']."</td>"); 
            echo("<td><a href='TicketDetails.php?UserId=".urlencode($UserID)."&TrainNumber=".urlencode($TrainNumber)."&DateOfJourney=".urlencode($Date)."'>View Details</a></td>");
            echo("<td><a href='CancelTickets.php?UserId=".urlencode($UserID)."&TrainNumber=".urlencode($TrainNumber)."&DateOfJourney=".urlencode($Date)."'>Cancel Tickets</a></td>");
            echo('</tr>');
            }
            }
            ?>
            </table>
        </div>
    </body>
</html>