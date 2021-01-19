<?php
$delete=false;
include 'partials/_dbconnect.php';
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST'){
//insert  recipe into database


$rid=$_GET['rid'];


$sql="DELETE FROM `recipes` WHERE rid=$rid";
//echo $sql;
if($conn->query($sql)==true){
// echo "Successfully inserted";

//Flag for successful insertion
$delete= true;
}
else{
echo "ERROR: $sql <br> $conn->error";  

}
}
?>
<?php
if($delete == true)
{
echo "<script>
alert('Recipe Deleted Successfully!');
window.location.href='/miniproject/admin.php';
</script>"  ;
}
?>




