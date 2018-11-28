<?php

include('loginback.php');

?>

<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach?>
        <br>
        <h3 style="color:whitesmoke; font-weight:bold;">NSSCE STUDENT-TUTOR PORTAL</h3>
            <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h1>STUDENT LOGIN</h1>
                    <form action="loginback.php" method="post" >
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="student" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="studpassword" class="form-control" >
                        </div>
                        <button type="submit" name="studlog" class="btn btn-primary" >login</button>
                    </form>
                </div>
                <div class="col-md-6  login-right">
                    <h1>TUTOR LOGIN </h1>
                    <form action="loginback.php" method="post" >
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="tutor" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="tutpassword" class="form-control" >
                        </div>
                        <button type="submit" name="tutlog" class="btn btn-primary" >login</button>
                    </form>
                </div>
            </div>
        </div>
        </div>    
    </body>
</html>