<?php
include('../dbcon.php');





      $rollno = $_POST['rollno'];
      $name = $_POST['name'];
      $city = $_POST['city'];
      $pcon = $_POST['pcon'];
      $standerd = $_POST['standerd'];
      $image = $_FILES['image']['name'];
      $tempname = $_FILES['image']['name'];
      $id = $_POST['sid'];

      move_uploaded_file($tempname ,"../dataimages/$image");

     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "UPDATE student SET  rollno=:rollno , name=:name , city=:city , pcont=:pcon ,standerd=:standerd ,image=:image  WHERE id=:id";



     $statement = $conn->prepare($sql);
     



   

    

     if ($rows=$statement->execute([':rollno' => $rollno, ':name' => $name, ':city' => $city,':pcon' =>$pcon,':standerd' =>$standerd ,':image' =>$image , ':id' => $id])) {
        
      ?>

         <script>
            alert("Data Updated Successfully");
                
            window.open( 'updateform.php?sid=<?php echo $id ; ?>', '_self');


            </script>

            <?php


         

       }


    
   
    
  
?>

<?php

include('footer.php');

?>


        
     
      





 