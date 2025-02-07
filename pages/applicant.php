<!-- AERON -->


<?php if (!isset($_GET['action'])): ?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>Adoption Form</title>
        <link rel="stylesheet" href="../css/adopt.css">
        <link rel="stylesheet" href="../css/form-elements.css">
        <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    </head>

    <body class="moolah">

        <?php include "nav.php";

        include "../data/userData.php";
        include '../data/petData.php';

        $petID = $_GET['petID'];

        if (!isset($_SESSION['username'])) {
            header('Location: login.php');
            exit();
        } elseif (getPetRehomer($petID) != $_SESSION['username']) {
            header('Location: profile.php');
            exit();
        }


        $petFound = getPetData($petID);
        $applicant = getPetApplicants($petID);

        ?>

        <div class="form-container">
            <div class="selected-pet">
                <img style="display: block; margin-left: auto; margin-right: auto; width: 30%; border-radius:8px;"
                    src="<?= $petFound['img'] ?>" alt="pet pic" />
                <h3 style="text-align: center">Adopting <?= $petFound['name'] ?></h3>
                <h1 style="text-align: center">APPLICANT DETAILS</h1>
                <hr> <br />
            </div>
            <form action="applicant.php?action=auth" method="post">
                <input type="number" value="<?= $petID ?>" name="petID" hidden>
                <div class="form-group">
                    <div class="radio-container-row">
                        <label><input type="radio" name="honorific" <?php if ($applicant['sex'] == 'male') {
                            echo 'checked';
                        } ?> disabled value="male">Mr.</label>
                        <label><input type="radio" name="honorific" <?php if ($applicant['sex'] == 'female') {
                            echo 'checked';
                        } ?> disabled value="female">Ms.</label>
                        <label><input type="radio" name="honorific" <?php if ($applicant['sex'] == 'other') {
                            echo 'checked';
                        } ?> disabled value="other">Mx.</label>
                    </div>
                </div>
                <div class="form-group-1">
                    <label for="fname">First Name</label>
                    <input required type="text" id="fname" name="fname" value="<?= $applicant['fname'] ?>" disabled>
                </div>
                <div class="form-group-1">
                    <label for="lname">Last Name</label>
                    <input required type="text" id="lname" name="lname" value="<?= $applicant['lname'] ?>" disabled>
                </div>
                <div class="form-group-1">
                    <label for="email">Email</label>
                    <input required required type="email" id="email" name="email" value="CONFIRM APPLICANT TO SEE EMAIL"
                        disabled>
                </div>
                <div class="form-group-1">
                    <label for="phonenum">Phone Number</label>
                    <input style='margin-bottom:2vh' required type="text" id="phonenum" name="phonenum"
                        value="CONFIRM APPLICANT TO SEE PHONE NUMBER" disabled>
                </div>

                <button style='margin-bottom:1vh' type="submit" name="approve" class="submit-btn">CONFIRM
                    APPLICANT</button><br />
            </form>
            <a href="applicant.php?action=auth&decision=reject&petID=<?= $petID ?>"><button type="submit" name="reject"
                    class="submit-btn">REJECT APPLICANT</button></a>
        </div>
        <?php include 'footer.php'; ?>
    </body>

    </html>

<?php elseif (isset($_GET['action']) && $_GET['action'] == 'auth'):

    include 'conn.php';

    if (isset($_POST['approve'])) {
        $petID = $_POST['petID'];
        $insertQuerty = "UPDATE adopter_data SET confirmed='1' WHERE petID='$petID'";
        if ($conn->query($insertQuerty)) {
            header("Location: profile.php");
            exit();
        }

    } else if (isset($_GET['decision']) && $_GET['decision'] == "reject") {

        $petID = $_GET["petID"];

        $deleteQuerty = "DELETE FROM adopter_data WHERE petID='$petID'";
        if ($conn->query($deleteQuerty)) {

            header("Location: profile.php");
            exit();
        }

    }

endif;