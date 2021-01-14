<?php
include 'partials/_dbconnect.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Comment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Khana Khazana || Vanilla JS Practise</title>
    <link rel="stylesheet" href="./add.css">

</head>

<body>
    <!-- partial:index.partial.html -->


    <body>
        <?php
        $insert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
//insert  recipe into database


$rid=$_GET['rid'];
$name= $_POST['name'] ;
$comment= $_POST['Comment'];



$sql="INSERT INTO `comments`(  `rid`,  `name`, `comment`) VALUES ('$rid','$name','$comment')";
//echo $sql;
if($conn->query($sql)==true){
   // echo "Successfully inserted";

    //Flag for successful insertion
    $insert= true;
  }
  else{
    echo "ERROR: $sql <br> $conn->error";  

  }
}
?>
        <?php
if($insert == true)
    {
      echo "<script>
      alert('Comment Added Successfully!');
      window.location.href='/miniproject/index.php';
      </script>"  ;
    }
    ?>
        <div id="cont">
            <header>
                <h1>Khana<br>Khazana</h1>
            </header>

            <div id="grid-container">

                <!--Recipes List-->
                <div id="list" >
                    <button class="btn1" 
                        onclick="document.querySelector('#create-recipe').style.display ='initial'">Comment</button>
                    <br>
                    <br>
                    </br>
                    </br>
                    <button class="btn" onclick=location.href="/miniproject/index.php" .style.display='initial'">Home</button>
                </div>

  

                <!--Create a Recipe Box-->
                <form action=" <?php echo $_SERVER['REQUEST_URI']?>" method="post">
                        <div id="create-recipe">
                            <div class="create-edit-box">
                                <h1>Add A Comment</h1>
                                
                                <label for="recipe-ingredients">Comment</label>
                                <textarea id="Comment" name="Comment"
                                    placeholder='We Appreciate Your Feedback.' rows="10" cols="30"></textarea>
                                    <label for="recipe-name">Name</label>
                                <input type="text" id="name" name="name" required>

                                </label>
                             
                                <button class="btn">Save</button>
                                <button class="btn" onclick="(function() {document.querySelector('#create-recipe').style.display = 'none';
                        return false;})()">Close</button>
                            </div>
                        </div>
                        </form>

                        <script src="add.js"></script>
    </body>
    <!-- partial -->
    <script src="./add.js"></script>

</body>

</html>