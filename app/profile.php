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
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <style>
        .container {
            width: 80%;
            margin-left: 7%;
        }

        .popup {
            position: relative;
            top: 0;
            left: 0;
            width: 90%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .popup:target {
            display: flex;
        }

        .gallery {
            display: grid;
            gap: 25px;
            max-width: 1000px;
            width: 80%;
            margin: 0 auto;
            align-items: center;
        }

        .popup-content-a {
            max-width: 300px;
            width: 100%;
        }

        .popup-content {
            width: 100%;
            display: flex;
            align-items: center;
            position: relative;
            height: 70%;
        }

        .popup-content,
        .popup-content-a {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 1vh;
        }

        .popup-content img {
            width: 22%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            aspect-ratio: 1/1;
        }

        .popup-text {
            width: 60%;
            padding-left: 35px;
            text-align: left;
            font-size: 19px;
        }

        .popup-content .close,
        .popup-content-a .close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 25px;
            cursor: pointer;
            color: #333;
        }

        .popup-content .close:hover,
        .popup-content-a .close:hover {
            /* background: rgba(0, 0, 0, 0.2); */
            color: black;
        }

        .add-btn {
            width: 80%;
            background: #3c5190;
            color: #ffffff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 15%;
        }

        .add-btn-1 {
            width: 100%;
            background: #3c5190;
            color: #ffffff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-btn:hover,
        .add-btn-1:hover {
            background: #5a54d3;
        }

        h3 {
            color: #555;
            margin-left: 10%;
            margin-bottom: 0;
        }

        /* .edit {
    position: absolute;
    top: 10px;  
    right: 10px; 
    width: 24px; 
    height: 24px;
} */

        .edit img {
            width: 10px;
            height: 10px;
        }
    </style>
</head>

<body class="moolah">

    <?php include "nav.php"; ?>
    <?php include "../data/userData.php";
    $userData = getUserData($_SESSION['username']);
    ?>

    <div class="container">
        <h1 style="color:#555; font-size:50px; margin-top:0; text-align:center">Hello, <?= $userData['fname'] ?>!</h1>
        <a href="add-pet.php"><button class="add-btn">Add New Pet for Adoption</button></a>
        <h3>Your pets for adoption:</h3>

        <?php if (checkUserPets($_SESSION['username'])): ?>
            <?php include '../data/petData.php';
            foreach (getUserPetIDs($_SESSION['username']) as $petID):
                $pet = getPetData($petID);
                ?>
                <div class="gallery">
                    <div class="popup-content">
                        <img src="<?= $pet['img']; ?>" alt="<?= $pet['img']; ?>">
                        <p class="popup-text">
                            <b style="font-size: 30px; color: #3C5190"><?= $pet['name']; ?></b><br>
                            Sex: <?= $pet['sex']; ?><br>
                            Breed: <?= $pet['breed']; ?><br><br>
                            <?php if (getPetApplicants($petID) && !getPetApplicants($petID)['confirmed']): ?>
                                <a href="applicant.php?petID=<?= $petID ?>"><button class="add-btn-1">View Applicant</button></a>
                            <?php elseif (getPetApplicants($petID) && getPetApplicants($petID)['confirmed']):
                                $applicant = getPetApplicants($petID);
                                ?>
                                <b><?= $applicant['fname'] . " " . $applicant['lname'] ?></b> | <?= $applicant['email'] ?> |
                                <?= $applicant['phonenum'] ?>
                            <?php endif; ?>
                        </p>
                        <a href="add-pet.php?petID=<?= $pet['petID']; ?>" class="edit">
                            <img src="../pics/edit.png" alt="edit" style="height:2rem; width:2rem; position: absolute; 
                            top: 10px; right: 10px;
                            ">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>You have no pets for adoption.</h3>
        <?php endif; ?>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>