<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <title> Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body background="img/login_back.png" class="body_deg">
    <!--<h1> Loging Form</h1>-->



    <div class="Lform_design">
       
    
        
    
        <!--<h2 class="title_deg">Login Form</h2>-->

    <form  action="login_check.php" method="POST"class="login-form">
         <h2 class="title_deg">Login Form</h2>

         </h4><h4>
        <?php

        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['loginMessage'];
        ?>
    </h4>


        <div>
            <label class="label_deg"> User Name</label>
            <input type="text" name="username">
        </div>

        <div>
            <label class="label_deg"> Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <input class="btn btn-primary" type="submit" name="submit" value="Login">
        </div>


    </form>
    </div>


</body>


</html>


