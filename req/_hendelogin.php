<?php
session_start();
include '_dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $loginemail = $_POST['loginemail'];
    $loginpass = md5($_POST['loginPassword']);
    
    $sql = "SELECT * FROM users WHERE User_email='$loginemail' AND User_pass='$loginpass'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);  
    if($numrows == 1){         
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['frist_name'] = $row['User_frist'];
            $_SESSION['last_name'] = $row['User_last'];
            $_SESSION['useremail'] = $row["User_email"];
            $_SESSION['profile'] = $row['User_pic']; 
            $_SESSION['date'] = $row['User_data']; 
            $_SESSION['time'] = $row['User_time']; 
            header('location: ../index.php?loggedin=logwelcome');            
        }else{
            header("location: ../index.php?loggedin=lognotwelcome");           
        }


}




?>