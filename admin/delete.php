<?php  

include("../dbcon.php");  
$delete_id=$_GET['sid'];  
$sql="DELETE  FROM student WHERE id='$delete_id'";//delete query  $sql = "";
$statement = $conn->prepare($sql); 
$statement->execute(); 

if($statement)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('deletestudent.php?deleted=user has been deleted','_self')</script>";  
}  
  
?> 