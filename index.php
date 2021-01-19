<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
    <title>Khana Khazana</title>
</head>

<body>

    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>
    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide my-3" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x550/?food,cakes" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x550/?food,pizza" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x550/?streetfood,noodles" class="d-block w-100 " alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    </div>


    <!-- Category-->
    <div class="container my-3">
    <h2 class="text-center my-3 " style="font-family:courier">Categories</h2>
    <div class="row">
    <!--Fetch all Categories-->
    <?php
    $sql= "SELECT * FROM `categories`";
    $result=mysqli_query($conn,$sql);
    //Fetch categories
    while($row =mysqli_fetch_assoc($result)){
      //echo $row['cid'];
      //echo $row['cname'];
      $cat=$row['cname'];
      $id=$row['cid'];
     echo '<div class="col-md-3">
            <div class="card " style="width: 15rem;">
              <img src="https://source.unsplash.com/500x400/?streetfood, '.$cat.'" class="card-img-top" alt="...">
              <div class="card-body ">
                <h5 class="card-title"><a class="text-dark" href="/miniproject/recipeslist.php?catid='.$id.'">'.$cat.'</a></h5>
                 
             
         </div>
         </div>
     </div>';
     }
    ?>



<div class="container my-3">
    <h2 class="text-center my-3 " style="font-family:courier">Top Recipes</h2>
    <div class="row">
    <!--Fetch all Categories-->
    <?php
    $sql1= "SELECT `rid` FROM `likes` WHERE likes>15";
    $result1=mysqli_query($conn,$sql1);
   
    while($row =mysqli_fetch_assoc($result1)){
     $rid=$row['rid'];
     $sql2="SELECT `rname` FROM `recipes` WHERE rid=$rid";
     $q = mysqli_query($conn,$sql2);

     $n=mysqli_fetch_assoc($q);
     $rname= $n['rname'];
    
     echo '<div class="col-md-3">
            <div class="card " style="width: 15rem;">
              <img src="https://source.unsplash.com/500x400/?streetfood, '.$rname.'" class="card-img-top" alt="...">
              <div class="card-body ">
                <h5 class="card-title"><a class="text-dark" href="/miniproject/recipe.php?rid='.$rid.'">'.$rname.'</a></h5>
                 
             
         </div>
         </div>
     </div>';
     }
    ?>



    

    
    <?php include 'partials/_footer.php'?>
  
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>