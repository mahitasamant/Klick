<!DOCTYPE html>
<html lang="en">
<head>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
    </style>
    <title>Welcome to Klick</title>
    
    <link rel="stylesheet" href="contact.css">
</head>

</head>

<body>
    <?php include '_dbconnect.php';?>
    <?php include 'header.php';?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
       
        $content = $_POST['content']; 
        $content = str_replace("<", "&lt;", $content);
        $content = str_replace(">", "&gt;", $content); 
        
        $sno = $_POST['sno']; 
        
        $sql = "INSERT INTO `contact` ( `contact_content`, `contact_by`, `contact_time`) VALUES ('$content','$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your submission was succesful
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>
  
     <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="form">
    <h1>HAVE QUESTIONS?</h1>
    
        <form action= "'. $_SERVER['REQUEST_URI'] . '" method="post" style="max-width:450px; margin:50px auto;"> 
            <div class="form-group">
            
            
                <textarea class="f-input" id="content" name="content" rows="3" placeholder="Type your feedback"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>
            <button type="submit" class="btn btn-info">Post feedback</button>
        </form> 
    </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Post Feedback</h1> 
           <p class="lead">You are not logged in.</p>
           <p> Please login to be able to post feedback.</p>
        </div>';
    }

    ?>

<footer class="footer" style="background:#353535;	color:#d9d9d9;	text-align:center; position: fixed; width:100%;
 
  bottom: 0;"><p style="margin:0;	padding:10px"><a target="blank" href="#" style="color:#d9d9d9; ">Klick 2021<a>- © All rights reserved </p></footer>
	 
  </main>
</body>  

  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>
</html>