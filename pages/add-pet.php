<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <style>
        .file-upload {
            display: inline-block;
            width: 95%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            background-color: #fff;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .file-upload:hover {
            border-color: #bbb;
            background-color: #f9f9f9;
        }

        /* Hide the default file input */
        input[type="file"] {
            display: none;
        }


        .age-group {
            display: flex;
            gap: 10px;
            /* Spacing between inputs */
            align-items: center;
            width: 99%;
        }

        .age-group label {
            color: #3C5190;
        }

        .age-group input[type="number"],
        .age-group select {
            flex: 1;
            /* Makes them equal width */
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: border-color 0.3s;
        }

        /* Hover & Focus Effect */
        .age-group input[type="number"]:focus,
        .age-group select:focus {
            border-color: #6c63ff;
        }
    </style>
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="form-container">

        <?php if (!isset($_GET["petID"])): ?>

            <h2>Add New Pet for Adoption</h2>
            <form action="manage-pets.php?action=add" method="post" enctype="multipart/form-data">

                <input type="text" name="username" value="<?=$_SESSION['username'];?>" hidden />
                <div class="form-group">
                    <div class="radio-container-row">
                        <label><input type="radio" name="type" value="Dog" required>Dog</label>
                        <label><input type="radio" name="type" value="Cat" required>Cat</label>
                    </div>
                </div>
                <div class="form-group-1">
                    <label for="name">Pet's Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your pet's name" required>
                </div>
                <br><div class="age-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" placeholder="Enter your pet's age" required>
                    <select name="moyo">
                        <option value="yo">year/s old</option>
                        <option value="mo">month/s old</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>Sex</p>
                    <div class="radio-container-row">
                        <label><input type="radio" name="sex" value="Male" required>Male</label>
                        <label><input type="radio" name="sex" value="Female" required>Female</label>
                    </div>
                </div>
                <div class="form-group-1">
                    <label for="breed">Pet's Breed</label>
                    <input type="text" id="breed" name="breed" placeholder="Enter your pet's breed" required>
                </div>
                <div class="form-group">
                    <p>Characteristics</p>
                    <div class="radio-container-col">
                        <label><input type="checkbox" name="characteristics[]" value="Affectionate">Affectionate</label>
                        <label><input type="checkbox" name="characteristics[]" value="Calm">Calm</label>
                        <label><input type="checkbox" name="characteristics[]" value="Energetic">Energetic</label>
                        <label><input type="checkbox" name="characteristics[]" value="Playful">Playful</label>
                    </div>
                </div>

                <div class="form-group-1">
                    <label for="description">Pet's Description</label>
                    <textarea id="description" name="description" rows="4" cols="50">Describe your pet here</textarea>
                </div><br>

                <div class="form-group-1">
                    <label for="img" class="file-upload">
                        Upload your Pet's Image here
                    </label>
                    <input type="file" name="img" id="img">
                </div><br>
                <button type="submit" class="submit-btn">Submit</button>
            </form>

        <?php else: ?>

            <?php

            $petID = $_GET['petID'];
            include "../data/petData.php";
            $pet = getPetData($petID);
            $petChars = explode(';',$pet['characteristics']);
            ?>

            <h2>Edit <?= $pet['name'] ?>'s Information</h2>
            <form action="manage-pets.php?action=edit" method="POST">
                <input type="number" value="<?=$pet['petID']?>" name="petID" hidden>
                <div class="form-group">
                    <div class="radio-container-row">
                        <label><input type="radio" name="type" value="Dog" <?php if ($pet['type'] === 'Dog')
                            echo 'checked'; ?>
                                required>Dog</label>
                        <label><input type="radio" name="type" value="Cat" <?php if ($pet['type'] === 'Cat')
                            echo 'checked'; ?>
                                required>Cat</label>
                    </div>
                </div>
                <div class="form-group-1">
                    <label for="name">Pet's Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your pet's name" required
                        value="<?= $pet['name'] ?>">
                </div>
                <br><div class="age-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" placeholder="Enter your pet's age" value="<?=$pet['age']?>" required>
                    <select name="moyo">
                        <option <?php if ($pet['age'] >= 1) echo 'selected'; ?> value="yo">year/s old</option>
                        <option <?php if ($pet['age'] < 1) echo 'selected'; ?> value="mo">month/s old</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>Sex</p>
                    <div class="radio-container-row">
                        <label><input type="radio" name="sex" value="Male" <?php if ($pet['sex'] === 'Male')
                            echo 'checked'; ?>
                                required>Male</label>
                        <label><input type="radio" name="sex" value="Female" <?php if ($pet['sex'] === 'Female')
                            echo 'checked'; ?> required>Female</label>
                    </div>
                </div>
                
                <div class="form-group-1">
                    <label for="breed">Pet's Breed</label>
                    <input value="<?=$pet['breed']?>" type="text" id="breed" name="breed" placeholder="Enter your pet's breed" required>
                </div>
                <div class="form-group">
                    <p>Characteristics</p>
                    <div class="radio-container-col">
                        <label><input type="checkbox" name="characteristics[]" <?php if (in_array("Affectionate", $petChars))
                            echo 'checked'; ?> value="Affectionate">Affectionate</label>
                        <label><input type="checkbox" name="characteristics[]" <?php if (in_array("Calm", $petChars))
                            echo 'checked'; ?> value="Calm">Calm</label>
                        <label><input type="checkbox" name="characteristics[]" <?php if (in_array("Energetic", $petChars))
                            echo 'checked'; ?> value="Energetic">Energetic</label>
                        <label><input type="checkbox" name="characteristics[]" <?php if (in_array("Playful", $petChars))
                            echo 'checked'; ?> value="Playful">Playful</label>
                    </div>
                </div>

                <div class="form-group-1">
                    <label for="description">Pet's Description</label>
                    <textarea id="description" name="description" rows="4" cols="50"><?= $pet["description"] ?></textarea>
                </div><br>
                <button type="submit" style="margin-bottom:1vh;" class="submit-btn">Save Changes</button>
            </form>
            <form action="manage-pets.php?action=delete" method="POST">
                <input type="number" value="<?=$pet['petID']?>" name="petID" hidden>
                <button type="submit" class="delete-btn">Remove <?=$pet['name']?> from Adoption Roll</button>
            </form>

        <?php endif; ?>
    </div>

    <script>
        document.getElementById("img").addEventListener("change", function () {
            let fileName = this.files[0] ? this.files[0].name : "Choose a file";
            document.querySelector(".file-upload").textContent = fileName;
        });
    </script>
</body>

</html>