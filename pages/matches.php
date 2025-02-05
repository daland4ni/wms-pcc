<!-- AERON -->
<!DOCTYPE html>

<?php
// Load pet data from JSON file
include "petData.php";

$petsData = json_decode($petDataRaw, true);
;

// Get form inputs
$petType = $_POST['petType'] ?? '';
$petAge = $_POST['petAge'] ?? '';
$petBreed = strtolower(trim($_POST['petBreed'] ?? ''));
$selectedPersonalities = $_POST['personality'] ?? [];

// Function to check if pet matches criteria
function matchesCriteria($pet, $petType, $petAge, $petBreed, $selectedPersonalities)
{
    if (strcasecmp($pet['type'], $petType) !== 0)
        return false;

    if ($petAge !== 'any') {
        if ($petAge === '<1' && $pet['age'] >= 1)
            return false;
        if ($petAge === '1-2' && ($pet['age'] < 1 || $pet['age'] > 2))
            return false;
        if ($petAge === '3+' && $pet['age'] <= 2)
            return false;
    }

    if ($petBreed && stripos($pet['breed'], $petBreed) === false)
        return false;

    if (!empty($selectedPersonalities)) {
        $counter = 0;
        foreach ($selectedPersonalities as $personality) {
            if (in_array($personality, $pet['characteristics']))
                $counter++;
        }
        if ($counter < 1)
            return false;
    }

    return true;
}

// Filter pets based on criteria
$matchingPets = array_filter($petsData, function ($pet) use ($petType, $petAge, $petBreed, $selectedPersonalities) {
    return matchesCriteria($pet, $petType, $petAge, $petBreed, $selectedPersonalities);
});
?>

<html>

<head>
    <title>Match-A-Pet: Results</title>
    <link rel="stylesheet" href="../css/matches.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <h1>Matching Pets</h1>
    <div class="gallery">
        <?php if (!empty($matchingPets)): ?>
            <?php foreach ($matchingPets as $pet):

                $finalAge;
                if ($pet['age'] < 1) {
                    $finalAge = $pet['age'] * 10;
                    $finalAge = (string) $finalAge . " months old";
                } else {
                    $finalAge = $pet['age'];
                    $finalAge = (string) $finalAge . " years old";
                } ?>
                <div class="pet-card">
                    <img src="<?= htmlspecialchars($pet['img']) ?>" alt="<?= htmlspecialchars($pet['name']) ?>">
                    <h3><?= htmlspecialchars($pet['name']) ?></h3>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($pet['sex']) ?></p>
                    <p><strong>Breed:</strong> <?= htmlspecialchars($pet['breed']) ?></p>
                    <p><strong>Age:</strong> <?= $finalAge ?></p>
                    <p><?= htmlspecialchars($pet['description']) ?></p>
                    <a href="adopt.php"><button>Adopt <?= $pet['name']; ?></button></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No pets found matching your criteria.</p>
        <?php endif; ?>
    </div>
    <br>
    <a href="matching.php">Go Back</a>
</body>

</html>