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

<table align="center">
    <form action="deletestudent.php" method="POST">
        <tr>
            <th>Enter Standerd</th>
            <td><input type="number" name="standerd" required></td>
            <th>Enter StudentName</th>
            <td><input type="text" name="name" required></td>
            <td><input type="submit" name="submit" value="Search"></td>
        </tr>

    </form>
</table>
<table align="center" width="80%" border="1" style="margin-top: 10px;">
    <tr style="background-color:white;">
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>RollNo</th>
        <th>Edit</th>
    </tr>
    <?php 
     if(isset($_POST['submit'])){

        include('../dbcon.php');

        $standerd = $_POST['standerd'];
        $name = $_POST['name'];

        $sql = "SELECT * FROM student  WHERE standerd='$standerd' AND name LIKE '%$name%' ";

        
     $statement = $conn->prepare($sql);
     $statement->execute();

     
     
     

    

     if($statement < 1){
             
        echo "<tr><td colspan='5'>No Record Found</td></tr>";

     }else{

        $count = 0;

         while($data=$statement->fetch(PDO::FETCH_ASSOC) ){
            
             
             $count++;
           
             ?>

            
                   <tr>
                     <td><?php echo $count; ?></td>
                     <td><img src="../dataimges/<?php echo $data['image'] ?>" style="max-width: 1px;">   </td>
                     <td><?php echo $data['name']; ?></td>
                     <td><?php echo $data['rollno']; ?></td>
                     <td>  <a href="delete.php?sid=<?php echo $data['id'] ?>"><button class="btn btn-success">Delete</button></a></td>
                     </tr>
             <?php

         }
     }




         
     }
?>
</table>

<?php

include('footer.php');

?>


