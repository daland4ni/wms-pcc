<?php @session_start();?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Connect - Caloocan</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D1BDC7;
        }

        /* Desktop Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #486989;
            color: beige;
            padding: 10px 20px;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left img {
            height: 50px;
        }

        .nav-right {
            display: flex;
            margin-right: 7vh;
        }

        .nav-right a {
            color: beige;
            margin: 0 15px;
            font-size: 18px;
            text-decoration: none;
        }

        .nav-right a:hover {
            text-decoration: underline;
        }

        /* Hamburger Menu */
        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: beige;
            margin-right: 3vh;
        }

        /* Sidebar for Mobile */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #2c3e50;
            padding-top: 60px;
            transition: 0.3s;
            z-index: 1100;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .nav-right, .logo-name {
                display: none !important;
            }

            .menu-icon {
                display: block;
            }
        }

        main {
            margin-top: 70px;
            padding-top: 50px;
        }
    </style>
</head>

<body>

    <nav class="nav">
        <div class="nav-left">
            <a href="home.php">
                <img src="../pics/logo2.png" alt="Pet Connect Caloocan Logo">
                <img src="../pics/subLogo.png" alt="Pet Connect Caloocan SubLogo">
            </a>
        </div>
        <div class="nav-right">
            <a href="home.php">Home</a>
            <a href="petProf.php">Pet Profiles</a>
            <a href="matching.php">Match-A-Pet</a>
            <?php if (!isset($_SESSION["username"])): ?>
                <a href="adopt.php">Adopt Now!</a>
            <?php endif; ?>
            <a href="fosters.php">Meet the Rehomers</a>
            <?php if (isset($_SESSION["username"])): ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Rehomers' Portal</a>
            <?php endif; ?>
        </div>
        <div class="menu-icon" onclick="toggleSidebar()">&#9776;</div>
    </nav>

    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">&times;</span>
        <div class="nav-left">
            <a href="home.php">
                <img src="../pics/logo2.png" alt="Pet Connect Caloocan Logo">
                <img class='logo-name' src="../pics/subLogo.png" alt="Pet Connect Caloocan SubLogo">
            </a>
        </div>
        <a href="home.php">Home</a>
        <a href="petProf.php">Pet Profiles</a>
        <a href="matching.php">Match-A-Pet</a>
        <?php if (!isset($_SESSION["username"])): ?>
            <a href="adopt.php">Adopt Now!</a>
        <?php endif; ?>
        <a href="fosters.php">Meet the Rehomers</a>
        <?php if (isset($_SESSION["username"])): ?>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Rehomers' Portal</a>
        <?php endif; ?>
    </div>

    <main>
        <!-- Main content goes here -->
    </main>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.style.left = (sidebar.style.left === "0px") ? "-250px" : "0px";
        }
    </script>

</body>

</html>

<?php

ob_end_flush();