<?php
include 'partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <title>Recipe Finder</title>
    <link href="https://fonts.googleapis.com/css?family=Coiny|Monofett|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="./search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
        .container{
            margin-left:80px;
        }
        </style>

</head>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/miniproject/index.php" > Home</a>
  </li>
</ul>

<body>


    <!-- partial:index.partial.html -->
    <h1>Recipe Finder</h1>
    <form class="form" method="POST">
        Enter a search term: <input id="name" name="name">

        <button class="go">Search</button>
    </form>
    

    <!-- partial -->
    
    <div class="container">
    
      
<?php

 $method=$_SERVER['REQUEST_METHOD'];
 if($method=='POST'){
      $search_value=$_POST["name"];

        $sql="SELECT * from `recipes` WHERE rname like '%$search_value%'";
        $res=mysqli_query($conn,$sql);

        $noResult=true;
        echo '<div class="row">';

        while($row=mysqli_fetch_assoc($res)){
            $noResult=false;
          $rid=$row['rid'];
          $rname=$row['rname'];
            echo'
            <div class="col-md-4">
            <div class="card"  style="width:15rem;text-align:center">
            <img height="200"  src="https://source.unsplash.com/500x400/?'.$rname.','.$rname.'" class="card-img-top" alt="...">
            <div class="card-body ">
            <h5 class="card-title"><a class="text-dark" href="recipe.php?rid='.$rid.'">'.$rname. '</a></h5>
           </div>
           </div>
           </div>
          ';
}       

          
          if($noResult){
            echo '<div class="jumbotron jumbotoron-fluid">
            
          <div class="container">
          <h3 class="display-4" style="text-align:center">Didn\'t find what you are looking for?</h3>
          
         <button type="button" class="btn btn-dark" style="margin-left:550px" > <a  href="/miniproject/add.php">Add A Recipe</a></button>
          </div>
          </div>';
        }
    }
        
?>
        </div>
    </div>
    </body>

</html>