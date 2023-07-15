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
        
        $id = $_GET["catid"];

        $sql = "SELECT * FROM `categories` WHERE category_id='$id'";
        $result = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($result)){

            $cat_id = $row['category_id'];
            $cat_name = $row['category_name'];
            $cat_desc = $row['category_decs'];
        }         
        
        ?>
    <!--  query php area ended -->




    <!-- jambutron area started -->
    <div class="jambutron-area">
        <div class="container">
            <div class="jambuton py-5 px-5">
                <h1 class="display-4">Hello <?php echo $cat_name; ?> world</h1>
                <p class="lead"><?php echo $cat_desc; ?></p>
                <hr class="my-4">
                <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do
                    not
                    post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross
                    post
                    questions. Remain respectful of other members at all times.
                </p>

            </div>
        </div>
    </div>
    <!-- jambutron area ended -->

    <!-- comment area started -->

    <?php 
     $showalert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){        
        $tr_title   = $_POST["therad_title"];   
        $tr_desc    = $_POST["therad_desc"];  
        //replass for hacking        
        $tr_title = str_replace("<", "&lt", $tr_title);
        $tr_title = str_replace(">", "&gt", $tr_title);

        $tr_desc = str_replace(">", "&gt", $tr_desc);
        $tr_desc = str_replace(">", "&gt", $tr_desc);
        

        $tr_user_id    = $_POST["users"];                     
        if($tr_title && $tr_desc){
            $tradsql = "INSERT INTO `therads`(`Therad_title`,`Therad_desc`,`Therad_cat_id`,`Therad_user_id`) VALUES('$tr_title','$tr_desc','$id','$tr_user_id')"; 
            $result = mysqli_query($conn, $tradsql);             
        }else{
           $showalert = true;
        }         
    }    
   
    ?>
    <div class="form-area">
        <div class="container1">
            <p class="h2">Started Discussion</p>
            <?php 
        if(isset($_SESSION["useremail"])){
            echo '<form action=" '.$_SERVER["REQUEST_URI"] .'" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="therad_title" class="form-label">Problem Title:</label>
                <input type="text" class="form-control" name="therad_title" id="therad_title"
                    placeholder="Enter Your Impotent Comments Title.">
            </div>
            <div class="mb-3">
                <label for="therad_desc" class="form-label">Elaborate Description:</label>
                <textarea class="form-control" name="therad_desc" id="therad_desc" rows="3"
                    placeholder="Enter Your Impotent Comments Deteils."></textarea>
            </div>
            <input type="hidden" name="users" value="'. $_SESSION["user_id"] .'">          
            <button type="submit" class="btn btn-success">Submit</button>
            <div>';
               
                if($showalert){
                    echo '
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">SORRY!</h4>
                            <p>Your post is not submit successfully.</p>                              
                        </div>'; 
                }
           echo '     
            </div>
        </form>';
        }else{
            
            echo '
                <div class="alert alert-success" role="alert">
                 Plase do this login and signup than you do this start a discussion.
                </div>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';  
        }
        
        
        ?>





        </div>
    </div>
    <!-- comment area ended -->
    <!-- media object area started -->
    <div class="madia-object-area my-4">
        <div class="container1">
            <?php  
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `therads` WHERE Therad_cat_id= '$id' ORDER BY therad_id DESC";
            $result = mysqli_query($conn,$sql);
            $noresult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $id = $row['therad_id'];
                $title = $row['Therad_title'];
                $desc = $row['Therad_desc'];
                $therad_img = $row['Therad_imgs'];
                $therad_user_id = $row['Therad_user_id'];
                $usql= "SELECT * FROM `users` WHERE user_id='$therad_user_id'";
                $ureselt = mysqli_query($conn, $usql);                
                $urow = mysqli_fetch_assoc($ureselt);
                $therad_user_name = $urow["User_frist"] .' '.$urow["User_last"];                                
                $therad_user_pic = $urow["User_pic"];                       
                                         
                

                echo '
                <div class="row my-3">
                    <div class="col-md-1">
                        <!-- <img src="https://source.unsplash.com/1200x700/?profile" class="mr-3" alt="">-->
                        <img src="./img/profile/'. $therad_user_pic .'" class="mr-3" alt="">
                       
                    </div>
                    <div class="col-md-10">
                        <div class="media-body">
                            <h5 class="d-inline">'. $therad_user_name .'</h5><span class="badge bg-secondary float-end"> '. date("F j, Y, g:i a") .' </span>
                            <h5 class="mt-0"><a class="text-dark" href="comments.php?therad_id='.$id.'">'. $title .'</a></h5>
                            <p>'. $desc.'</p> 
                          <!--<div class="cus-img"><img src="./img/therad_imgs/'.$therad_img.'" alt=""></div>-->
                            
                        </div>
                    </div>
                </div>
            ';
            }
            if($noresult){
                echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong>WELLCOME!</strong> Be The First Person To Ask The Qustions.
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