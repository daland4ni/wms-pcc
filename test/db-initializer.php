<?php
//DO NOT TOUCH -DANI


//DB initializer

if (isset($_GET['action']) && $_GET['action'] === 'petIDB') {
    include '../pages/conn.php';
    include '../data/petData.php';

    $petIDs = getPetIDs();

    $counterS = 0;
    $counterF = 0;
    foreach ($petIDs as $petID) {

        $checkPetID = "SELECT * FROM rehomer_pets WHERE petID='$petID'";
        $result = $conn->query($checkPetID);
        if ($result->num_rows > 0) {
            $counterF++;
        } else {
            $userRand = rand(1,4);
            $username = '';
            if ($userRand === 1) { $username = 'daland4ni'; }
            if ($userRand === 2) { $username = 'mowchi'; }
            if ($userRand === 3) { $username = 'adelaine'; }
            if ($userRand === 4) { $username = 'rencio'; }

            $insertPet = "INSERT INTO rehomer_pets(petID,username)
            VALUES ('$petID','$username')";
            if ($conn->query($insertPet)) {
                $counterS++;
            } else {
            }
        }
    }

    echo 'Successful data initialized: ' . (string) $counterS . '<br />';
    echo 'Duplicate data (did not insert to db): ' . (string) $counterF;
}

include '../data/petData.php';
$petIDs = getPetIDs();

?>

<!DOCTYPE html>
<html>

<head>
    <title>DEBUGGER</title>
</head>

<body>
    <p>INITIALIZE PET DATA DB</p>
    <form action="db-initializer.php?action=petIDB" method="POST">
        <button type="submit">Initialize pet database</button>
    </form>
</body>

</html>