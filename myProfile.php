<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klick</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  
</body>
</html>


<?php 

include 'header.php';

include '_dbconnect.php';
?>
<div class="container mb-5" id="ques">
        <h1 class="py-2">Your Questions</h1>
        <?php         
$user_id = $_SESSION['sno'];
$sql = "SELECT * FROM threads WHERE thread_user_id=$user_id";
$result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $thread_id = $row['thread_id'];
        $thread_title = $row['thread_title'];
        $thread_description = $row['thread_desc'];
        $thread_cat_id = $row['thread_cat_id'];
        $timestamp = $row['timestamp'];

        $get_id = "SELECT category_name FROM categories WHERE category_id=$thread_cat_id";
        $r=mysqli_query($conn,$get_id);
        $cat = mysqli_fetch_assoc($r);
        $cat_name=$cat['category_name'];
          {
        echo '
        <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="media flex-wrap w-100 align-items-center"> <img src="" width="1%" class="d-block ui-w-40 rounded-circle" >
                            <div class="media-body ml-3"> <h3> '. $thread_title . '<h3>
                                <div class="text-muted small"><h6> At '. $timestamp. '   for the category:'.$cat_name.'<h6></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <p>  '.$thread_description.'</p>
                    </div>
                    
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        
                        <div class="px-4 pt-3"><a href="thread.php?threadid=' . $thread_id. '"> <button type="button" class="btn btn-info btn-lg"> View Question</button> </a></div>
                    </div>
                </div>
            </div>
        </div>
    ';
    }
}

?>
</div>