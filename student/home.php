<?php 
session_start();
if(empty($_SESSION["studentSite"])){
	header("LOCATION:index.php"); 
}
include("../database/connection.php");
include("./header/header.php");
	?>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <h4>Course List</h4>
    </div>
    <br>
    
    </div>
</div>
