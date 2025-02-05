<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Gallery</title>
  <link rel="stylesheet" href="../css/petProf.css">
</head>

<body>

  <?php include "nav.php"; ?>

  <div class="content">
    <div class="gallery-name">
      <p>Pet Profiles</p>
    </div>
    
    <?php

    include "petData.php";

    ?>

    <div class="gallery">

      <?php foreach ($petData as $pet) : 
        $finalAge;
        if ($pet->age < 1) {
          $finalAge = $pet->age * 10;
          $finalAge = (string)$finalAge . " months old";
        } else {
          $finalAge = $pet->age;
          $finalAge = (string)$finalAge . " years old";
        } ?>

      <div class="gallery-item">
        <a href="<?='#popup' . (string)$pet->petID;?>"><img src="<?=$pet->img; ?>"></a>
        <div class="caption"><b><?=$pet->name; ?></b>, <?=$finalAge;?>, <?=$pet->sex; ?>, <?=$pet->breed; ?></div>
      </div>

      <?php endforeach; ?>

      <?php foreach ($petData as $pet) : ?>
      <div id="<?='popup' . (string)$pet->petID;?>" class="popup">
        <div class="popup-content">
            <img src="<?=$pet->img;?>" alt="<?='Pet' . (string)$pet->petID;?>">
            <p><?=$pet->description;?></p>
            <a href="#" class="close">Close</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  </div>
</body>

</html>