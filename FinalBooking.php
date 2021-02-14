<html>
    <head>
        <title>Book Tickets</title>
        <link rel="stylesheet" href="FinalBooking.css">
    </head>
    <body>
        <div class="navbar">
            <h1>Welcome to Railways</h1>
            <?php
            session_start();
            echo('<h3 id="Username">Welcome '.$_SESSION['Username'].'</h3>');
            ?>
            <p><a href="BookingHistory.php">Booking History</a>>
            | <a href="Logout.php">Logout</a></p>
        </div>
        <div class="TicketDetails">
            
            <h3>Book Tickets</h3>
            <?php
            $link=mysqli_connect("localhost","root","","login");
            $TrainNumber=0;
            $Date='';
            if(isset($_POST['0']))
            {
            $TrainNumber=$_POST['TrainNumber0'];
            $Date=$_POST['DateOfJourney'];
            echo('<p>Train Number:'.$_POST['TrainNumber0'].'</p>');
            echo('<p>Train Name:'.$_POST['TrainName0'].'</p>');
            echo('<p>Date Of Journey:'.$_POST['DateOfJourney'].'</p>');
            }
            if(isset($_POST['1']))
            {
            $TrainNumber=$_POST['TrainNumber1'];
            $Date=$_POST['DateOfJourney'];
            echo('<p>Train Number:'.$_POST['TrainNumber1'].'</p>');
            echo('<p>Train Name:'.$_POST['TrainName1'].'</p>');
            echo('<p>Date Of Journey:'.$_POST['DateOfJourney'].'</p>');
            }
            echo('<form action="FinalBooking.php" method="POST">');
            echo('<p>Enter Number of Tickets You Want to Book <input type="number" min="1" max="7" name="nooftickets"required> </p>');
            echo('<input type="hidden" name="TrainNumber" value="'.$TrainNumber.'">');
            echo('<input type="hidden" name="Date" value="'.$Date.'">');
            echo('<p><input type="submit" name="submit" value="Enter"></p>');
            echo('</form>');
            if(isset($_POST['submit']))
            {
            echo('<table>');
            echo('<thead>');
                    echo('<th>Name</th>');
                    echo('<th>Age</th>');
                echo('</thead>');
                
                $x=0;
                echo('<form action="BookingHistory.php" method="POST">');
                for($x=0;$x<$_POST['nooftickets'];$x++)
                {
                echo('<tbody>');
                    echo('<td><input type="text" name="Name'.$x.'"placeholder="Name"required></td>');
                    echo('<td><input type="number" name="Age'.$x.'"min="1" max="150"required></td>');
                echo('</tbody>');
                }
                $tname=$_POST['TrainNumber'];
                $d=$_POST['Date'];
            echo('</table>');
            echo("<input type='hidden' name='x' value='".$x."'>");
            echo("<input type='hidden' name='TrainNumber' value='".$tname."'>");
            echo("<input type='hidden' name='Date' value='".$d."'>");
            echo('<input type="submit" name="submit" value="Book Tickets">');
            echo('</form>');
            }
            ?>
        </div>
        <br>
    </body>
</html>