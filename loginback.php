<?php
    session_start();
    $tutor = "";
    $student="";
    $studpassword="";
    $tutpassword="";
    $errors = array();

    $db = mysqli_connect('localhost','root','','schoolmanagement');
    //log user in from login page
    if(isset($_POST['studlog'])){
        $student = mysqli_real_escape_string($db, $_POST['student']);
        $studpassword = mysqli_real_escape_string($db, $_POST['studpassword']);




        $studpassword=md5($studpassword);
        $query = "SELECT * FROM std_login WHERE studname='$student' AND password='$studpassword'";
        $result=mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1){
            //log user in
            $_SESSION['student']=$student;
            $_SESSION['semester']=$row["semester"];
            header('location: studdashboard.php'); //redirect to appointment page            
        }else{
            array_push($errors, "Wrong username/password combination");
            header('location: index.php');
        }        
    }
    if(isset($_POST['tutlog'])){
        $tutor = mysqli_real_escape_string($db, $_POST['tutor']);
        $tutpassword = mysqli_real_escape_string($db, $_POST['tutpassword']);




        $tutpassword=md5($tutpassword);
        $query = "SELECT * FROM tut_login WHERE tutname='$tutor' AND password='$tutpassword'";
        $result=mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1){
            //log user in
            $_SESSION['tutor']=$tutor;
            $_SESSION['semester']=$row["semester"];
            header('location: tutdashboard.php'); //redirect to appointment page            
        }else{
            array_push($errors, "Wrong username/password combination");
            header('location: index.php');
        }        
    }
    

    //logout
    if(isset($_GET['studlogout'])){
        session_destroy();
        unset($_SESSION['student']);
        header('location: index.php');
    }
    if(isset($_GET['tutlogout'])){
        session_destroy();
        unset($_SESSION['tutor']);
        header('location: index.php');
    }
?>
