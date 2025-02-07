<?php

$action = $_GET['action'];

$name = $_POST['name'];
$age = $_POST['age'];
$type = $_POST['type'];
$moyo = $_POST['moyo'];
$sex = $_POST['sex'];
$description = $_POST['description'];
$characteristics = $_POST['characteristics'] ?? [];
 
if (!empty($characteristics)) {
    $characteristics = join(';',$characteristics);
} else {
    $characteristics = '';
}

include 'conn.php';

if ($action === 'add') {

} elseif ($action === 'edit') {
    $petID = $_POST['petID'];
    $insertQuerty = "UPDATE pet_data SET name='$name', age='$age', type='$type', sex='$sex', description='$description', characteristics='$characteristics' WHERE petID='$petID'";
    if ($conn->query($insertQuerty)) {
        header("Location: profile.php");
        exit();
    }
}