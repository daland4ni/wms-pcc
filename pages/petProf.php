<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Gallery</title>
  <link rel="stylesheet" href="../css/petProf.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    /* Content below navbar */
    .content {
      margin-top: 70px; /* Push content below the navbar */
    }

    /* Gallery styles */
    .gallery {
      display: grid;
      grid-template-columns: repeat(6, 1fr); /* 6 columns */
      gap: 15px;
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .gallery-item {
      background: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
    }

    .gallery-item img {
      width: 100%;
      height: auto;
      display: block;
    }

    .caption {
      padding: 10px;
      font-size: 14px;
      color: #555;
      background-color: #f4f4f4;
      border-top: 1px solid #ddd;
    }
  </style>
</head>
<body>

<?php include "nav.php"; ?>
  <!-- Content wrapper -->
  <div class="content">
    <div class="gallery">
      <div class="gallery-item">
        <img src="../pics/Cats/C1.jpg" alt="Pet 1">
        <div class="caption">This is Pet 1</div>
      </div>
      <div class="gallery-item">
        <img src="../pics/Cats/C2.jpg" alt="Pet 2">
        <div class="caption">This is Pet 2</div>
      </div>
      <div class="gallery-item">
        <img src="../pics/Dogs/D1.jpg" alt="Pet 3">
        <div class="caption">This is Pet 3</div>
      </div>
      <div class="gallery-item">
        <img src="../pics/Dogs/D2.jpg" alt="Pet 4">
        <div class="caption">This is Pet 4</div>
      </div>
      <div class="gallery-item">
        <img src="../pics/Dogs/D2.jpg" alt="Pet 5">
        <div class="caption">This is Pet 5</div>
      </div>
      <div class="gallery-item">
        <img src="../pics/Dogs/D2.jpg" alt="Pet 6">
        <div class="caption">This is Pet 6</div>
      </div>
    </div>
  </div>
</body>
</html>
