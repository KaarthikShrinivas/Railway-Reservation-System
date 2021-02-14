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
                       header("Location: ../Railway%20Reservation%20System/Available.php?error=emptyFrom");
                    exit();
                   }
                elseif(empty($_POST['To']))
                {
                    header("Location:../Railway%20Reservation%20System/Available.php?error=emptyTo");
                    exit();
                }
                elseif(empty($_POST['Date']))
                {
                    header("Location:../Railway%20Reservation%20System/Available.php?error=emptyDate");
                    exit();
                }
                elseif($_POST['From']==$_POST['To'])
                {
                    header("Location:../Railway%20Reservation%20System/Available.php?error=SameToandFrom");
                    exit();
                }
                else{
                    
                    $FromPlace=$_POST['From'];
                    $ToPlace=$_POST['To'];
                    $Date=$_POST['Date'];
                    header("Location:../Railway%20Reservation%20System/Available.php?From=".urlencode($FromPlace)."&To=".urlencode($ToPlace)."&Date=".urlencode($Date));
                    exit();
                
                }
            }
            ?>