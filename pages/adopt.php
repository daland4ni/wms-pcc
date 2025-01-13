<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
</head>

<body>

<?php include "nav.php"; ?>
    <form>
        <input type="text" placeholder="Full Name"><br />
        <input type="number" placeholder="Age"><br />

        <h4>Monthly Income</h4>
        <input type="radio" id="mi-op1">
        <label for="mi-op1">< PHP 5,000</label><br>
        <input type="radio" id="mi-op2">
        <label for="mi-op2">PHP 5,000 - PHP 10,000</label><br>
        <input type="radio" id="mi-op3">
        <label for="mi-op3">PHP 10,001 - PHP 30,000</label><br>
        <input type="radio" id="mi-op4">
        <label for="mi-op4">PHP 30,001 - PHP 50,000</label><br>
        <input type="radio" id="mi-op5">
        <label for="mi-op5">PHP 50,001 - PHP 75,000</label><br>
        <input type="radio" id="mi-op6">
        <label for="mi-op6">> PHP 75,000</label><br>

    </form>
</body>

</html>