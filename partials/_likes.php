<?php
$insert=false;
$ins=false;
include '_dbconnect.php';
$rid = $_GET['rid'];

$check="SELECT * FROM `likes` where `rid`=$rid";
$res=mysqli_query($conn,$check);
$numRows=mysqli_num_rows($res);
if($numRows==0)
{

$sql="INSERT INTO `likes`( `rid`) VALUES ('$rid')";
if($conn->query($sql)==true){
    //echo "Successfully inserted";
 
     //Flag for successful insertion
     $insert= true;
   }
   else{
     echo "ERROR: $sql <br> $conn->error";  
   }
}
 $result = mysqli_query($conn, "SELECT * FROM likes WHERE `rid`=$rid");
 $row = mysqli_fetch_assoc($result);
 $n = $row['count'];
 $q= mysqli_query($conn, "UPDATE likes SET `count`=$n+1 WHERE `rid`=$rid");

    echo "<script>
    alert('Recipe Liked Successfully!');
    window.location.href='/miniproject/index.php';
    </script>"  ;
   
 exit();

?>