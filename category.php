<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Klick</title>
</head>

<body>
    <?php include '_dbconnect.php';?>
    <?php include 'header.php';?>
    

    

    
    <div class="container my-4" id="ques">
        <h1 class="text-center my-4">Browse Categories</h1>
        <div class="row my-4">
          
         <?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          
          $id = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_description'];
          echo '<div class="col-md-12">
          <div class="row p-3 bg-white border rounded px-2 row-margin-05 mt-2">
              <div class="col-md-9 mt-1">
                  <h2>'  . $cat . '</h2>
                  <div class="d-flex flex-row">   
                  </div>
                  
                  <p class="text-justify para mb-0"> ' . substr($desc, 0, 1000). '<br><br></p>
              </div>
              <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                 
                  <div class="d-flex flex-column mt-9"><a href="threadlist.php?catid=' . $id . '" style="text-decoration:none"><button class="btn btn-info btn-block" type="button">View</button></a></div>
              </div>
          </div>
         
              </div>';
         } 
         ?>
            
 
        </div>
    </div>

    <footer class="footer" style="background:#353535;	color:#d9d9d9;	text-align:center;"><p style="margin:0;	padding:10px"><a target="blank" href="#" style="color:#d9d9d9; ">Klick 2021<a>- © All rights reserved </p></footer>
   
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