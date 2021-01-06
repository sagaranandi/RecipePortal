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

<div id="cont">
            <header>
                <h1>Khana<br>Khazana</h1> 
            </header>
            <div>
    <?php include 'partials/_dbconnect.php'?>
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


    <!-- Category-->
    <section>
                    <div class="showcase">
                        <h2 id="showcase-name"><?php echo $title?></h2>
                       
                        <h3 id="header-ing">Ingredients: </h3>
                        
                        <div id="showcase-ingredients"><?php echo $ingredients?></div>
                        <h3 id="header-dir">Directions: </h3>
                        <div id="showcase-directions"> <?php echo $steps?></div>
                       
                       
                    </div> 
                </section>
   <!-- <div class="container my-4">
        <div class="jumbotron ">
            <div class="container">
                <h1 class="display-4"><?php echo $title?></h1>
                <h2>Ingredients:</h1><p><?php echo $ingredients?></p>
                <h2>Steps:</h2><p><?php echo $steps?></p>-->
                

            </div>
        </div>
    </div>

    <div class="container"  id=ques>
        



    
    <!-- design items to be added here -->



   <?php include 'partials/_footer.php'?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
      <style> 
       #ques{
           min-height:433px;
       }
     </style>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>