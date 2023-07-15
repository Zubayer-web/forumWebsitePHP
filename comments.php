<?php
include 'req/_dbconnect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header area started -->
    <?php require "req/_header.php"; ?>
    <!-- Header area ended -->

    <!--  query php area started -->
    <?php
        $id = $_GET["therad_id"];
        $sql = "SELECT * FROM `therads` WHERE therad_id='$id'";
        $result = mysqli_query($conn, $sql);
        $noresult = false;
        while($row = mysqli_fetch_assoc($result)){
            $noresult = true;
            $ids     = $row['therad_id'];
            $title  = $row['Therad_title'];
            $desc   = $row['Therad_desc'];
        }

                 
        
        ?>
    <!--  query php area ended -->

    <!-- jambutron area started -->
    <div class="jambutron-area">
        <div class="container">
            <div class="jambuton py-5 px-5">
                <h1 class="display-4"><?php echo $title; ?></h1>
                <p class="lead"><?php echo $desc; ?></p>
                <hr class="my-4">
                <p>
                    POSTING BY: <?php echo $_SESSION['frist_name'] .' '.$_SESSION['last_name']; ?>
                </p>
                <div class=" btn btn-primary">Leran More</div>
            </div>
        </div>
    </div>
    <!-- jambutron area ended -->
    <?php
     $not_comment = false;
     if($_SERVER['REQUEST_METHOD'] == 'POST'){       
         $comment = $_POST["commnt_text"];
         //replass for hacking        
        $comment = str_replace("<", "&lt", $comment);
        $comment = str_replace(">", "&gt", $comment);
         $comment_id = $_POST["user_id"];
        if($comment){
         $sql = "INSERT INTO `comments`(`comment_desc`, `therads_id`, `comment_user_id`) VALUES('$comment','$id','$comment_id')";
         $result = mysqli_query($conn, $sql);
        }else{
            $not_comment = true;
        }
     } 
  
    
    ?>

    <div class="container1">
        <h1 class="py-2">Post a comment</h1>
        <?php
         if(isset($_SESSION['useremail'])){ 
             echo '
            <form action=" '.$_SERVER["REQUEST_URI"] .'" METHOD="POST">
            <div class="mb-3">
                <label for="commnt_text" class="form-label">Type your Comments</label>
                <textarea class="form-control" name="commnt_text" id="commnt_text" rows="3"></textarea>
                <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>         
        </form>';
          } else{
            echo '
            <div class="alert alert-success" role="alert">
             Plase do this login and signup than you do this start a discussion.
            </div>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';  
          }

          
        ?>
        <p><?php if($not_comment){
                    echo '
                    <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">SORRY!</h4>
                    <p>Your Comment is not submit successfully.</p>                              
                    </div>';
            }                   
            ?></p>
        </form>
    </div>




    <!-- media object area started -->
    <div class="madia-object-area my-4">
        <div class="container1" id="spacing">
            <h2>DISCUSSION</h2>
            <?php        
                $id     = $_GET['therad_id'];
                $sql    = "SELECT * FROM `comments` WHERE therads_id='$id' ORDER BY comment_id DESC";
                $result = mysqli_query($conn, $sql);
                $dekhau = true; 
                while($row = mysqli_fetch_assoc($result)){
                    $dekhau = false;
                    $ids = $row['comment_id'];
                    $comment_desc = $row['comment_desc'];
                    $datatime = $row['comment_date_time'];
                    $comment_user_id = $row['comment_user_id'];
                    $sql2 = "SELECT * FROM `users` WHERE user_id='$comment_user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $comment_user_name = $row2["User_frist"] .' '.$row2["User_last"];
                    $comment_user_pic = $row2["User_pic"];

                    echo '
                    <div class="row my-3">
                    <div class="col-md-1">
                     <img src="./img/profile/'. $comment_user_pic .'" class="mr-3" alt="">
                    </div>
                       <div class="col-md-10">
                       <h5 class="d-inline">'. $comment_user_name .'</h5><span class="badge bg-secondary float-end"> '. $datatime.' </span>
                        <div class="media-body">                        
                            '.$comment_desc.'
                        </div>
                    </div>
                </div>
                    ';                                               
                
                }
                if($dekhau){
                    echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <strong>NATHING!</strong> No body answer your Questions.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }  
           ?>
        </div>
    </div>
    <!-- media object area ended -->

    <!-- footer area started -->
    <?php require "req/_footer.php"; ?>
    <!-- footer area ended -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>