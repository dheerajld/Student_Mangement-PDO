<?php
session_start();


if(isset($_SESSION['uid']))
{
    echo "";
}else{
    header('location:../login.php');
}

?>
<?php

include('header.php');
include('title.php');

?>

<form action="addstudent.php" method="POST" enctype="multipart/form-data">
    <table align="center" border="1" width="20%">
        <tr>
        <td colspan="2" align="center">Roll No</td>
        <td><input type="number" name="rollno" required></td>

        </tr>
        <tr>
        <td colspan="2" align="center">Name</td>
        <td><input type="text" name="name" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">City</td>
        <td><input type="text" name="city" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Parent Contant</td>
        <td><input type="number" name="pcon" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Standerd</td>
        <td><input type="number" name="standerd" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Image</td>
        <td><input type="file" name="image" required ></td>
        </tr>
        <tr >
        <td><input type="submit" name="submit"></td>
        </tr>
    </table>

</form>


<?php


  if(isset($_POST['submit'])){
      include('../dbcon.php');
         
         $rollno = $_POST['rollno'];
         $name = $_POST['name'];
         $city = $_POST['city'];
         $pcon = $_POST['pcon'];
         $standerd = $_POST['standerd'];
         $image = $_FILES['image']['name'];
         $tempname = $_FILES['image']['name'];

         move_uploaded_file($tempname ,"../dataimages/$image");

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO student (rollno, name, city, pcont, standerd,image)
        VALUES ('".$rollno."', '".$name."', '".$city."', '".$pcon."','".$standerd."','".$image."')";

        $statement = $conn->prepare($sql);
        $statement->execute();


       
      

     


      if($statement == true){
          ?>
          <script>
              alert('Data Inserted Successfully');
          </script>
          <?php
      }

           
        
         
 





         
  }
?>
<?php

include('footer.php');

?>