<!DOCTYPE html>
<html>
    <head>
        <title>
            Signup Page
        </title>
        <link rel="stylesheet" type="text/css" href="signuppage.css">
    </head>
    <body>
        <h1>Welcome to Railways</h1>
        <br>
        <div class="signupbox">
        <h2>Sign Up</h2>
        <form action="signupProcess.php" method="POST">
            <p>Username</p>
            <?php
            if(isset($_GET['signup']))
            {
                if($_GET['signup']=='usernameEmpty')
                {
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>*Username Required</p>');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                }
                elseif($_GET['signup']=='emailEmpty'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>*Email address Required</p>');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                }
                elseif($_GET['signup']=='passEmpty'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>*Password Required</p>');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                }
                elseif($_GET['signup']=='confpassEmpty'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                    echo('<p>*Password Required</p>');
                }
                elseif($_GET['signup']=='nomatch'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                    echo('<p>*Passwords doesnot match</p>');
                }
                elseif($_GET['signup']=='invalidEmail'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>*Enter valid email address!</p>');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                    
                }
                elseif($_GET['signup']=='usernameExists'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>*Username is taken already!</p>');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                    
                }
                elseif($_GET['signup']=='emailExists'){
                    echo('<input type="text" name="Username" placeholder="Enter Username">');
                    echo('<p>Email address</p>');
                    echo('<input type="text" name="Email" placeholder="Enter email address">');
                    echo('<p>*Email address is already registered!</p>');
                    echo('<p>Password</p>');
                    echo('<input type="password" name="Password" placeholder="Enter Password">');
                    echo('<p>Confirm Password</p>');
                    echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
                    
                }
            }
            else{
            echo('<input type="text" name="Username" placeholder="Enter Username">');
            echo('<p>Email address</p>');
            echo('<input type="text" name="Email" placeholder="Enter email address">');
            echo('<p>Password</p>');
            echo('<input type="password" name="Password" placeholder="Enter Password">');
            echo('<p>Confirm Password</p>');
            echo('<input type="password" name="ConfirmPassword" placeholder="Confirm Password">');
            }
            ?>
            <br>
            <input type="submit" name="submit" value="Sign Up">  
        </form>
    </div>
    </body>
</html>