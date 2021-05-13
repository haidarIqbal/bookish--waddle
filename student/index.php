<?php 
ob_start();
session_start();
include_once("../database/connection.php");
	$error="";$sessId="";
if(isset($_POST["adminlogin"]))
{
	  $myusername = mysqli_real_escape_string($link,$_POST['adminemail']);
      $mypassword = mysqli_real_escape_string($link,$_POST['adminpass']); 
      
      $sql = "SELECT * FROM `users` WHERE email = '$myusername' AND pass = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_assoc($result);      
      $count = mysqli_num_rows($result);
      $price = 2200*100;
      if($count == 1) {
          if($row['payment'] ==="false"){
            require_once('../stripe-php/init.php');
			\Stripe\Stripe::setApiKey('STRIPE_SECRET');
			$session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
          'name' => 'YOUR SITE',
          'description' => 'Signup For YOUR SITE',
          'amount' => $price,
          'currency' => 'usd',
          'quantity' => 1
        ]],
        'success_url' => 'https://YOUR SITE/success.php?Usersession='.$row['secureCode'],
        'cancel_url' => 'https://YOUR SITE/cancel.php',
		'customer_email'=>$row['email']
      ]);

	    $stripeSession = array($session);
		$sessId = ($stripeSession[0]['id']);
          }else{
              $_SESSION['studentSite'] = $myusername;
              header("location:home.php");
            }
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
            <h4>Alumni Login</h4>
        </div>
		<div class="container">
			<div class="d-flex justify-content-center">
				<div class="col-sm-6 loginbox">
					<form class="form-group" method="post" >
                        <br>
                        <input class="form-control inputArea" type="email" placeholder="Your Email" name="adminemail" required="">
                        <br>
                        <input class="form-control inputArea" type="password" placeholder="Your Password" name="adminpass" required="">
                        <br>
                        <button type="submit" name="adminlogin" class="btn btn-lg btnsend">Login</button>
					</form>
                    <?php echo $error; ?>
				</div>
			</div>
		</div>

        <?php include_once("../common/footer.php");?>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var ssId = "<?php echo $sessId ?>";
        const stripe = Stripe(
            'STRIPE_PUBLIC_KEY'
        );
        const checkout_Id = (ssId);
        stripe.redirectToCheckout({
            sessionId: checkout_Id,
        });
    });
    </script>
