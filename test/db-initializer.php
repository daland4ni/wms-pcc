<?php
//DO NOT TOUCH -DANI


//DB initializer

if (isset($_GET['action']) && $_GET['action'] === 'petIDB') {
    include '../pages/conn.php';
    include '../data/petData.php';

    $counterS = 0;
    $counterF = 0;
    foreach ($petData as $pet) {
        $finalCharacteristics = join(";", $pet->characteristics);

        $checkPetID = "SELECT * FROM pet_data WHERE petID='$pet->petID'";
        $result = $conn->query($checkPetID);
        if ($result->num_rows > 0) {
            $counterF++;
        } else {
            $insertPet = "INSERT INTO pet_data(petID,name,type,sex,age,breed,characteristics,img,description)
            VALUES ('$pet->petID','$pet->name','$pet->type','$pet->sex','$pet->age','$pet->breed','$finalCharacteristics','$pet->img','$pet->description')";
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