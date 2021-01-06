<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="./add.css">
    <title>Khana Khazana</title>
</head>

<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/miniproject/index.php" > Home</a>
  </li>
</ul>
   

   
    <?php include 'partials/_dbconnect.php'?>
    <?php
    $insert=false;
    $id = $_GET['catid'];
    $sql= "SELECT * FROM `categories` WHERE cid=$id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
         $catname=$row['cname'];
     }
    ?>



    <!-- Category-->
    <section>
        <div class="showcase1">
            <h1 id="showcase-name"><?php echo"<p style= 'color:white;margin-left: 100px; text-align:center'>". $catname."</p>"?></h1>
        </div>
    </section>

    <div class="container my-3">
   <div class="row">
    <?php
    $id = $_GET['catid'];
    $sql= "SELECT * FROM `recipes` WHERE cid=$id";
    $result = mysqli_query($conn,$sql);
    $noResult=true;

    while($row = mysqli_fetch_assoc($result)){
         $noResult=false;

         $catname=$row['category'];
         $title=$row['rname'];
         $rid=$row['rid'];
     
         echo '
            <div class="col-md-4">
            <div class="card"  style="width:15rem;">
            <img src="https://source.unsplash.com/500x400/?'.$title.','.$title.'" class="card-img-top" alt="...">
            <div class="card-body ">
            <h5 class="card-title"><a class="text-dark" href="recipe.php?rid='.$rid.'">'.$title. '</a></h5>
           </div>
           </div>
          </div> ';
  
    }
    
   // echo var_dump($noResult);
   if($noResult){
       echo '<div class="jumbotron jumbotoron-fluid">
       
     <div class="container">
     <h1 class="display-4">Didn\'t find what you are looking for?</h1>
     
    <button type="button" class="btn btn-dark"> <a href="/miniproject/add.php">Add A Recipe</a></button>
     </div>
     </div>';
   }
   ?>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <style>
    #ques {
        min-height: 433px;
    }
    </style>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>