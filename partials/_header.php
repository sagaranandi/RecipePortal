<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Khana Khazana</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/miniproject/index.php">Home |</a>
      </li>

    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/miniproject/search.php">Search</a>
  </li>
    </ul>';
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
      echo ' <p class="text-light my-0 mx-2"> Welcome '.$_SESSION['uName'].'</p>
      <a href="/miniproject/add.php" class="btn btn-outline-warning ml-2" >Add A recipe</a>
      <a href="partials/_logout.php" class="btn btn-outline-warning mx-2" >Logout</a>';
    } 
    else{
      echo'<button class="btn btn-outline-success my-0 mx-2 " data-toggle="modal" data-target="loginModal" <a class="nav-link"#" href="#"  data-toggle="modal" data-bs-toggle="modal" data-bs-target="#loginModal"></a>Log In</button>
      <button class="btn btn-outline-success my-0 mx-2" data-toggle="modal" data-target="#signUpModal" <a class="nav-link"#" href="#"  data-toggle="modal" data-bs-toggle="modal" data-bs-target="#signUpModal"></a>Sign Up</button>
      <button class="btn btn-outline-success my-0 mx-2" data-toggle="modal" data-target="#adminModal" <a class="nav-link"#" href="#"  data-toggle="modal" data-bs-toggle="modal" data-bs-target="#adminModal"></a>Admin</button>';
    } 
   

  




  echo '</div>

        </div>
        </nav>';
 
include 'partials/_loginModal.php';
include 'partials/_signUpModal.php';
include 'partials/_adminModal.php';
include 'partials/_handleSignUp.php';
  if(isset($_GET['signUpSuccess']) && $_GET['signUpSuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }


?>