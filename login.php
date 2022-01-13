<?php
session_start();
if(isset($_SESSION['uid'])){
    header('location:admin/admindashbord.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form action="login.php" method="POST">
    <h2 align="center">Admin Login</h2>
    <table align="center">
          <tr>
              <td><input type="text" name="name" required></td>
          </tr>
          <tr>
              <td><input type="password" name="pass" required></td>
          </tr>
          <tr>
              <td align="center"><input type="submit" name="login" value="Login" required></td>
          </tr>
    </table>
    </form>
    
</body>
</html>

<?php
 include('dbcon.php');
 if(isset($_POST['login'])){
     $username = $_POST['name'];
     $password = $_POST['pass'];


     $sql = "SELECT * FROM admin  WHERE username='".$username."' AND password='".$password."' ";
     $statement = $conn->prepare($sql);
     $statement->execute();
     
     $row =$statement->fetch(PDO::FETCH_ASSOC) ;
     
     if($row < 1){
         ?>
         <script>
             alert('Username or Password not match');
             window.open('login.php','_self');
         </script>
         <?php
     }else{
         $data = $row;

         $id=$data['id'];
         
         session_start();
         $_SESSION['uid'] = $id;
         header('location:admin/admindashbord.php');
     }
 }
?>
