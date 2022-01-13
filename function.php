<?php 
function  showdetails($standerd , $rollno){
    $dbcon=mysqli_connect("localhost","root","");  
    mysqli_select_db($dbcon,"sms");

    $sql = "SELECT * FROM `student`  WHERE `standerd`='$standerd' AND `rollno`='$rollno' ";


    $run = mysqli_query($dbcon,$sql);
    $rows = mysqli_num_rows($run);

   
    
    if( $rows > 0 ){
        
      
        $data = mysqli_fetch_assoc( $run);

        

       

        ?>
        <table border="1" style="width: 50%; margin-top:20px;" align="center">
            <tr>
                <th colspan="3">Student Details</th>
            </tr>
            <tr>
                <td rowspan="5"><img src="datimges/<?php echo $data['image']; ?>" style="max-width: 120px; max-height:150px;"  ></td>
                <th>Roll No</th>
                <td><?php echo $data['rollno']; ?></td>
            </tr>
            <tr>
            <th>Name</th>
            <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
            <th>Standerd</th>
            <td><?php echo $data['standerd']; ?></td>
            </tr>

            <tr>
            <th>Parents Contant No</th>
            <td><?php echo $data['pcont']; ?></td>
            </tr>
           
        </table>
        <?php
    }
    else{

        ?>
        
  <script>
      alert('student not match');
  </script>
  <?php
    }

}

?>