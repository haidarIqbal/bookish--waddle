<?php 
session_start();
if(empty($_SESSION["adminSite"])){
	header("LOCATION:index.php"); 
}
include("../database/connection.php");
$getUsers = mysqli_query($link,"SELECT * FROM users");

include("./header/header.php");

	?>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <h4>Students List</h4>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user = mysqli_fetch_assoc($getUsers)){
                        echo '
                            <tr>
                            <td>'.$user['fname'].' '.$user['lname'].'</td>  
                            <td>'.$user['email'].'</td>  
                            <td>'.$user['phone'].'</td>  
                            <td>'.$user['country'].'</td>  
                            <td>'.$user['payment'].'</td>  
                            </tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
