
<?php
    include './header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winzelle International College Inc.</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables for a consistent color theme */
        :root {
            --primary-color: #884a02;
            --secondary-color: #fcb75e;
            --text-dark: #333333;
            --text-light: #774103;
            --bg-light: #fde6cf;
            --white: #ffffff;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            font-family: 'Poppins', sans-serif;
            background: var(--white);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* NAVIGATION BAR */
        .navbar {
            position: fixed;
            margin: 20px;
            border-radius: 20px;
            border: solid var(--secondary-color) 1px;
            top: 0;
            width: 70rem;
            background: rgba(211, 85, 1, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--primary-color);
            text-shadow: var(--bg-light);
            font-weight: 600;
            font-size: 16px;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--secondary-color);

        }

        .nav-cta {
            background: var(--primary-color);
            color: var(--white) !important;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .nav-cta:hover {
            background: var(--secondary-color);
            color: var(--primary-color) !important;
        }

        /* HERO SECTION */
        .hero {
            height: 100vh;
            /* Added a linear gradient overlay to make text readable over any image */
            background: linear-gradient(rgba(32, 17, 0, 0.46), rgba(0, 0, 0, 0.84)), url('assets/image/wic.edu.ph.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
            text-align: start;
            color: var(--white);
            padding: 0 20px;
        }

        .hero h1 {

            font-size: clamp(30px, 5vw, 65px);
            font-family: "DM Serif Text", serif;
            font-weight: 700;
            animation: fadeInDown 1s ease-out;
        }

        .hero p {
            font-size: clamp(18px, 2vw, 34px);
            font-family: "Lobster Two", sans-serif;
            font-weight: 400;
            font-style: italic;
            font-weight: 100;
            text-align: start;
            max-width: 800px;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 0.5s both;
        }



        /* CONTENT SECTIONS */
        .section {
            padding: 100px 50px;
            text-align: center;
        }

        .section-title {
            font-size: 36px;
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .section-subtitle , .values-list li{
            color: var(--text-light);
            font-size: 18px;
            margin-bottom: 50px;
        }

        .bg-light {
            background-color: var(--bg-light);
        }

        /* GRID LAYOUT FOR CARDS */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            text-align: left;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(65, 30, 1, 0.1);
        }

        .card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 24px;
        }

        .card p {
            color: var(--text-light);
            font-size: 20px;
        }


        /* Logo */

        .brand-wrapper {
            display: flex;
            align-items: center;
        }

        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 15px;
            transition: all 0.3s ease;
        }

        /* The "Shield" Icon */
        .logo-icon {
            width: 45px;
            height: 45px;
            background-color: var(--primary-color);
            border: 1px solid var(--secondary-color);
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo-icon span {
            color: var(--secondary-color);
            font-size: 20px;

            font-weight: 800;
            font-family: 'serif';
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .college-name {
            font-family: "DM Serif Text", serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-color);
            letter-spacing: 1px;
            line-height: 1;
        }

        .college-tagline {
            font-size: 10px;
            text-transform: uppercase;
            color: var(--secondary-color);
            letter-spacing: 2px;
            margin-top: 4px;
            font-weight: 500;
        }

        /* Interaction: Subtle lift on hover */
        .logo-link:hover {
            transform: translateY(-2px);
        }

        .logo-link:hover .logo-icon {
            background-color: var(--primary-color)
        }

        .logo-link:hover .logo-icon span {
            color: var(--secondary-color)
        }
        .object-image {
            position: absolute;
            right: 3%;
            bottom: 6%;
            width: 550px;
            z-index: 5;
            animation: float 5s ease-in-out infinite;
        }

        .object-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        .object-image2 {
            position: relative;
            right: 30%;
            bottom: 10%;
            width: 500px;
            z-index: 5;
            animation: float 5s ease-in-out infinite;
            /* filter: drop-shadow(0 20px 30px rgba(255, 255, 255, 0.01)); */
        }
        .object-image2 img {
            width: 100%;
            height: auto;
            display: block;
        }
        .object-image3 {
            position: relative;
            right: 1%;
            bottom: 10%;
            width: 500px;
            z-index: 5;
            animation: float 5s ease-in-out infinite;
        }
        .object-image3 img {
            width: 100%;
            height: auto;
            display: block;
        }

        .category-label {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            font-size: 28px;
            margin: 0px 0 20px 0;
            text-align: left;
            display: inline-block;
        }





        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(2deg);
                /* Moves up and tilts slightly */
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }


        /* ANIMATIONS */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {

            .object-image3,
            .object-image2 {
                display: none;
            }


            .object-image {
                width: 300px;
                right: 3%;
            }

            .navbar {
                padding: 10px 20px;
                width: 80rem;
                flex-direction: column;
                gap: 10px;
                border: solid var(--secondary-color) 1px;
            }

            .btn

            .nav-links {
                flex-wrap: nowrap;
                justify-content: center;
                gap: 12px;

            }

            .nav-links a {
                font-size: 12px;
            }

            .section {
                padding: 60px 10px;
            }

            .hero h1 {
                font-size: 45px;
            }

            .hero p {
                font-size: 30px;
            }

        }
    </style>
