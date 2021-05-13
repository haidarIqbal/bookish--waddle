<?php 
session_start();
if(empty($_SESSION["adminSite"])){
	header("LOCATION:index.php"); 
}
include("../database/connection.php");
$message="";
if(isset($_POST['submit'])){
	
	$wave=stripslashes($_REQUEST['wave']);
	$wave=mysqli_real_escape_string($link,$wave);
	
	$title=stripslashes($_REQUEST['title']);
	$title=mysqli_real_escape_string($link,$title);
	
	$courseLink=stripslashes($_REQUEST['link']);
	$courseLink=mysqli_real_escape_string($link,$courseLink);
	
	$desc=stripslashes($_REQUEST['desc']);
	$desc=mysqli_real_escape_string($link,$desc);
	
    $courseDate=date("Y-m-d");
	$query = "INSERT INTO courses(wave,title,link,`description`,courseDate)
    VALUES('$wave','$title','$courseLink','$desc','$courseDate')";
		$result = mysqli_query($link,$query);
       
    $message ="<div class='alert alert-success'> Course Created successfully</div>";

	
}


include("./header/header.php");
	?>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <h4>Create a new course</h4>
    </div>
    <br>
    <div class="d-flex justify-content-center">

    <?php 
        echo $message;
    ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 leftDiv">
            <form class="form-group" method="post" >
                <br>
                <input class="form-control inputArea" type="text" placeholder="Wave #" name="wave" required="">
                <br>
                <input class="form-control inputArea" type="text" placeholder="Course Title" name="title" required="">
                <br>
                <input class="form-control inputArea" type="text" placeholder="Course Link" name="link" required="">
                <br>
                <textarea class="form-control inputArea" placeholder="Description" name="desc" required=""></textarea>
                <br>
                <button type="submit" name="submit" class="btn btn-lg btnsend">Create Course</button>
            </form>
        </div> 
    </div> 
</div>
