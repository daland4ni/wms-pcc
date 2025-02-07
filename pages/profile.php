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
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <!-- <style>
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
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
            max-width: 1300px;
            margin: 0 auto;
        }

        .popup-content-a {
            max-width: 650px;
            width: 100%;
            color:#3C5190;
            font-size: 20px;
        }

        .popup-content {
            width: 100%;
        }

        .popup-content,
        .popup-content-a {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            position: relative;
            margin-bottom: 1vh;
        }

        .popup-content img,
        .popup-content-a img {
            width: 15%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .popup-text {
            width: 60%;
            padding-left: 35px;
            text-align: left;
            font-size: 19px;
        }

        .popup-content .close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 25px;
            cursor: pointer;
            color: #333;
        }


        .popup-content .close:hover {
            background: #D1BDC7;
            color: white;
        }
    </style> -->
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
                        <img src="<?= $pet['img']; ?>" alt="<?=$pet['img'];?>">
                        <p class="popup-text">
                            <b style="font-size: 30px; color: #3C5190"><?= $pet['name']; ?></b><br>
                            Sex: <?= $pet['sex']; ?><br>
                            Breed: <?= $pet['breed']; ?><br><br>
                            <?= $pet['name']; ?> is <?= $pet['description']; ?><br><br>
                            <?php if (getPetApplicants($petID) && !getPetApplicants($petID)['confirmed']) : ?>
                                <a href="applicant.php?petID=<?=$petID?>"><button class="add-btn-1">View Applicant</button></a>
                            <?php elseif (getPetApplicants($petID) && getPetApplicants($petID)['confirmed']) : 
                                $applicant = getPetApplicants($petID);
                                ?>
                                <b><?=$applicant['fname'] . " " . $applicant['lname']?></b> | <?=$applicant['email']?> | <?=$applicant['phonenum']?>
                            <?php endif; ?>
                        </p>
                        <a href="add-pet.php?petID=<?=$pet['petID'];?>" class="edit" >
                            <img src="../pics/edit.png" alt="edit"
                            style="height:2rem; width:2rem; position: absolute; 
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