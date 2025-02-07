<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Match-A-Pet</title>
    <link rel="stylesheet" href="../css/matching.css">
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="container">
        <form id="petForm" action="matches.php" method="POST">
            <div class="question active">
                <h2>What pet do you prefer?</h2><br>
                <select id="toggleSelect" name="petType">
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                </select>
            </div>
            <div class="question">
                <h2>Do you have a desired age for your pet?</h2><br>
                <select name="petAge">
                    <option value="<1">&lt; 1 year old</option>
                    <option value="1-2">1 - 2 years old</option>
                    <option value="3+">3+ years old</option>
                    <option value="any">Any age would do</option>
                </select>
            </div>
            <div class="question">
                <h2>Do you have a desired age for your pet?</h2><br>
                <?php
                include "../data/petData.php";
                $catBreeds = getPetBreeds("Cat");
                $dogBreeds = getPetBreeds("Dog");
                ?>
                <select name="petBreed">
                    <option value="">Any breed is fine</option>
                    <div id="catOptions">
                        <optgroup label="CAT BREEDS">
                            <?php foreach ($catBreeds as $breed): ?>
                                <option value="<?= $breed ?>"><?= $breed ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </div>
                    <div id="dogOptions">
                        <optgroup label="DOG BREEDS">
                            <?php foreach ($dogBreeds as $breed): ?>
                                <option value="<?= $breed ?>"><?= $breed ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </div>
                </select>
            </div>
            <div class="question">
                <div class="chk-box">
                    <h2>Select the personalities you wish to see in your pet.</h2><br>
                    <label><input type="checkbox" name="personality[]" value="Playful"> Playful</label>
                    <label><input type="checkbox" name="personality[]" value="Calm"> Calm</label>
                    <label><input type="checkbox" name="personality[]" value="Energetic"> Energetic</label>
                    <label><input type="checkbox" name="personality[]" value="Affectionate"> Affectionate</label>
                </div>
            </div>
            <button type="button" id="backBtn" style="display: none;">Back</button>
            <button type="button" id="nextBtn">Next</button>
            <button type="submit" id="submitBtn" style="display: none;">Submit</button>
        </form>
    </div>

    <script>
        let currentStep = 0;
        const questions = document.querySelectorAll('.question');
        const nextBtn = document.getElementById('nextBtn');
        const backBtn = document.getElementById('backBtn');
        const submitBtn = document.getElementById('submitBtn');

        nextBtn.addEventListener('click', () => {
            questions[currentStep].classList.remove('active');
            currentStep++;
            questions[currentStep].classList.add('active');
            backBtn.style.display = 'inline-block';
            if (currentStep === questions.length - 1) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-block';
            }
        });

        backBtn.addEventListener('click', () => {
            questions[currentStep].classList.remove('active');
            currentStep--;
            questions[currentStep].classList.add('active');
            nextBtn.style.display = 'inline-block';
            submitBtn.style.display = 'none';
            if (currentStep === 0) {
                backBtn.style.display = 'none';
            }
        });
    </script>

</body>