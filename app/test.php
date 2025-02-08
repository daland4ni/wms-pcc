<!DOCTYPE html>
<html>

<head>
    <title>Popup</title>
    <style>
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
        }

        .popup:target {
            display: flex;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 650px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            position: relative;
        }

        .popup-content img {
            width: 50%;
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

        button {
            font-family: Poppins;
            color: white;
            background-color: #3C5190;
            cursor: pointer;
            width: 280px;
            height: 40px;
            border-radius: 6px;
            font-size: 19px;
        }
    </style>
</head>

<body>
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
</body>

</html>