<?php

function getUserData($username)
{
    include "../pages/conn.php";
    $sql = "SELECT * FROM rehomer_info WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

function getUserPetIDs($username)
{
    include "../pages/conn.php";
    $sql = "SELECT * FROM rehomer_pets WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows < 0) {
        return false;
    } else {
        $raw = $result->fetch_all(MYSQLI_ASSOC);
        $petIDs = [];
        foreach ($raw as $value) {
            array_push($petIDs, $value['petID']);
        }
        return $petIDs;
    }
}

function checkUserPets($username)
{
    include "../pages/conn.php";
    $sql = "SELECT * FROM rehomer_pets WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows < 0) {
        return false;
    } else {
        return true;
    }
}
