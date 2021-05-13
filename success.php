<?php 
include("connection.php");
include("common/header.php");
$user = $_GET['Usersession'];
if($user !=''){
	$query = "SELECT * FROM users WHERE secureCode='$user' AND payment='false'";
	$result = mysqli_query($link,$query);
	$rows = mysqli_num_rows($result);
	
    if($rows==1){
    	$update = "UPDATE users SET payment='true' WHERE secureCode='$user'";
		$updateUser = mysqli_query($link,$update);
		?>
		
		<div class="container">

	<br>
	<div style="text-align: center">
		<h4>Your Account has been created!</h4>
		<br>
		<h3>Thank you for choosing YOUR SITE</h3>
		<i class="fa fa-arrow-right"></i> <a href="#"> Login to your Account </a>
	</div>
</div>
		
		<?php
	}else{


?>

<div class="container">

	<br>
	<div style="text-align: center">
		<h4>There was a problem! Contact system admin</h4>
	
	</div>
</div>


<?php 	}
}
?>