</head>

<body>

    <div style="width: 100%; display: flex; justify-content: center; align-items: center; border-radius: 50px;">
        <nav class="navbar">
            <div class="brand-wrapper">
                <a href="./" class="logo-link">
                    <div class="logo-icon">
                        <span>WIC</span>
                    </div>

                    <div class="logo-text">
                        <span class="college-name">WINZELLE</span>
                        <span class="college-tagline">International College</span>
                    </div>
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="./">Home</a></li>
                <li><a href="./">About Us</a></li>
                <li><a href="./">Academics</a></li>
                <li><a href="./">Admissions</a></li>
                <li><a href="./" class="nav-cta" >Enroll Now</a></li>
            </ul>
        </nav>
    </div>

    <section class="hero">
        <h1>Winzelle International College</h1>
        <p>Your Key To Sucess</p>
        <a href="./" class="nav-cta" data-bs-toggle="modal" data-bs-target="#exampleModal" >Courses Offered</a>

        <div class="object-image">
            <img src="./assets/image/wic.edu.ph/wic.png" alt="WIC Success" />
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">Why Choose WIC?</h2>
        <p class="section-subtitle, .values-list li">We provide a world-class educational experience tailored to your success.</p>

        <div class="grid-container">
            <div class="object-image2">
                <img src="./assets/image/wic.edu.ph/robot-wic.png" alt="WIC Success" />
            </div>
            <div class="card">
                <h3>Global Standards</h3>
                <p>Our curriculum is designed to meet international standards, ensuring our graduates are competitive anywhere in the world.</p>
            </div>
            <div class="card">
                <h3>Expert Faculty</h3>
                <p>Learn from industry professionals and experienced academics dedicated to your personal and professional growth.</p>
            </div>
            <div class="card">
                <h3>Modern Facilities</h3>
                <p>Experience hands-on learning in our state-of-the-art laboratories, libraries, and interactive classrooms.</p>
            </div>

            <div class="card">
                <h3>Industry Partnerships</h3>
                <p>Gain exclusive access to our vast network of corporate partners for internships, seminars, and direct placement opportunities upon graduation.</p>
            </div>
            <div class="object-image3">
                <img src="./assets/image/wic.edu.ph/career.gif" alt="WIC Success" />
            </div>

        </div>
    </section>

    <section class="section bg-light">
        <h2 class="section-title">Institutional Identity</h2>
        <p class="section-subtitle, .values-list li">Defining the future of education at Winzelle International College</p>

        <div class="grid-container">
            <div class="card mission-card">
                <div class="card-icon"></div>
                <h3>Our Mission</h3>
                <p>To provide accessible, high-quality international education that empowers students with technical expertise and moral integrity, preparing them to become globally competitive professionals and leaders in their chosen fields.</p>
            </div>

            <div class="card vision-card">
                <div class="card-icon"></div>
                <h3>Our Vision</h3>
                <p>To be a premier international institution recognized for excellence in holistic education, innovative research, and the development of socially responsible citizens who drive positive change in the global community.</p>
            </div>

            <div class="card values-card">
                <div class="card-icon"></div>
                <h3>Core Values</h3>
                <ul class="values-list">
                    <li><strong>Excellence:</strong> Striving for the highest standards in all academic pursuits.</li>
                    <li><strong>Integrity:</strong> Upholding honesty and ethics in character and practice.</li>
                    <li><strong>Innovation:</strong> Embracing new technologies and creative problem-solving.</li>
                    <li><strong>Service:</strong> Commitment to the welfare of the community and the nation.</li>
                </ul>
            </div>
        </div>
    </section>

</body>

</html>