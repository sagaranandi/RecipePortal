<?PHP
$showError="false";

if($_SERVER['REQUEST_METHOD']=="POST"){
  include '_dbconnect.php';
  $username=$_POST['signUpEmail'];
  $pass=$_POST['signUppassword'];
  $cpass=$_POST['signUpcpassword'];

  //Check whether username already exists
  $existSql= "SELECT * FROM `users` WHERE username='$username'";
  $result=mysqli_query($conn,$existSql);
  $numRows=mysqli_num_rows($result);
  if($numRows>0){
    echo "<script>
    alert('User already exists. Login to continue');
    window.location.href='/miniproject/index.php';
    </script>";
  }
  else{
      if($pass==$cpass){
       $hash=password_hash($pass,PASSWORD_DEFAULT);
       $sql="INSERT INTO `users`( `username`, `password`, `Date`) VALUES ('$username','$hash',current_timestamp())";
       $result=mysqli_query($conn,$sql);
       if($result){
           $showAlert= true;
           header("Location: /miniproject/index.php?signUpSuccess=true");
           exit();
       }

      }
      else{
        echo "<script>
        alert('Passwords do not match');
        window.location.href='/miniproject/index.php';
        </script>";
      }
      }
      echo "<script>
      alert('Error in signing you up. try again');
      window.location.href='/miniproject/index.php';
      </script>";
    }
  

?>