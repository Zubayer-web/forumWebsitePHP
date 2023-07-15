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
    <div class="container1 min-height">
        <h2 class='py-4'>serach result for in <em>"<?php echo $_GET['search'] ?> </em>"</h2>
        <?php 
        $noresult = true;
        $s_result = $_GET['search']; 
         $sql = "SELECT * FROM `therads` WHERE MATCH(Therad_title, Therad_desc) against('$s_result')";
         $t_result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($t_result)){
             $noresult = false;
             $title = $row["Therad_title"];
             $desc = $row["Therad_desc"];
             $tr_id = $row["therad_id"];
            $url = "comments.php?therad_id=".$tr_id;
            echo '
            <div class="row">
                <div class="col-md-9">
                <h4><a class="text-dark" href="'.$url.'">'.$title.'</a></h4>
                    <p>'.$desc.'</p>
                </div>
                <div class="col-md-3">
                    <span<h4>'.$_SESSION['frist_name'].'</h4><img src="./img/profile/'.$_SESSION['profile'].'" class="float-end c-width" alt="image"></span>
                        <p>'.$_SESSION['date'].'</p>
                </div>
            </div>';
         }
         if($noresult){
            echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <strong>NATHING!</strong> No result found.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
    </div>

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