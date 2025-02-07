<?php

$petDataRaw = file_get_contents('../data/petData.json');
if ($petDataRaw === false) {
    die('Error reading the JSON file');
}
$petData = json_decode($petDataRaw);


function getPetData($petID)
{
    include "../pages/conn.php";
    $sql = "SELECT * FROM pet_data WHERE petID='$petID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function getPetsJSON()
{
    include "../pages/conn.php";
    $sql = "SELECT * FROM pet_data";
    $result = $conn->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    return $json_data;
}

function getPetIDs()
{
    include "../pages/conn.php";
    $sql = "SELECT petID FROM pet_data";
    $result = $conn->query($sql);
    $raw = $result->fetch_all(MYSQLI_ASSOC);
    $petIDs = [];
    foreach ($raw as $value) {
        array_push($petIDs, $value['petID']);
    }
    return $petIDs;
}

function getPetBreeds($type)
{
    include "../pages/conn.php";
    $sql = "SELECT breed FROM pet_data WHERE type='$type'";
    $result = $conn->query($sql);
    $raw = $result->fetch_all(MYSQLI_ASSOC);
    $petBreeds = [];
    foreach ($raw as $value) {
        if (!in_array($value['breed'], $petBreeds)) {
            array_push($petBreeds, $value['breed']);
        }
    }
    return $petBreeds;
}

function getPetRehomer($petID) {
    include "../pages/conn.php";
    $sql = "SELECT * FROM rehomer_pets WHERE petID='$petID'";
    $result = $conn->query($sql);
    $rehomerUsername = false;
    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();
        $rehomerUsername = $row['username'];
    }
    return $rehomerUsername;
}