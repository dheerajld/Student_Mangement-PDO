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


<?php


  
      include('../dbcon.php');

      $id = $_GET['sid'];
      $sql =  "SELECT * FROM student WHERE id = :id ";
      $statement = $conn->prepare($sql);
      $statement->execute([':id' => $id ]);
      $data = $statement->fetch(PDO::FETCH_OBJ);    
         
  
?>




<form  method="POST" action="updatedata.php" enctype="multipart/form-data">
    <table align="center" border="1" width="20%">
    
        <tr>
        
        <td colspan="2" align="center">Roll No</td>
        <td><input type="number"   value="<?php print_r($data->rollno) ; ?>" id="rollno" name="rollno" required></td>

        

        </tr>
        <tr>
        <td colspan="2" align="center">Name</td>
        <td><input type="text" name="name" id="name"  value="<?php print_r($data->name) ; ?>" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">City</td>
        <td><input type="text" name="city" id="city"  value="<?php print_r($data->city) ; ?>" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Parent Contant</td>
        <td><input type="number" name="pcon" id="pcon"  value="<?php print_r($data->pcont) ; ?>" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Standerd</td>
        <td><input type="number" name="standerd" id="standerd"  value="<?php print_r($data->standerd) ; ?>" required></td>
        </tr>
        <tr>
        <td colspan="2" align="center">Image</td>
        <td><input type="file" name="image" id="image" value="<?php print_r($data->image) ; ?>" ></td>
        </tr>
        <tr >
        <td>
            <input type="hidden" name="sid" value="<?php echo $data->id ;  ?>" >
            <input type="submit" name="submit" value="submit">
        </td>
        </tr>
    </table>

</form>


<?php

include('footer.php');

?>