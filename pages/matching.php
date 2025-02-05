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
                <label>What do you want, a cat or a dog?</label><br>
                <select name="petType" required>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                </select>
            </div>
            <div class="question">
                <label>Do you have a desired age for your pet?</label><br>
                <select name="petAge" required>
                    <option value="<1">&lt; 1 year old</option>
                    <option value="1-2">1 - 2 years old</option>
                    <option value="3+">3+ years old</option>
                    <option value="any">Any age would do</option>
                </select>
            </div>
            <div class="question">
                <label>How about your pet's breed?</label><br>
                <input type="text" name="petBreed">
            </div>
            <div class="question">
                <label>Select the personalities you wish to see in your pet.</label><br>
                <input type="checkbox" name="personality[]" value="Playful"> Playful<br>
                <input type="checkbox" name="personality[]" value="Calm"> Calm<br>
                <input type="checkbox" name="personality[]" value="Energetic"> Energetic<br>
                <input type="checkbox" name="personality[]" value="Affectionate"> Affectionate<br>
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