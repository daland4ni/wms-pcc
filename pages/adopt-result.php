<!-- AERON -->

<?php

$sex = $_POST['honorific'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phonenum = $_POST['phonenum'];
$monthly = $_POST['monthly'];
$otherpets = $_POST['otherpets'];
$allergen = $_POST['allergen'];
$worksetup = $_POST['worksetup'];
$residential = $_POST['residential'];

$petID = $_POST['petID'];

include '../data/petData.php';
include '../data/userData.php';

$pet = getPetData($petID);
$rehomerUsername = getPetRehomer($petID);
$rehomer = getUserData($rehomerUsername);

$points = 10;

if ($monthly === '1') {
    $points -= 3;
} else if ($monthly === '2') {
    $points -= 2;
} else if ($monthly === '3') {
    $points -= 1;
}

if ($otherpets === "yes") {
    $points -= 1;
}

if ($allergen === "yes") {
    $points -= 3;
}

if ($worksetup === '1') {
    $points -= 1;
} else if ($worksetup === '3') {
    $points -= 2;
} else if ($worksetup === '4') {
    $points -= 3;
} else if ($worksetup === '5') {
    $points -= 4;
}

$honorific = '';

if ($sex === 'male') {
    $honorific = 'Mr. ';
} else if ($sex === 'female') {
    $honorific = 'Ms. ';
} else {
    $honorific = 'Mx. ';
}

$rehomerHonorific = '';

if ($rehomer['honorific'] === 'male') {
    $rehomerHonorific = 'Mr. ';
} else if ($rehomer['honorific'] === 'female') {
    $rehomerHonorific = 'Ms. ';
} else {
    $rehomerHonorific = 'Mx. ';
}

$qualified = $points >= 5;


?>


<!DOCTYPE html>

<html>

<head>
    <title>Adoption Results</title>
    <link rel="stylesheet" href="../css/adopt-result.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="container">

        <h3>Dear <?= $honorific . $lname; ?></h3>

        <?php if ($qualified): ?>
            <h1>CONGRATULATIONS!</h1>

            <p style="justify-content:justified;">
                We are thrilled to inform you that your adoption application for <strong><?= $pet['name'] ?></strong> has
                been <b>approved</b>!
                Congratulations on welcoming a new furry family member into your home!<br /><br />

                From the moment we reviewed your application, it was clear that you would provide a loving and caring
                environment for <?= $pet['name'] ?>. We are so excited for you both to start this new journey together.
                Thank you for choosing adoption and for giving <?= $pet['name'] ?> a second chance at a wonderful life. We
                know they will bring you endless joy, love, and companionship!<br /><br />

                Please feel free to reach out if you have any questions. We cannot wait to see <?= $pet['name'] ?> in their
                new
                forever home!<br /><br />

                Warmest congratulations,<br /><br />

                <b><?= $rehomerHonorific .  $rehomer['fname'] . " " . $rehomer['lname'] ?></b><br />
                <?= $pet['name'] . "'s Rehomer" ?><br />
                Pet Connect - Caloocan<br />
                Rehomer's Contact Number: <?= $rehomer['phonenum'] ?>

            </p>
        <?php else: ?>
            <h1>Thank You!</h1>

            <p style="justify-content:justified;">
                Thank you so much for your interest in adopting <strong><?= $pet['name'] ?></strong>. We truly appreciate
                your
                love for animals and
                your desire to provide a home for a pet in need. It’s always heartwarming to see people who want to open
                their hearts and homes to a furry companion.<br /><br />

                After careful review of your application, we regret to inform you that we are <strong>unable to approve your
                    adoption at this time</strong>. Our primary goal is to ensure that each pet is placed in an environment
                that best
                suits their specific needs, and unfortunately, we do not feel that this would be the right
                match.<br /><br />

                Please know that this decision was made with the best interest of both you and <?= $pet['name'] ?> in mind.
                We
                encourage you to continue your search for a pet that aligns better with your circumstances, and we would be
                happy to provide guidance on finding the right companion for you. If you’re interested, we also have
                volunteer opportunities and other ways to support rescue animals.<br /><br />

                Thank you again for your kindness and for considering adoption. We appreciate your understanding and wish
                you the very best in finding the perfect pet for your home.<br /><br />

                Warmest regards,<br /><br />

                <b><?= $rehomerHonorific . $rehomer['lname'] ?></b><br />
                <?= $pet['name'] . "'s Rehomer" ?><br />
                Pet Connect - Caloocan

            </p>
        <?php endif; ?>

    </div>

</body>

</html>