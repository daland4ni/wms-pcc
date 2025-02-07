<?php

$action = $_GET['action'];

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

include 'conn.php';

if ($action === 'add') {
    $username = $_POST['username'];

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 10 * 1024 * 1024; // 10MB

    // Create the upload directory if it doesn't exist
    $uploadDir = "../pics/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($_FILES["img"]) || $_FILES["img"]["error"] != 0) {
        die("Error: No file uploaded or an error occurred.");
    }

    $file = $_FILES["img"];
    $fileName = basename($file["name"]);
    $fileSize = $file["size"];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $targetFilePath = $uploadDir . $fileName;

    if (!in_array($fileType, $allowedTypes)) {
        die("Error: Only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file["tmp_name"]);
    finfo_close($finfo);

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) {
        die("Error: Invalid file type detected.");
    }

    if ($fileSize > $maxFileSize) {
        die("Error: File size exceeds 5MB limit.");
    }

    if (!move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        echo "File upload failed.";
    }

    $insertQuerty = "INSERT INTO pet_data (name,type,sex,age,breed,characteristics,img,description) 
    VALUES ('$name','$type','$sex','$age','$breed','$characteristics','$targetFilePath','$description')";
    if ($conn->query($insertQuerty)) {
        $newPetID = $conn->insert_id;

        $insertQuerty2 = "INSERT INTO rehomer_pets (petID, username) VALUES ('$newPetID','$username')";
        if ($conn->query($insertQuerty2)) {
            header("Location: profile.php");
            exit();
        }
    }




} elseif ($action === 'edit') {
    $petID = $_POST['petID'];
    $insertQuerty = "UPDATE pet_data SET name='$name', age='$age', type='$type', breed='$breed', sex='$sex', description='$description', characteristics='$characteristics' WHERE petID='$petID'";
    if ($conn->query($insertQuerty)) {
        header("Location: profile.php");
        exit();
    }
}