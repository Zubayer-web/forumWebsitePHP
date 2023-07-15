<?php
   include '_dbconnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $frist_name = $_POST['frist_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['phone_num'];
    $user_pass = md5($_POST['user_pass']);
        $user_conn = md5($_POST['con_pass']);
    $user_add = $_POST['assress'];
    $user_city = $_POST['city'];
    $user_sel = $_POST['select'];
    $user_zip = $_POST['zip'];
    $user_pic = $_FILES['formFileSm']['name'];
        $user_tmp = $_FILES['formFileSm']['tmp_name'];
    move_uploaded_file($user_tmp,'../img/profile/'.$user_pic);   

    $sql ="SELECT * FROM users WHERE User_email = '$user_email'";
            $result = mysqli_query($conn, $sql);
            $email_check = mysqli_num_rows($result);
 

    if($frist_name && $user_email && $user_pass && $user_pic){
       
        if($user_pass == $user_conn){
            
            if($email_check >= 1){               
                header("location: ../index.php?result=exist");
            }else{                
                $sql = "INSERT INTO users(User_frist,User_last,User_email,User_phone,User_pass,User_address,User_city,User_sel,User_zip,User_pic)VALUES('$frist_name','$last_name','$user_email','$user_phone','$user_pass','$user_add','$user_city','$user_sel','$user_zip','$user_pic')"; 
                $insert = mysqli_query($conn, $sql);  
                if($insert){
                    header("location: ../index.php?result=welcome");   
                }else{
                    header("location: ../index.php?result=notsecfull");
                    // echo 'what is the problem ->'. mysqli_error($conn);
                } 
            }
        }else{           
            header("location: ../index.php?result=notmatch");
        }
    }else{        
        header("location: ../index.php?result=addfileds");
    }
}
?>