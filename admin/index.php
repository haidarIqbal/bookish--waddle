<?php 
ob_start();
session_start();
include_once("../database/connection.php");
	$error="";
if(isset($_POST["adminlogin"]))
{
	  $myusername = mysqli_real_escape_string($link,$_POST['adminemail']);
      $mypassword = mysqli_real_escape_string($link,$_POST['adminpass']); 
      
      $sql = "SELECT * FROM `admin` WHERE email = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
     	$_SESSION['adminSite'] = $myusername;
         header("location:home.php");
      }else {
         $error ="<div class='alert alert-danger'>Your Login Name or Password is invalid</div>";
      }
}
include_once("../common/header.php")
?>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
        <br>
        <div class="row justify-content-center">
            <h4>Admin Login</h4>
        </div>
		<div class="container">
			<div class="d-flex justify-content-center">
				<div class="col-sm-6 loginbox">
					<form class="form-group" method="post" >
                        <br>
                        <input class="form-control inputArea" type="email" placeholder="Administrator Email" name="adminemail" required="">
                        <br>
                        <input class="form-control inputArea" type="password" placeholder="Administrator Password" name="adminpass" required="">
                        <br>
                        <button type="submit" name="adminlogin" class="btn btn-lg btnsend">Login</button>
					</form>
                    <?php echo $error; ?>
				</div>
			</div>
		</div>



