<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<?php
    session_start();

    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();

        header('location: index.php');
    }
?>
<body>
    <?php include "layout/header.php"?>
    <main>
        <h3>Halo <span class="name"><?= $_SESSION["username"] ?></span> selamat datang di Dashboard!</h3>
        <form action="dashboard.php" method="POST">
            <input type="submit" name="logout" value="logout">
        </form>
    </main>
    <?php include "layout/footer.php"?>
</body>
</html>