<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
</head>

<body>

    <?php include "nav.php"; ?>
    <form>
        <h1>Personal Information</h1>
        <input type="text" placeholder="Full Name"><br />
        <input type="number" placeholder="Age"><br />

        <h1>Household Information</h1>

        <h4>Monthly Income</h4>
        <input type="radio" id="mi-op1" name="MI">
        <label for="mi-op1">< PHP 5,000</label><br>
        <input type="radio" id="mi-op2" name="MI">
        <label for="mi-op2">PHP 5,000 - PHP 10,000</label><br>
        <input type="radio" id="mi-op3" name="MI">
        <label for="mi-op3">PHP 10,001 - PHP 30,000</label><br>
        <input type="radio" id="mi-op4" name="MI">
        <label for="mi-op4">PHP 30,001 - PHP 50,000</label><br>
        <input type="radio" id="mi-op5" name="MI">
        <label for="mi-op5">PHP 50,001 - PHP 75,000</label><br>
        <input type="radio" id="mi-op6" name="MI">
        <label for="mi-op6">> PHP 75,000</label><br>

        <h4>Do you any other pets in your household?</h4>
        <input type="radio" id="otherpet-yes" name="otherpet">
        <label for="otherpet-yes">Yes</label><br>
        <input type="radio" id="otherpet-no" name="otherpet">
        <label for="otherpet-no">No</label><br>

        <h4>Do you or any member of your household have known allergies to pet fur or any other allergens commonly found in pet animals?</h4>
        <input type="radio" id="allergens-yes" name="allergens">
        <label for="allergens-yes">Yes</label><br>
        <input type="radio" id="allergens-no" name="allergens">
        <label for="allergens-no">No</label><br>

        <h4>How would your work setup affect your caretaking for your possible new pet?</h4>
        <input type="radio" id="setup-one" name="work-setup">
        <label for="setup-one">Work from Home setup and can take care of pets</label><br>
        <input type="radio" id="setup-two" name="work-setup">
        <label for="setup-two">Work from Home setup, can't take care of pets, but have someone else to attend to them</label><br>
        <input type="radio" id="setup-three" name="work-setup">
        <label for="setup-three">On site setup but someone can attend to pets</label><br>
        <input type="radio" id="setup-four" name="work-setup">
        <label for="setup-four">On site setup with no one to attend to pets</label><br>

        <h4>A processing fee may be imposed by the associated shelter</h4>
        <input type="radio" id="fee-yes" name="fee">
        <label for="fee-yes">Yes, I understand</label><br>
        <input type="radio" id="fee-no" name="fee">
        <label for="fee-no">Not this time</label><br>


        <!--

        Long-term commitment

        -->
    </form>
</body>

</html>