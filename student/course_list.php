<?php 
session_start();
if(empty($_SESSION["adminSite"])){
	header("LOCATION:index.php"); 
}
include("../database/connection.php");
$getcourses = mysqli_query($link,"SELECT * FROM courses");

include("./header/header.php");

	?>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <h4>Course List</h4>
    </div>
    <br>
    <div class="d-flex justify-content-center ">
        <div class="table-responsive">
        <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Wave #</th>
                <th>Course Title</th>
                <th>Description</th>
                <th>Course Link</th>
                <th>Course Creation Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                while($course = mysqli_fetch_assoc($getcourses)){
                    echo '
                        <tr>
                          <td>'.$course['wave'].'</td>  
                          <td>'.$course['title'].'</td>  
                          <td>'.$course['description'].'</td>  
                          <td><a href='.$course['link'].'>'.$course['link'].'</a></td>  
                          <td>'.$course['courseDate'].'</td>  
                        </tr>';
                }
            
            ?>
        </tbody>
        </table>
        </div>
    </div> 
</div>
