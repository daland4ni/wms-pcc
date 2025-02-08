<?php

$action = $_GET['action'];


include 'conn.php';
include '../data/petData.php';

if ($action === 'add') {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $moyo = $_POST['moyo'];
    $sex = $_POST['sex'];
    $description = $_POST['description'];
    $characteristics = $_POST['characteristics'] ?? [];

    if (!empty($characteristics)) {
        $characteristics = join(';', $characteristics);
    } else {
        $characteristics = '';
    }

    if ($moyo === 'mo') {
        $age /= 10;
    }

    $username = $_POST['username'];

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 10 * 1024 * 1024; // 10MB

    // Create the upload directory if it doesn't exist
    $uploadDir = "../pics/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($_FILES["img"]) || $_FILES["img"]["error"] != 0) {
        header('Location: add-pet.php?error=1');
        exit();
        //die("Error: No file uploaded or an error occurred.");
    }

    $file = $_FILES["img"];
    $fileName = basename($file["name"]);
    $fileSize = $file["size"];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


    if (!in_array($fileType, $allowedTypes)) {
        header('Location: add-pet.php?error=2');
        exit();
        //die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file["tmp_name"]);
    finfo_close($finfo);

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) {
        header('Location: add-pet.php?error=3');
        exit();
        //die("Error: Invalid file type detected.");
    }

    if ($fileSize > $maxFileSize) {
        header('Location: add-pet.php?error=4');
        exit();
        //die("Error: File size exceeds 5MB limit.");
    }



    $insertQuerty = "INSERT INTO pet_data(name,type,sex,age,breed,characteristics,description) 
    VALUES ('$name','$type','$sex','$age','$breed','$characteristics','$description')";
    
    if ($conn->query($insertQuerty)) {
        $newPetID = $conn->insert_id;
        $insertQuerty2 = "INSERT INTO rehomer_pets (petID, username) VALUES ('$newPetID','$username')";
        if ($conn->query($insertQuerty2)) {
            $targetFilePath1 = "petID-" . (string) $newPetID . "-" . $fileName;
            $targetFilePath = $uploadDir . $targetFilePath1;

            $insertQuerty3 = "UPDATE pet_data SET img='$targetFilePath' WHERE petID='$newPetID'";
            if ($conn->query($insertQuerty3)) {
                if (!move_uploaded_file($file["tmp_name"], $targetFilePath)) {
                    header('Location: add-pet.php?error=5');
                    exit();
                    //echo "File upload failed.";
                }
                header("Location: profile.php");
                exit();
            } else {
                header('Location: add-pet.php?error=6');
                exit();
                //database error
            }
        }
    }




} elseif ($action === 'edit') {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $moyo = $_POST['moyo'];
    $sex = $_POST['sex'];
    $description = $_POST['description'];
    $characteristics = $_POST['characteristics'] ?? [];

    if (!empty($characteristics)) {
        $characteristics = join(';', $characteristics);
    } else {
        $characteristics = '';
    }

    if ($moyo === 'mo') {
        $age /= 10;
    }

    $petID = $_POST['petID'];
    $insertQuerty = "UPDATE pet_data SET name='$name', age='$age', type='$type', breed='$breed', sex='$sex', description='$description', characteristics='$characteristics' WHERE petID='$petID'";
    if ($conn->query($insertQuerty)) {
        header("Location: profile.php");
        exit();
    }
} elseif ($action === 'delete') {
    $petID = $_POST['petID'];

    $pet = getPetData($petID);
    $imgDirectory = $pet['img'];

    $deleteQuerty = "DELETE FROM pet_data WHERE petID='$petID'";
    if ($conn->query($deleteQuerty)) {
        $deleteQuerty2 = "DELETE FROM rehomer_pets WHERE petID='$petID'";
        if ($conn->query($deleteQuerty2)) {
            if (unlink($imgDirectory)) {
                echo 'The file ' . $imgDirectory . ' was deleted successfully!';
            } else {
                echo 'There was an error deleting the file ' . $imgDirectory;
            }

            header("Location: profile.php");
            exit();
        }
    }


}