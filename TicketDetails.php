<html>
    <head>
        <title>Book Tickets</title>
        <link rel="stylesheet" href="TicketDetails.css">
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
        <div class="Ticket">
            <h2>Ticket Details</h2>
            <p>Train Number : <?php echo($_GET['TrainNumber']);?></p>
            <p>Train Name : 
                <?php
                    $link=mysqli_connect("localhost","root","","login");
                    $TrainNo=$_GET['TrainNumber'];
                    $qtn=mysqli_query($link,"SELECT * FROM trains WHERE TrainNumber='$TrainNo'");
                    $rtn=mysqli_fetch_array($qtn);
                    $TrainName=$rtn['TrainName'];
                    $Arrival=$rtn['Arrival'];
                    $Departure=$rtn['Departure'];
                    $From=$rtn['FromPlace'];
                    $To=$rtn['ToPlace'];
                    $UserID=$_GET['UserId'];
                    $Date=$_GET['DateOfJourney'];
                    echo($TrainName);
                ?>
            </p>
            <p>Date Of Journey : <?php echo($Date);?></p>
            <p>From : <?php echo($From);?></p>
            <p>To : <?php echo($To);?></p>
            <p>Arrival Time : <?php echo($Arrival);?></p>
            <p>Departure Time: <?php echo($Departure);?></p>
            <p>Passenger Details : </p>
            <table>
                <thead>
                    <th>Name</th>
                    <th>Age</th>
                </thead>
                <?php 
                    $quer=mysqli_query($link,"SELECT * FROM passengerdetails WHERE UserID='$UserID' AND TrainNumber='$TrainNo' AND DateOfJourney='$Date'");
                    if(mysqli_num_rows($quer)>0)
                    {
                        while($row=mysqli_fetch_array($quer))
                        {
                            echo('<tr>');
                            echo('<td>'.$row["PassengerName"].'</td>');
                            echo('<td>'.$row["PassengerAge"].'</td>');
                            echo('</tr>');
                        }
                    }
                
                ?>
                
            </table>
            
        </div>
    </body>