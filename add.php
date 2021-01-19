<?php
include 'partials/_dbconnect.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add A Recipe</title>
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



$rname= $_POST['rname'] ;
$catname= $_POST['category'];





$catid= "SELECT `cid` FROM `categories` WHERE `cname`=\"$catname\"";
//$caid=mysqli_query($conn,$catid);
$q = mysqli_query($conn,$catid);

$n=mysqli_fetch_assoc($q);
$cid= $n['cid'];

$ingredients= $_POST['ingredients'];
$steps= $_POST['steps'];


$sql="INSERT INTO `recipes`(  `category`, `cid`, `rname`, `ingredients`, `steps`, `date`) VALUES ('$catname','$cid','$rname','$ingredients','$steps',current_timestamp())";

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
      alert('Recipe Added Successfully!');
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
                <div id="list">
                    <button class="btn"
                        onclick="document.querySelector('#create-recipe').style.display ='initial'">New</button>
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
                                <h1>Create a recipe</h1>
                                <small></small>

                                <label for="recipe-name">Recipe name</label>
                                <input type="text" id="rname" name="rname" required>

                                <label for="category">Category
                                    <?php
                            include 'partials/_dbconnect.php';
                            $cat="  SELECT `cname` FROM `categories`";
                            $rescat = mysqli_query($conn,$cat);
                            
                            ?>
                                    <select name="category">
                                        <?php
                            while($rows=$rescat->fetch_assoc())
                            {
                                $cname=$rows['cname'];
                                echo "<option value='$cname'>$cname</option>";
                            }
                            ?>
                                    </select>
                                </label>
                                <br></br>
                                <label for="recipe-ingredients">Ingredients</label>
                                <textarea id="ingredients" name="ingredients"
                                    placeholder='Pushing "Enter" creates a new bullet.' rows="10" cols="30"></textarea>

                                <label for="recipe-directions">Directions</label>
                                <textarea id="steps" name="steps" placeholder='Pushing "Enter" creates a new number.'
                                    rows="10" cols="30"></textarea>
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