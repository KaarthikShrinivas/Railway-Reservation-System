
<!DOCTYPE html>
<html>
    <head>
        <title>
            Book Your Ticket
        </title>
        <link rel="stylesheet" type="text/css" href="ticketbooking.css">
    </head>
    <body>
        <div class="navbar">
            <h1>Welcome to Railways</h1>
            <?php
                session_start();
                echo('<h3>Welcome '.$_SESSION['Username'].'</h3>');
            ?>
            <p><a href="BookingHistory.php">Booking History</a>
            | <a href="Logout.php">Logout</a></p>
        </div>
        <br>
        <div class="detailbox">
            <form action="Available.php" method="POST">
                <h2>BOOK YOUR TICKETS</h2>
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
                <br>
                <input type="submit" name="submit" value="Submit">
                
            </form>   
        </div>
    </body>
</html>