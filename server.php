<?php
    //include('appoint.php');
    //session_start();
    $username = "";
    $email = "";
    $department = "";
    $semester = "";
    $subject = "";
    $date = "";
    $admin="";
    $password="";
    $regno="";
    $data="";
    $alertq="";
    $timeslot="";
    $options="";
    $errors = array();
    // connect to the databse
    $db = mysqli_connect('localhost','root','','appointment');

    // if the register button is clicked
    if (isset($_POST['appoint'])){
        //$username = mysqli_real_escape_string($db, $_POST['username']);
        $department = mysqli_real_escape_string($db, $_POST['department']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $semester = mysqli_real_escape_string($db, $_POST['semester']);
        $subject = mysqli_real_escape_string($db, $_POST['subject']);
        $date = mysqli_real_escape_string($db, $_POST['date']);

    //ensure that form fields are filled properly
    /*if(empty($username)){
        array_push($errors, "username is required"); // add error to errors array
    }*/
    
    if(empty($department)){
        array_push($errors, "Department is required"); // add error to errors array
    }
    if(empty($email)){
        array_push($errors, "E-mail is required"); // add error to errors array
    }   
    
    if(empty($semester)){
        array_push($errors, "Semester is required"); // add error to errors array
    }    
    
    if(empty($subject)){
        array_push($errors, "Subject is required"); // add error to errors array
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Wrong email format"); 
    }
    
    $today=date("Y-m-d");
    if(empty($date)){
        array_push($errors, "Date is required");
        $date=$today; // add error to errors array
    }


    
    if($date<$today)
    {
        array_push($errors, "We don't Time Travel!");
    }

    $diff = abs(strtotime($date) - strtotime($today)); 

    $years   = floor($diff / (365*60*60*24)); 
    $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
    $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if($days>6)
    {
        array_push($errors, "Booking for this date is'nt available");
    }

    $rr="SELECT * FROM appointments WHERE date='$date' and timeslot='$timeslot'";
    //$rr1="SELECT * FROM appointments WHERE regno='$regno'";
    //$result1=mysqli_query($db,$rr1);
    $result=mysqli_query($db,$rr);
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    //$rowcount1=mysqli_num_rows($result1);

    if($rowcount>5)
    {
        array_push($errors, "Booking for this date is already full");
    }
    /*if($rowcount1>5)
    {
        array_push($errors, "You have already booked for this date!");
    }*/

    if(date('D', strtotime($date)) == 'Sat' || date('D', strtotime($date)) == 'Sun') { 
        array_push($errors, "Booking isnt available for this date");
    } 

    


    //if there are no errors, save user to database
    if(count($errors)==0){
        $sql = "INSERT INTO appointments (username, email, department, semester, subject, date, timeslot)
                VALUES ('$stud', '$email', '$department', '$semester', '$subject', '$date', 'timeslot')";
        $alertq=mysqli_query($db, $sql);

        
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAutoTLS = false;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->Username = 'aswin2dinesh@gmail.com';
        $mail->Password = 'toosoonsuperman';
        $mail->setFrom('admin@nssceappointment.ml', 'NSSCE OFFICE');
        $mail->addReplyTo('aswin2dinesh@gmail.com', 'AswinDinesh');
        $mail->addAddress($email);
        $mail->Subject = "NSSCE APPOINTMENT BOOKING SUCCESSFUL";
        $mail->Body = "     Appointment Confirmed for $username
                    Date :  $date
                    Time : $timeslot
                    Please keep required documents with you.
                    Thank You for booking with us!";
        if (!$mail->Send()) {
            $error = "Mailer Error: " . $mail->ErrorInfo;
            ?><script>alert('<?php echo $error ?>. Contact Admin.');</script><?php
        }else{
            echo "<script>alert(Contact Admin)</script>";
        }
            

        $_SESSION['username']=$username;
        $_SESSION['success']="You are now logged in";
        //header('location: index.php'); //redirect to home page
        
            /*//echo 'alert("Password Invalid!")';
            //header('location: index.php'); //redirect to home page
            echo '<script>';
            echo 'alert("BOOKING SUCCESSFULL!");';
            //echo 'location.href="index.php"';
            echo '</script>';*/
            if($alertq)
            {
                //echo 'alert("Password Invalid!")';
                //header('location: index.php'); //redirect to home page
                echo '<script>';
                echo 'alert("BOOKING SUCCESSFULL!");';
                echo 'window.location.href="appoint.php"';
                echo '</script>';
            }
    }

}

    //log user in from login page
/*    if(isset($_POST['login'])){
        $admin = mysqli_real_escape_string($db, $_POST['admin']);
        $password = mysqli_real_escape_string($db, $_POST['password']);


    //ensure that form fields are filled properly
    if(empty($admin)){
        array_push($errors, "username is required"); // add error to errors array
    }
    
    if(empty($password)){
        array_push($errors, "Password is required"); // add error to errors array
    } 
    if(count($errors)==0){
        $password=md5($password);
        $query = "SELECT * FROM adminuser WHERE admin='$admin' AND password='$password'";
        $result=mysqli_query($db, $query);
        if(mysqli_num_rows($result)==1){
            //log user in
            $_SESSION['admin']=$admin;
            $_SESSION['success']="You are now logged in";
            header('location: admin.php'); //redirect to home page            
        }else{
            array_push($errors, "Wrong username/password combination");
        }
    }        
    }



    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['regno']);
        header('location: index.php');
    }
*/

?>
