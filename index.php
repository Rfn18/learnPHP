<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css" />
     <title>learnPHP</title>
</head>
     <?php
          $teks = "Home Page";
     ?>
<body>
     <?php include "layout/header.php" ?>
     <main>
          <h1>Selamat datang di <?= $teks; ?></h1>
     </main>   
     <?php include "layout/footer.php" ?>   
</body>
</html>