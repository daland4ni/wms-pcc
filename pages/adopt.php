<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon"
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="form-container">
        <h2>Pet Adoption Form</h2>
        <form>
            <div class="form-group">
                <div class="radio-container-row">
                    <label><input type="radio" name="honorific" value="male">Mr.</label>
                    <label><input type="radio" name="honorific" value="female">Ms.</label>
                    <label><input type="radio" name="honorific" value="other">Mx.</label>
                </div>
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Enter your first name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Enter your last name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="phonenum">Phone Number</label>
                <input type="text" id="phonenum" name="phonenum" placeholder="Enter your mobile number">
            </div>
            <div class="form-group">
                <p>Monthly Income</p>
                <div class="radio-container-col">
                    <label><input type="radio" name="monthly" value="1">Less than ₱5,000</label>
                    <label><input type="radio" name="monthly" value="2">₱5,000 to ₱10,000</label>
                    <label><input type="radio" name="monthly" value="3">₱10,001 to ₱30,000</label>
                    <label><input type="radio" name="monthly" value="4">₱30,001 to ₱50,000</label>
                    <label><input type="radio" name="monthly" value="5">₱50,001 to ₱75,000</label>
                    <label><input type="radio" name="monthly" value="6">More than ₱75,000</label>
                </div>
            </div>
            <div class="form-group">
                <p>Do you have any other pets in your household?</p>
                <div class="radio-container-row">
                    <label><input type="radio" name="otherpets" value="yes">Yes</label>
                    <label><input type="radio" name="otherpets" value="no">No</label>
                </div>
            </div>

            <div class="form-group">
                <p>Does anyone in your household have any allergic reaction to animals?</p>
                <div class="radio-container-row">
                    <label><input type="radio" name="allergen" value="yes">Yes</label>
                    <label><input type="radio" name="allergen" value="no">No</label>
                </div>
            </div>
            <div class="form-group">
                <p>How does your work setup affect your pet fostering?</p>
                <div class="radio-container-col">
                    <label><input type="radio" name="worksetup" value="1">Work from Home but can attend to pet</label>
                    <label><input type="radio" name="worksetup" value="2">Work from Home but someone else can attend to pet</label>
                    <label><input type="radio" name="worksetup" value="3">On-site work but someone else can attend to pet</label>
                    <label><input type="radio" name="worksetup" value="4">On-site work with no one else to attend to pet</label>
                    <label><input type="radio" name="worksetup" value="5">Unemployed</label>
                </div>
            </div>
            <div class="form-group">
                <p>What is your residential type?</p>
                <div class="radio-container-col">
                    <label><input type="radio" name="residential" value="1">House is owned</label>
                    <label><input type="radio" name="residential" value="2">In rental with no Pet Restrictions</label>
                    <label><input type="radio" name="residential" value="3">In rental with Pet Restrictions</label>
                </div>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>

</html>