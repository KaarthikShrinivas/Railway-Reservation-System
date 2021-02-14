
<!DOCTYPE html>
<html>
    <head>
        <title>
            Railway Reservation System
        </title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <h1>Welcome to Railways </h1>
        <br>
        <div class="loginbox">
            <img src="avatar1.png" class="avatar">
            <h2>Login</h2>
            <form action="loginProcess.php" method="POST">
                <p>Username</p>
                <?php
                
                if(isset($_GET['signin']))
                {
                 if($_GET['signin']=='uempty')
                 {
                     
                     echo('<input type="text"  name="Username" placeholder="Enter Username">');
                     echo('<p>*Username is required</p>');
                     echo('<p>Password</p>');
                     echo('<input type="password"  name="Password" placeholder="Enter Password">');
                 }
                 elseif($_GET['signin']=='pempty')
                 {
                     echo('<input type="text"  name="Username" placeholder="Enter Username">');
                     echo('<p>Password</p>');
                     echo('<input type="password"  name="Password" placeholder="Enter Password">');
                     echo('<p>*Password is required</p>');
                 }
                 elseif($_GET['signin']=='unotfound')
                 {
                    echo('<input type="text"  name="Username" placeholder="Enter Username">');
                    echo("<p>*Username doesnot Exists!.</p>");
                    echo('<p>Password</p>');
                    echo('<input type="password"  name="Password" placeholder="Enter Password">');
                 }
                    elseif($_GET['signin']=='nomatch')
                 {
                    echo('<input type="text"  name="Username" placeholder="Enter Username">');
                    echo('<p>Password</p>');
                    echo('<input type="password"  name="Password" placeholder="Enter Password">');
                    echo("<p>*Username and password doesnot match.</p>");
                 }
                }
                else{
                echo('<input type="text"  name="Username" placeholder="Enter Username">');
                echo('<p>Password</p>');
                echo('<input type="password"  name="Password" placeholder="Enter Password">');
                }
                ?>
                <input type="submit"  name="submit" value="Login">
                <br>
                <a href="signupPage.php">Create an account</a>
            </form>
                
        </div>
        
    </body>
</html>