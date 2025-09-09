<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/styleAuth.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
     <title>Login Page</title>
</head>
<?php 
     include "../service/database.php";
     session_start();
     $register_message = "";

     if(isset($_SESSION["is_login"])) {
          header("location: ../dashboard.php");
     }

     if (isset($_POST['register'])) {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $hash_password = hash("sha256", $password);

          if(empty($username && $email && $password)) {
               $register_message = "Form belum di isi!";
          } else {
               try {
                    $stmt = $db->prepare("SELECT id_user FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                         $register_message = "email sudah ada";
                    } else {
                         $sql = "INSERT INTO users (username, email, password) VALUE ('$username', '$email' ,'$hash_password')"; 
                         if ($db->query($sql)) {
                              $register_message = "Register berhasil!";
                         } else {
                              $register_message = "Register gagal!";  
                         }
                    }

                    $stmt->close();
               } catch (mysqli_sql_exception) {
                    $register_message = "username sudah ada";                                                                         
               }
          }
          
          $db->close();
     }
?>
<body>
     <?php include "../layout/header.php" ?>
     <main>
          <form action="register.php" method="POST">
               <h3>Register Account</h3>
               <label for="username">Username</label>
               <input type="text" name="username">
               <label for="Email">Email</label>
               <input type="email" name="email">
               <label for="password">Password</label>
               <div class="container-password">
                    <input type="password" name="password" id="password">
                    <i class="fa-solid fa-eye" id="eye"></i>
               </div>
               <input type="submit" name="register" value="register" class="button" id="button">
               <i><?= $register_message ?></i>
          </form>
     </main>
     <?php include "../layout/footer.php" ?>
</body>
<script src="../script.js"></script>
</html>