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

    <?php include 'partials/_dbconnect.php'?>
 


    <!-- Category-->
    <div class="container my-3">
    <h2 class="text-center my-3 " style="font-family:courier">All Recipes</h2>
    <div class="row">
    <!--Fetch all Categories-->
    <?php
    $sql= "SELECT * FROM `recipes`";
    $result=mysqli_query($conn,$sql);
   
    //Fetch categories
    while($row =mysqli_fetch_assoc($result)){
      //echo $row['cid'];
      //echo $row['cname'];
      $rname=$row['rname'];
      $rid=$row['rid'];
     
      echo '<div class="col-md-3">
      <div class="card " style="width: 15rem;">
     
        <div class="card-body ">
          <h5 class="card-title"><a class="text-dark" href="/miniproject/recipeslist.php?catid='.$rid.'">'.$rname.'</a></h5>';
          $sql1= "SELECT * FROM `likes` where rid=$rid";
          $res=mysqli_query($conn,$sql1);
          $norows=$numRows=mysqli_num_rows($res);
          if($norows==1){ 
          while($row1 =mysqli_fetch_assoc($res)){
             $likes=$row1['likes'];
          }}
          else{
              $likes=0;
          }


  
               echo' <p>Likes:'.$likes.' </p>
                <form action=" delete.php?rid='.$rid.'" method="post"> <button style=" border-radius: 3px" >Delete</button></form>
             
         </div>
         </div>
     </div>';
     }
    ?>
    </div>
    </div>
  
  


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