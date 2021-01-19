<?php
$showError="false";

if($_SERVER['REQUEST_METHOD']=="POST"){
 include '_dbconnect.php';
 $username=$_POST['loginName'];
 $pass=$_POST['loginpass'];

 
 
 if($username=="admin"){

 
       if($pass=="adminlog"){
           $_SESSION['loggedin']=true;
           $_SESSION['uName']=$username;
          // echo "Logged in ".$username;
           header("Location:/miniproject/admin.php");
           exit();

         }
         else{
            echo "<script>
            alert(' Incorrect credentials');
            window.location.href='/miniproject/index.php';
            </script>";
           }
     
        }
         else{
          echo "<script>
          alert(' Incorrect credentials');
          window.location.href='/miniproject/index.php';
          </script>";
         }
        
        }

?>