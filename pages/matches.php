<!-- AERON -->
<!DOCTYPE html>

<?php
// Load pet data from JSON file
include "../data/petData.php";

$petsData = json_decode(getPetsJSON(), true);
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
            if (in_array($personality, explode(';',$pet['characteristics'])))
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

    <?php if (!empty($matchingPets)): ?>
        <?php $matchesCount = count($matchingPets);  ?>
        <h1 style="color: #3C5190; font-size: 40px">We Found <?= (string)$matchesCount ?> Matching Pets!</h1>
    <?php else : ?>
        <h1>We found no pets :(</h1>
    <?php endif; ?>
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
                    <div class="details">
                        <p><strong>Gender:</strong> <?= htmlspecialchars($pet['sex']) ?></p>
                        <p><strong>Breed:</strong> <?= htmlspecialchars($pet['breed']) ?></p>
                        <p><strong>Age:</strong> <?= $finalAge ?></p>
                    </div>
                    <p class="description"><?= htmlspecialchars($pet['description']) ?></p>
                    <a href="adopt.php?petID=<?=$pet['petID'];?>"><button>Adopt <?= $pet['name']; ?></button></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No pets found matching your criteria.</p>
        <?php endif; ?>
    </div>
    <br>
    <a href="matching.php">Go Back</a>
    <?php include "footer.php"; ?>
</body>

</html>