<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Connect - Caloocan</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <style>
        /* Footer Styling */
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }

        .footer-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 90%;
            margin: auto;
        }

        .footer-section {
            width: 100%;
            margin-bottom: 15px;
        }

        .footer-section h2 {
            font-size: 16px;
            margin-bottom: 8px;
            border-bottom: 2px solid #1abc9c;
            display: inline-block;
            color: beige;
        }

        .footer-section p {
            font-size: 14px;
            margin: 5px 0;
        }

        a[href^="mailto:"], .footer-section.legal p a {
            color: #1abc9c;
            text-decoration: none;
            font-weight: bold;
        }

        a[href^="mailto:"]:hover, .footer-section.legal p a:hover {
            color: #e74c3c;
            text-decoration: underline;
        }

        .footer-bottom {
            font-size: 12px;
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .soc-pic {
            height: 40px;
            width: 40px;
            margin: 5px;
        }

        @media (min-width: 600px) {
            .footer-container {
                flex-direction: row;
                justify-content: space-around;
            }

            .footer-section {
                width: auto;
                min-width: 200px;
                text-align: left;
            }

            .footer-bottom {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <nav>
        <!-- nav -->
    </nav>
    <main>
        <!-- Main content goes here -->
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>We are dedicated to connecting loving families with pets in need. Adopt, foster, or volunteer today to make a difference in a pet’s life.</p>
            </div>

            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <p>Email: <a href="mailto:petConnect@gmail.com">petConnect@gmail.com</a></p>
                <p>Phone: (123) 456-7890</p>
            </div>

            <div class="footer-section legal">
                <h2>Legal</h2>
                <p>Learn more about responsible pet ownership:</p>
                <p><a href="https://legacy.senate.gov.ph/republic_acts/ra%209482.pdf" target="_blank">Anti-Rabies Act of 2007</a></p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Pet Connect - Caloocan. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
