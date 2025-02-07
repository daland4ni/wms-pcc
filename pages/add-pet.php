<!-- AERON -->
<!DOCTYPE html>

<html>

<head>
    <title>Adoption Form</title>
    <link rel="stylesheet" href="../css/adopt.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <style>
        .file-upload {
            display: inline-block;
            width: 95%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            background-color: #fff;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .file-upload:hover {
            border-color: #bbb;
            background-color: #f9f9f9;
        }

        /* Hide the default file input */
        input[type="file"] {
            display: none;
        }
    </style>
</head>

<body class="moolah">

    <?php include "nav.php"; ?>

    <div class="form-container">

        <h2>Add New Pet for Adoption</h2>
        <form>
            <div class="form-group">
                <div class="radio-container-row">
                    <label><input type="radio" name="type" value="Dog">Dog</label>
                    <label><input type="radio" name="type" value="Cat">Cat</label>
                </div>
            </div>
            <div class="form-group-1">
                <label for="name">Pet's Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your pet's name">
            </div>
            <div class="form-group-1">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="Enter your pet's age">
            </div>
            <div class="form-group">
                <p>Sex</p>
                <div class="radio-container-row">
                    <label><input type="radio" name="sex" value="Male">Male</label>
                    <label><input type="radio" name="sex" value="Female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <p>Characteristics</p>
                <div class="radio-container-col">
                    <label><input type="checkbox" name="characteristics[]" value="Affectionate">Affectionate</label>
                    <label><input type="checkbox" name="characteristics[]" value="Calm">Calm</label>
                    <label><input type="checkbox" name="characteristics[]" value="Energetic">Energetic</label>
                    <label><input type="checkbox" name="characteristics[]" value="Playful">Playful</label>
                </div>
            </div>

            <div class="form-group-1">
                <label for="description">Pet's Description</label>
                <textarea id="description" name="description" rows="4" cols="50">Describe your pet here</textarea>
            </div><br>

            <div class="form-group-1">
                <label for="img" class="file-upload">
                    Upload your Pet's Image here
                </label>
                <input type="file" name="img" id="img">
            </div><br>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("img").addEventListener("change", function () {
            let fileName = this.files[0] ? this.files[0].name : "Choose a file";
            document.querySelector(".file-upload").textContent = fileName;
        });
    </script>
</body>

</html>