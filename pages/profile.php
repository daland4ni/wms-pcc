<!-- AERON -->
<!DOCTYPE html>

<html>

<?php

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

?>

<head>
    <title>Rehomer's Profile</title>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

</body>
</html>