<?php
$showError="false";

if($_SERVER['REQUEST_METHOD']=="POST"){
 include '_dbconnect.php';
 $username=$_POST['loginName'];
 $pass=$_POST['loginpass'];

 $sql="SELECT * FROM `users` where username='$username'";
 $result=mysqli_query($conn,$sql);
 $numRows=mysqli_num_rows($result);
 
 if($numRows==1){
         $row=mysqli_fetch_assoc($result);
         if(password_verify($pass,$row['password'])){
           session_start();
           $_SESSION['loggedin']=true;
           $_SESSION['uName']=$username;
          // echo "Logged in ".$username;
           header("Location:/miniproject/index.php");
           exit();

         }
         else{
          echo "<script>
          alert('Unable to login. Incorrect credentials');
          window.location.href='/miniproject/index.php';
          </script>";
         }
        
}
if($numRows==0){
  echo "<script>
  alert('User does not exist. Please sign up to continue');
  window.location.href='/miniproject/index.php';
  </script>";
}
}
?>