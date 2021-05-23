<?php
session_start();
include '_dbconnect.php';


echo '<nav class="navbar navbar-expand-lg ">
<a class="navlogo" href="/forum">Klick</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="navlink" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
   
    <li class="nav-item dropdown">
      <a class="navlink dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        All Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      $sql = "SELECT category_name, category_id FROM `categories`";
      $result = mysqli_query($conn, $sql); 
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid='. $row['category_id']. '">' . $row['category_name']. '</a>'; 
      }
        
      echo '</div>
    
    </li>
    <li class="nav-item">
      <a class="navlink" href="contact.php" >Contact</a>
    </li>
  </ul>
  <div class="row mx-2">';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '
      <p class="text-light my-0 mx-2" style="padding-top:5px">Hello '. $_SESSION['useremail']. '!</p>
      
      
      <a href="myProfile.php" class="btn btn-outline-light ml-2">My Profile</a>
      <a href="_logout.php" class="btn btn-outline-light ml-2">Logout</a>
      
      
      ';
}
else{ 
  echo '
    <button class="btn btn-outline-light ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-light mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
  }


  echo '</div>
      </div>
      </nav>'; 

include 'loginModal.php';
include 'signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
?>