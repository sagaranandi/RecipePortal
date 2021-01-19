<!doctype html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        <link rel="stylesheet" href="./add.css">
    <title>Khana Khazana</title>
</head>

<body>

<?php include 'partials/_dbconnect.php'?>
<div id="cont">
            <header>
                <h2>Khana<br>Khazana</h2>
                 <?php 
                $id = $_GET['rid'];
                $likes="SELECT `likes` from `likes` where rid='$id' ";
                $res=mysqli_query($conn,$likes);
                $num=mysqli_num_rows($res);
                if($num>0)
                { 
                echo'<h3>Likes:';  
                $n=mysqli_fetch_assoc($res);
                $l= $n['likes'];
                echo $l;
                }
                ?> 
            </header>
            <div>
    
    <?php
    $id = $_GET['rid'];
    $sql= "SELECT * FROM `recipes` WHERE rid=$id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $title=$row['rname'];
        $ingredients=$row['ingredients'];
        $steps=$row['steps'];
     }
    ?>

</div>
    <!-- Category-->
    <section>
                    <div class="showcase">
                        <h2 id="showcase-name"><?php echo $title?></h2>
         
                        <h3 id="header-ing">Ingredients: </h3>
                        
                        <div id="showcase-ingredients"><?php echo $ingredients?></div>
                        <h3 id="header-dir">Directions: </h3>
                        <div id="showcase-directions"> <?php echo $steps?></div>
                       
                        </div>
                        <?php  echo'
                        <div class="btn-group" >
                        <style>
                        .btn-group{
                          margin-left:550px;
                        }
                        </style>
                        <button class="btn" ><a class="text-dark" href="/miniproject/index.php" /a> Home </button>
                        <button class="btn"><a class="text-dark" href="/miniproject/_Comment.php?rid='.$id.  '"</a>  Comment</button>
                        <button class="btn"><a class="text-dark" href="/miniproject/partials/_likes.php?rid='.$id.'"</a>  Like</button>
                        </div>';?>

                   <?php include  'partials/_adminModal.php'?>
                    <div style="margin-left:330px">
                    
                     <?php
                      $sql= "SELECT * FROM `comments` WHERE rid=$id";
                      $result=mysqli_query($conn,$sql);
                      $numRows=mysqli_num_rows($result);
                      if($numRows>0)
                      {
                      echo'<h2 style="color:white; text-align:center" >COMMENTS</h2>';
                      }
                      while($row =mysqli_fetch_assoc($result)){
                      
                        //echo $row['cid'];
                        //echo $row['cname'];
                        $comment=$row['comment'];
                        $name=$row['name'];
                       echo '
                       <div class="card">
                       <div class="card-body">
                         '.$comment.'<br>
                         -'.$name.'
                       </div>
                     </div>';
                       }
                      ?>
                      </div>
                </section>

   
             

    
   

 
  

</body>

<script src="./add.js"></script>
</html>