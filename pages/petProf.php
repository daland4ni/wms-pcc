<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet-Connect Gallery</title>
  <link rel="icon" href="../pics/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/petProf.css">
</head>

<body>

  <?php include "nav.php"; ?>

  <div class="content">
    <div class="gallery-name">
      <p>Meet Our Furry Friends!</p>
    </div>

    <?php

    include "../data/petData.php";

    ?>

    <div class="gallery">

      <?php
      $petIDs = getPetIDs();
      foreach ($petIDs as $id):
        $pet = getPetData($id);

        $applicant = getPetApplicants($id);
        if (!$applicant || ($applicant && $applicant['qualified']==0)):
          $finalAge;
          if ($pet['age'] < 1) {
            $finalAge = $pet['age'] * 10;
            $finalAge = (string) $finalAge . " months old";
          } else {
            $finalAge = $pet['age'];
            $finalAge = (string) $finalAge . " years old";
          } ?>

          <div class="gallery-item">
            <a href="<?= '#popup' . (string) $pet['petID']; ?>"><img src="<?= $pet['img']; ?>"></a>
            <div class="caption"><b><?= $pet['name']; ?></b></div>
          </div>

        <?php endif;
      endforeach; ?>

      <?php
      $petIDs = getPetIDs();
      foreach ($petIDs as $id):
        $pet = getPetData($id);

        $finalAge;
        if ($pet['age'] < 1) {
          $finalAge = $pet['age'] * 10;
          $finalAge = (string) $finalAge . " months old";
        } else {
          $finalAge = $pet['age'];
          $finalAge = (string) $finalAge . " years old";
        } ?>
        <div id="<?= 'popup' . (string) $pet['petID']; ?>" class="popup">
          <div class="popup-content">
            <img src="<?= $pet['img']; ?>" alt="<?= 'Pet' . (string) $pet['petID']; ?>">
            <p class="popup-text">
              <b style="font-size: 30px; color: #3C5190"><?= $pet['name']; ?></b><br>
              Age: <?= $finalAge; ?><br>
              Sex: <?= $pet['sex']; ?><br>
              Breed: <?= $pet['breed']; ?><br><br>
              <?= $pet['name']; ?> is <?= $pet['description']; ?><br><br>
              <a href="adopt.php?petID=<?= $pet['petID']; ?>"><button>Adopt <?= $pet['name']; ?></button></a>
            </p>
            <a href="#" class="close">✖</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php include "footer.php"; ?>
  </div>
  </div>
</body>

</html>