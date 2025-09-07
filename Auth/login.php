<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/styleAuth.css">
     <title>Login Page</title>
</head>
<?php 
     include "../service/database.php";
     session_start();
     $login_message = "";

     if(isset($_SESSION["is_login"])) {
          header("location: ../dashboard.php");
     }

     if(isset($_POST['register'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];
          $hash_password = hash('sha256', $password);
          
          $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hash_password'";
         
          $result = $db->query($sql);
          if ($result->num_rows > 0) {
               $data = $result->fetch_assoc();
          $_SESSION["username"] = $data["username"];
               $_SESSION["is_login"] = true;

               header("location: ../dashboard.php");
          } else {
               $login_message = "data tidak ditemukan";
          }
          
          $db->close();
     }
?>
<body>
     <?php include "../layout/header.php" ?>
     <main>
          <form action="login.php" method="POST">
               <h3>Login</h3>
               <label for="email">Email</label>
               <input type="email" name="email">
               <label for="password">Password</label>
               <input type="password" name="password">
               <input type="submit" name="register" value="register" class="button">
          </form>
          <i><?= $login_message ?></i>
     </main>
     <?php include "../layout/footer.php" ?>

</body>
</html>