<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mangement System</title>
</head>
<body>
    <h3 align="right"><a href="login.php">Admin Login</a></h3>
    <h1 align="center">Welocme Student Mangement Syastem</h1>
    <form method="POST" action="index.php">
         <table style="width: 30%;" align="center" border="1">
         <tr>
             <td colspan="2" align="center">Student Information</td>
         </tr>
         <tr>
             <td align="left">Choose Standard</td>
             <td>
                 <select class="std" name="std">
                     <option value="1">1st</option>
                     <option value="2">2st</option>
                     <option value="3">3st</option>
                     <option value="4">4st</option>
                     <option value="5">5st</option>
                     <option value="6">6st</option>
                     <option value="6">7st</option>
                     <option value="6">8st</option>
                     <option value="6">9st</option>
                     <option value="6">10st</option>
                 </select>
             </td>
         </tr>
         <tr>
             <td align="left">Enter RollNo.</td>
             <td><input type="text" name="rollno" required></td>
         </tr>
         <tr>
             <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
         </tr>

         </table>
    </form>
</body>
</html>


<?php 

$dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"sms");

if(isset($_POST['submit'])){

    $standerd = $_POST['std'];
    $rollno = $_POST['rollno'];

    

    include('function.php');

    showdetails($standerd , $rollno);
}

?>