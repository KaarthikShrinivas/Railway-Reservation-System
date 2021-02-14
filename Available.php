<!DOCTYPE html>
<html>
    <head>
        <title>Available Tickets</title>
        <link  rel="stylesheet" href="Available.css">
    </head>
    <body>
        <div class="navbar">
            <h1>Welcome to Railways</h1>
            <?php
            session_start();
            echo('<h3> Welcome '.$_SESSION['Username'].'</h3>');
            ?>
            <p><a href="BookingHistory.php">Booking History</a>
            | <a href="Logout.php">Logout</a></p>
        </div>
        
        <div class="searchbox">
            <form action="Availablesearchbox.php" method="POST">
            <h3>Journey Details</h3>
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error']=='emptyFrom')
                    {
                        echo('<p>From:</p>');
                        echo('<select name="From">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo("<p>*From field is required</p>");
                        echo('<p>To: </p>');
                        echo('<select name="To">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>Date of Journey:</p>');
                        echo('<input type="date" name="Date" placeholder="Date of journey">');
                    }
                    elseif($_GET['error']=='emptyTo')
                    {
                        echo('<p>From:</p>');
                        echo('<select name="From">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>To: </p>');
                        echo('<select name="To">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo("<p>*To field is required</p>");
                        echo('<p>Date of Journey:</p>');
                        echo('<input type="date" name="Date" placeholder="Date of journey">');
                    }
                    elseif($_GET['error']=='emptyDate')
                    {
                        echo('<p>From:</p>');
                        echo('<select name="From">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>To: </p>');
                        echo('<select name="To">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>Date of Journey:</p>');
                        echo('<input type="date" name="Date" placeholder="Date of journey">');
                        echo("<p>*Date field is required</p>");
                    }
                     elseif($_GET['error']=='SameToandFrom')
                    {
                        echo('<p>From:</p>');
                        echo('<select name="From">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>To: </p>');
                        echo('<select name="To">');
                        echo('<option value=""></option>');
                        echo('<option value="Mumbai">Mumbai</option>');
                        echo('<option value="Chennai">Chennai</option>');
                        echo('<option value="Bangalore">Bangalore</option>');
                        echo('</select>');
                        echo('<p>Date of Journey:</p>');
                        echo('<input type="date" name="Date" placeholder="Date of journey">');
                        echo("<p>*From and To cannot be same</p>");
                    }
                }
                else{
                echo('<p>From:</p>');
                echo('<select name="From">');
                echo('<option value=""></option>');
                echo('<option value="Mumbai">Mumbai</option>');
                echo('<option value="Chennai">Chennai</option>');
                echo('<option value="Bangalore">Bangalore</option>');
                echo('</select>');
                echo('<p>To: </p>');
                echo('<select name="To">');
                echo('<option value=""></option>');
                echo('<option value="Mumbai">Mumbai</option>');
                echo('<option value="Chennai">Chennai</option>');
                echo('<option value="Bangalore">Bangalore</option>');
                echo('</select>');
                echo('<p>Date of Journey:</p>');
                echo('<input type="date" name="Date" placeholder="Date of journey">');
                }
                ?>
            <p>
                <input type="submit" name="submit" value="Submit">
            </p>
            </form>
            </div>
        
        <div class="Detailbox">
            <h3>Train Details</h3>
            <form action="FinalBooking.php" method="POST">
            <?php
            $link=mysqli_connect("localhost","root","","login");
            if(!$link)
            {
                die("Connection Error".mysqli_error());
            }
            if(isset($_POST['submit']))
            {
                if(empty($_POST['From']))
                   {
                       header("Location: ../Railway%20Reservation%20System/ticketBooking.php?error=emptyFrom");
                    exit();
                   }
                elseif(empty($_POST['To']))
                {
                    header("Location:../Railway%20Reservation%20System/ticketBooking.php?error=emptyTo");
                    exit();
                }
                elseif(empty($_POST['Date']))
                {
                    header("Location:../Railway%20Reservation%20System/ticketBooking.php?error=emptyDate");
                    exit();
                }
                elseif($_POST['From']==$_POST['To'])
                {
                    header("Location:../Railway%20Reservation%20System/ticketBooking.php?error=SameToandFrom");
                    exit();
                }
                else{
                    if(isset($_GET['From'])){
                    $FromPlace=$_GET['From'];
                    $ToPlace=$_GET['To'];
                    $Date=$_GET['Date'];
                    }
                    else{
                    $FromPlace=$_POST['From'];
                    $ToPlace=$_POST['To'];
                    $Date=$_POST['Date'];
                    }
                    
                    
                    $result=mysqli_query($link,"SELECT * FROM trains WHERE FromPlace='$FromPlace' AND ToPlace ='$ToPlace' AND DateOfJourney='$Date' AND NumberOfSeats > 0");
                    echo('<h4>FROM:'.$FromPlace.'</h4>');
                    echo('<h4>TO: '.$ToPlace.'</h4>');
                    if($result)
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            $x=0;
                            echo('<table>');
                            echo('<thead>');
                                echo('<tr>');
                                    echo('<th>Train Number</th>');
                                    echo('<th>Train Name</th>');
                                    echo('<th>Arrival Time</th>');
                                    echo('<th>Departure Time</th>');
                                    echo('<th>Available Seats</th>');
                                    echo('<th>Book Tickets</th>');
                                echo('</tr>');
                            echo('</thead>');
                        while($row = mysqli_fetch_array($result))
                        {
                                echo("<tr>");
                                echo("<td><input type='hidden' name='TrainNumber".$x."' value='".$row['TrainNumber']."'>".$row['TrainNumber']."</td>");
                                echo("<td><input type='hidden' name='TrainName".$x."' value='".$row['TrainName']."'>" . $row['TrainName'] . "</td>");
                                echo("<td><input type='hidden' name='Arrival".$x."' value='".$row['Arrival']."'>" . $row['Arrival'] . "</td>");
                                echo("<td><input type='hidden' name='Departure".$x."' value='".$row['Departure']."'>" . $row['Departure'] . "</td>");
                                echo("<td><input type='hidden' name='NumberOfSeats".$x."' value='".$row['NumberOfSeats']."'>" . $row['NumberOfSeats'] . "</td>");
                                echo('<input type="hidden" name="DateOfJourney" value="'.$Date.'" >');
                                echo('<td><input type="submit" name="'.$x.'" value="Book Tickets" ></td>');
                                echo("</tr>");       
                            $x=$x+1;
                            
                        }
                            echo("</table>");
                        }
                        else{
                            echo("<p>No Trains Are Available</p>");
                        }
            }
                }
            }
            elseif(isset($_GET['From']))
            {
                    $FromPlace=$_GET['From'];
                    $ToPlace=$_GET['To'];
                    $Date=$_GET['Date'];
                   
                    $result=mysqli_query($link,"SELECT * FROM trains WHERE FromPlace='$FromPlace' AND ToPlace ='$ToPlace' AND DateOfJourney='$Date' AND NumberOfSeats > 0");
                    echo('<h4>FROM:'.$FromPlace.'</h4>');
                    echo('<h4>TO: '.$ToPlace.'</h4>');
                    if($result)
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            $x=0;
                            echo('<table>');
                            echo('<thead>');
                                echo('<tr>');
                                    echo('<th>Train Number</th>');
                                    echo('<th>Train Name</th>');
                                    echo('<th>Arrival Time</th>');
                                    echo('<th>Departure Time</th>');
                                    echo('<th>Available Seats</th>');
                                    echo('<th>Book Tickets</th>');
                                echo('</tr>');
                            echo('</thead>');
                        while($row = mysqli_fetch_array($result))
                        {
                            echo("<tr>");
                                echo("<td><input type='hidden' name='TrainNumber".$x."' value='".$row['TrainNumber']."'>".$row['TrainNumber']."</td>");
                                echo("<td><input type='hidden' name='TrainName".$x."' value='".$row['TrainName']."'>" . $row['TrainName'] . "</td>");
                                echo("<td><input type='hidden' name='Arrival".$x."' value='".$row['Arrival']."'>" . $row['Arrival'] . "</td>");
                                echo("<td><input type='hidden' name='Departure".$x."' value='".$row['Departure']."'>" . $row['Departure'] . "</td>");
                                echo("<td><input type='hidden' name='NumberOfSeats".$x."' value='".$row['NumberOfSeats']."'>" . $row['NumberOfSeats'] . "</td>");
                                echo('<input type="hidden" name="DateOfJourney" value="'.$Date.'" >');
                                echo('<td><input type="submit" name="'.$x.'" value="Book Tickets" ></td>');
                                echo("</tr>");       
                            $x=$x+1;
                        }
                            echo("</table>");
                        }
                        
                        else{
                            echo("<p>No Trains Are Available</p>");
                        }
            }
                }
            ?>
                </form>
        </div>
    </body>
</html>