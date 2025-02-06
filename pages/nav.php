<!DOCTYPE html>
<html lang="en">

<?php 

session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Connect - Caloocan</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/nav.css">

</head>

<body>
    <nav class="nav">
        <div class="nav-left">
            <a href="home.php">
                <img src="../pics/logo.png" alt="Pet Connect Caloocan Logo">
                <img src="../pics/subLogo.png" alt="Pet Connect Caloocan SubLogo">
            </a>
        </div>
        <div class="nav-right">
            <a href="home.php">Home</a> <!-- justine -->
            <a href="petProf.php">Pet Profiles</a> <!-- adelaine -->
            <a href="matching.php">Match-A-Pet</a> <!-- aeron -->
            <a href="adopt.php">Adopt Now!</a> <!-- aeron -->
            <a href="fosters.php">Meet the Rehomers</a> <!-- rence -->
            <?php if (isset($_SESSION["username"])) : ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            <?php else : ?>
                <a href="login.php">Rehomers' Portal</a>
            <?php endif; ?>
        </div>
    </nav>
    <main>
        <!-- Main content goes here -->
    </main>
    <footer>
        <!-- Footer content goes here -->
    </footer>
</body>

</html>