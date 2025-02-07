<!-- AERON -->
<!DOCTYPE html>

<html>

<?php

$action = $_GET['action'] ?? false;

?>

<head>
    <?php if ($action === 'register'): ?>
        <title>Rehomer: Register</title>
    <?php else: ?>
        <title>Rehomer: Login</title>
    <?php endif; ?>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="form-container">



        <?php if ($action === "register"): ?>
            <h2>Become a Rehomer!</h2>
            <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
                <p style="color: red;">Username already taken</p>
            <?php endif; ?>
            <form action="auth.php?action=register" method="POST">
                <div class="form-group">
                    <div class="radio-container-row">
                        <label><input type="radio" name="honorific" value="male">Mr.</label>
                        <label><input type="radio" name="honorific" value="female">Ms.</label>
                        <label><input type="radio" name="honorific" value="other">Mx.</label>
                    </div>
                </div>
                <div class="form-group-1">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="Enter your first name">
                </div>
                <div class="form-group-1">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" placeholder="Enter your last name">
                </div>
                <div class="form-group-1">
                    <label for="phonenum">Contact Number</label>
                    <input type="text" id="phonenum" name="phonenum" placeholder="Enter your mobile number">
                </div>
                <div class="form-group-1">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username">
                </div>
                <div class="form-group-1">
                    <label for="pword">Password</label>
                    <input type="password" id="pword" name="pword" placeholder="Enter your Password">
                </div>
                <p>Becoming a Rehomer affiliate of Pet Connect - Caloocan allows you to <strong>put up pets for
                        adoption</strong>. This is a different process for those who wish to become new fur parents and
                    adopt one of our pets.</p>
                <p>Click <a href="adopt.php"><u>here</u></a> if you wish to adopt a new pet!</p>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        <?php else: ?>
            <form action="auth.php?action=login" method="POST">
                <div>
                    <p style="margin-top: 0px; color: #3C5190; font-size: 35px; text-align: center; font-weight: bold">LOGIN
                    </p>
                </div>
                <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
                    <p style="color: red;">Incorrect Username or Password</p>
                <?php endif; ?>
                <div class="form-group-1">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your Username">
                </div>
                <div class="form-group-1">
                    <label for="pword">Password</label>
                    <input type="password" id="pword" name="pword" placeholder="Enter your Password">
                </div>
                <p>Don't have a Rehomer account? Click <a href="login.php?action=register"><u>here</u></a> to register!</p>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>