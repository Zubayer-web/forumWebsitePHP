<?php
session_start();
echo '
<div class="nav-area navbar-dark bg-color">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">IDiscuss</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Top Categories
                                </a>  
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>';
                                $sql = "SELECT * FROM categories LIMIT 6";
                               $result = mysqli_query($conn, $sql);
                               while($row = mysqli_fetch_assoc($result)){
                                   $cat_name = $row["category_name"];
                                    echo '<a class="dropdown-item" href="#">'.$cat_name.'</a>';
                               }                                
                                echo '
                                </li>
                                </ul>
                                </li>                                
                                <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                                </li>
                            </ul>
                            <form class="d-flex" method="GET" action="search.php">
                                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>';

                            if(isset($_SESSION['useremail'])){                              
                                echo '<p class="text-light my-0 p-2">'. $_SESSION['frist_name'] .'</p>
                                <a href="req/logout.php" type="button" class="btn btn-outline-success ms-1 text-white">Logout</a>';
                            }
                            else{
                                echo'
                                <div class="bottom">
                                    <button type="button" class="btn btn-outline-success ms-1 text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>                                   
                                    <button type="button" class="btn btn-outline-success text-white" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>                            
                                </div>';
                            }
                        echo '    
                        </div>      
            </div>
        </nav>
    </div>
</div>
';
    require "req/_login.php";
    require "req/_signup.php";
  
  if(isset($_GET['result'])){
      if($_GET["result"] == "addfileds"){
          echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                <strong>Login Is Not Successful!</strong> You should check in on some of those is not fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      } elseif($_GET["result"] == "notmatch"){
            echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                <strong>Login Is Not Successful!</strong> You Passwords do NOT match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      }
       elseif($_GET["result"] == "exist"){
            echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                <strong>Login Is Not Successful!</strong> Already have an email.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
      elseif($_GET["result"] == "welcome"){
        echo '<div class="alert alert-Success alert-dismissible fade show my-0" role="alert">
            <strong>Welcome </strong>You are here to log into Login Successful
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        elseif($_GET["result"] == "notsecfull"){
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
            <strong>Login Is Not Successful!</strong> You username and password not match.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      
  }





?>