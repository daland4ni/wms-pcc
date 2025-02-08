<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Connect - Caloocan</title>
    <link rel="icon" href="../pics/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D1BDC7;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .hero img {
            width: 100%;
            max-width: 350px;
        }

        .hero h1 {
            font-size: 40px;
            color: white;
        }

        .hero .subt {
            font-size: 20px;
            color: white;
            margin-bottom: 20px;
        }

        .hero .buttons a button {
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #3C5190;
            background-color: #D9D9D9;
            border: none;
            border-radius: 8px;
            margin: 5px;
            cursor: pointer;
        }

        .featured-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            padding: 20px;
        }

        .featured-container div {
            background-color: #F5F5F5;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
        }

        .featured-container img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .why-adopt {
            background-color: #EAD8E6;
            padding: 30px;
            text-align: center;
        }

        .why-adopt h1 {
            font-size: 30px;
            color: #3C5190;
        }

        .why-adopt p {
            font-size: 16px;
            color: #4F4F4F;
            line-height: 1.5;
        }

        .testimonial-container {
            background-color: #d6c1d6;
            padding: 20px;
        }

        .testimonial-box {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px auto;
            text-align: center;
            max-width: 90%;
        }

        .testimonial-box img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .testimonial-box p {
            font-size: 14px;
            font-style: italic;
            color: #26488c;
        }

        @media (max-width: 768px) {
            .nav-right {
                display: none;
            }

            .menu-icon {
                display: block;
                font-size: 24px;
                margin-right: 3vh;
                cursor: pointer;
                color: beige;
                /* TEMPORARY: Helps check visibility */
                padding: 10px;
                /* TEMPORARY: Increases tap area */
            }
        }
    </style>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container">
        <div class="hero">
            <img src="../pics/CatDogLogo.png" alt="Pet Logo">
            <div class="text">
                <h1>Hi Pet Lover!</h1>
                <h3 class="subt">Find your furry pet today</h3>
                <div class="buttons">
                    <a href="petProf.php"><button>Explore Pets</button></a>
                    <a href="adopt.php"><button>Start Adopting</button></a>
                </div>
            </div>
        </div>

        <h2>Featured Pets</h2>
        <div class="featured-container">
            <div><img src="../pics/Cats/C1.jpg" alt="Kuting">
                <p>Kuting</p>
            </div>
            <div><img src="../pics/Dogs/D1.jpg" alt="Katriona">
                <p>Katriona</p>
            </div>
            <div><img src="../pics/Cats/C2.jpg" alt="Nuggets">
                <p>Nuggets</p>
            </div>
            <div><img src="../pics/Dogs/D2.jpg" alt="Pua">
                <p>Pua</p>
            </div>
        </div>

        <div class="why-adopt">
            <h1>Why Adopt?</h1>
            <p>Adopting a pet provides a loving home to an animal in need, giving it a second chance at happiness and
                security.</p>
            <a href="adopt.php"><button>Adopt Now!</button></a>
        </div>

        <div class="testimonial-container">
            <h2>Testimonials</h2>
            <div class="testimonial-box">
                <img src="../pics/PetnMe/testimony1.jpg" alt="Testimonial 1">
                <p>"Bringing Sonny O. home was life-changing! The process was easy, and the team truly cares."</p>
            </div>
            <div class="testimonial-box">
                <img src="../pics/PetnMe/testimony2.jpg" alt="Testimonial 2">
                <p>"Kuting has filled our home with love and laughter!"</p>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>