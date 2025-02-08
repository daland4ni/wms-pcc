<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet-Connect Gallery</title>
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/petProf.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: Poppins;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #D1BDC7;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .content {
            margin-top: 70px;
        }

        .gallery-item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }

        .caption {
            padding: 10px;
            font-size: 14px;
            color: #3C5190;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        .gallery-name p {
            color: #3C5190;
            font-size: 45px;
            font-family: Poppins;
            text-align: center;
            font-weight: bold;

        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Popup styles */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 15px;
        }

        .popup:target {
            display: flex;
        }

        .popup-content {
            background: white;
            padding: 40px;
            padding-top: 100%;
            border-radius: 8px;
            max-width: 650px;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            position: relative;
            flex-wrap: wrap;
        }

        .popup-content img {
            width: 30%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .popup-text {
            width: 50%;
            padding-left: 20px;
            text-align: left;
            font-size: 18px;
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

        button {
            font-family: Poppins;
            color: white;
            background-color: #3C5190;
            cursor: pointer;
            width: 100%;
            height: 40px;
            border-radius: 6px;
            font-size: 18px;
            border: none;
        }

        button:hover {
            background-color: #2d3e75;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .popup-content {
                flex-direction: column;
                text-align: center;
                padding: 15px;
            }

            .popup-content img {
                width: 100%;
                margin-bottom: 10px;
            }

            .popup-text {
                width: 100%;
                padding-left: 0;
            }

            button {
                width: 100%;
            }

            .popup-content .close {
                top: 5px;
                right: 10px;
            }
        }
    </style>
</head>

<body>

    <?php include "nav.php"; ?>

    <div class="content">
        <div class="gallery-name">
            <p>Meet Our Furry Friends!</p>
        </div>

        <?php

        include "../data/petData.php";

        ?>

        <div class="gallery">

            <?php
            $petIDs = getPetIDs();
            foreach ($petIDs as $id):
                $pet = getPetData($id);

                $applicant = getPetApplicants($id);
                if (!$applicant || ($applicant && $applicant['qualified'] === 0)):
                    $finalAge;
                    if ($pet['age'] < 1) {
                        $finalAge = $pet['age'] * 10;
                        $finalAge = (string) $finalAge . " months old";
                    } else {
                        $finalAge = $pet['age'];
                        $finalAge = (string) $finalAge . " years old";
                    } ?>

                    <div class="gallery-item">
                        <a href="<?= '#popup' . (string) $pet['petID']; ?>"><img src="<?= $pet['img']; ?>"></a>
                        <div class="caption"><b><?= $pet['name']; ?></b></div>
                    </div>

                <?php endif;
            endforeach; ?>

            <?php
            $petIDs = getPetIDs();
            foreach ($petIDs as $id):
                $pet = getPetData($id);

                $finalAge;
                if ($pet['age'] < 1) {
                    $finalAge = $pet['age'] * 10;
                    $finalAge = (string) $finalAge . " months old";
                } else {
                    $finalAge = $pet['age'];
                    $finalAge = (string) $finalAge . " years old";
                } ?>
                <div id="<?= 'popup' . (string) $pet['petID']; ?>" class="popup">
                    <div class="popup-content">
                        <img src="<?= $pet['img']; ?>" alt="<?= 'Pet' . (string) $pet['petID']; ?>">
                        <p class="popup-text">
                            <b style="font-size: 30px; color: #3C5190"><?= $pet['name']; ?></b><br>
                            Age: <?= $finalAge; ?><br>
                            Sex: <?= $pet['sex']; ?><br>
                            Breed: <?= $pet['breed']; ?><br><br>
                            <?= $pet['name']; ?> is <?= $pet['description']; ?><br><br>
                            <a href="adopt.php?petID=<?= $pet['petID']; ?>"><button>Adopt <?= $pet['name']; ?></button></a>
                        </p>
                        <a href="#" class="close">✖</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php include "footer.php"; ?>
    </div>
    </div>
</body>

</html>