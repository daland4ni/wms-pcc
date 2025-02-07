<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="form-container">


        <?php

        $petID = $_GET['petID'] ?? false;

        ?>

        <?php if (isset($_SESSION["username"])): ?>
            <div class="selected-pet">
                <img style="display: block; margin-left: auto; margin-right: auto; width: 30%" src="../pics/logo.jpg"
                    alt="unknown icon" />
                <h3 style="text-align: center">You are logged in as a Rehomer</h3>
                <h4 style="text-align: center">Log out to apply as an adopter</h4>
                <a href="logout.php"><button style="margin-bottom:10px;" class="submit-btn">Logout</button></a>
            </div>
        <?php else: ?>

            <?php if (!$petID): ?>
                <div class="selected-pet">
                    <img style="display: block; margin-left: auto; margin-right: auto; width: 30%" src="../pics/unkown.jpg"
                        alt="unknown icon" />
                    <h3 style="text-align: center">No selected pet as of now</h3>
                    <a href="petProf.php"><button style="margin-bottom:10px;" class="submit-btn">Check our Pet
                            Profiles</button></a><br />
                    <a href="matching.php"><button style="margin-bottom:20px;" class="submit-btn">Match-A-Pet</button></a>
                </div>
            <?php else:
                include '../data/petData.php';
                $petFound = getPetData($petID);
                ?>

                <div class="selected-pet">
                    <img style="display: block; margin-left: auto; margin-right: auto; width: 30%; border-radius:8px;"
                        src="<?= $petFound['img'] ?>" alt="pet pic" />
                    <h3 style="text-align: center">Adopting <?= $petFound['name'] ?></h3>
                </div>



                <hr /><br>
                <h2>Pet Adoption Form</h2>
                <?php if (isset($_GET['error']) && $_GET['error'] === '1') : ?>
                    <p style="color: red;">You have already sent an application to this pet.</p>
                <?php elseif (isset($_GET['error']) && $_GET['error'] === '2') : ?>
                    <p style="color: red;">Another applicant is currently pending for this pet. Try again another time.</p>
                <?php endif; ?>
                <form action="adopt-result.php" method="post">
                    <input type="number" value="<?= $petID ?>" name="petID" hidden>
                    <div class="form-group">
                        <div class="radio-container-row">
                            <label><input type="radio" name="honorific" value="male">Mr.</label>
                            <label><input type="radio" name="honorific" value="female">Ms.</label>
                            <label><input type="radio" name="honorific" value="other">Mx.</label>
                        </div>
                    </div>
                    <div class="form-group-1">
                        <label for="fname">First Name</label>
                        <input required type="text" id="fname" name="fname" placeholder="Enter your first name">
                    </div>
                    <div class="form-group-1">
                        <label for="lname">Last Name</label>
                        <input required type="text" id="lname" name="lname" placeholder="Enter your last name">
                    </div>
                    <div class="form-group-1">
                        <label for="email">Email</label>
                        <input required required type="email" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group-1">
                        <label for="phonenum">Phone Number</label>
                        <input required type="text" id="phonenum" name="phonenum" placeholder="Enter your mobile number">
                    </div>
                    <div class="form-group">
                        <p>Overall Household Income</p>
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
                            <label><input type="radio" name="worksetup" value="2">Work from Home but someone else can attend to
                                pet</label>
                            <label><input type="radio" name="worksetup" value="3">On-site work but someone else can attend to
                                pet</label>
                            <label><input type="radio" name="worksetup" value="4">On-site work with no one else to attend to
                                pet</label>
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

                    <p>Please check:</p>
                    <label><input type="checkbox" value="1" required>  I certify that the information above are factual and that falsification of information is sound for my disqualification.</label>
                    <label><input type="checkbox" value="1" required>  I consent to share my information provided to Pet Connect - Caloocan and to its appropriate rehomer affiliate in accordance to the <a href="https://privacy.gov.ph/data-privacy-act/"><u>Data Privacy Act of 2012</u></a>.</label>
                    <label><input type="checkbox" value="1" required>  I am aware of and understand the responsibilities of a pet owner as detailed by the <a href="https://legacy.senate.gov.ph/republic_acts/ra%209482.pdf"><u>Anti-Rabies Act of 2007</u></a>.</label><br />
                    
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php include 'footer.php';
    unset($_SESSION['msg']) ?>
</body>

</html>