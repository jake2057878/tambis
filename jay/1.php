<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburger Menu Toggle</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
            height: 100vh;
            animation: backgroundAnimation 15s ease infinite;
        }

        /* Background animation */
        @keyframes backgroundAnimation {
            0% {
                background-color: #f4f4f4;
            }
            50% {
                background-color: #1e90ff;
            }
            100% {
                background-color: #f4f4f4;
            }
        }

        /* Hamburger button style */
        .hamburger {
            font-size: 30px;
            cursor: pointer;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            display: block;
            position: absolute;
            top: 20px;
            left: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        .hamburger:hover {
            background-color: #0056b3;
            transform: rotate(90deg);
        }

        /* Navigation menu */
        .nav-menu {
            display: none;
            background-color: #333;
            position: absolute;
            top: 0;
            right: 0;
            width: 250px;
            height: 100%;
            text-align: center;
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .nav-menu.open {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }

        .nav-menu ul {
            list-style: none;
            padding-top: 60px;
        }

        .nav-menu ul li {
            margin: 20px 0;
        }

        .nav-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .nav-menu ul li a:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        /* Content sections */
        .content {
            display: none;
            margin-top: 100px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            animation: slideInLeft 0.5s ease-out;
        }

        .content p {
            margin: 10px 0;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }

        @media (min-width: 768px) {
            .hamburger {
                display: none;
            }

            .nav-menu {
                display: block;
                position: static;
                width: auto;
                height: auto;
                padding: 0;
                background-color: block;
                text-align: left;
                opacity: 1;
                transform: none;
            }

            .nav-menu ul li {
                display: inline-block;
                margin-right: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Hamburger button -->
    <div class="hamburger" id="hamburger">&#9776;</div>

    <!-- Navigation menu -->
    <nav class="nav-menu" id="navMenu">
        <ul>
            <li><a href="#" id="homeLink">Home</a></li>
            <li><a href="#" id="aboutLink">About</a></li>
            <li><a href="#" id="projectLink">Project</a></li>
            <li><a href="#" id="contactLink">Contact</a></li>
        </ul>
    </nav>

    <!-- Content Sections -->
    <div id="homeContent" class="content">
        <h1>Welcome to My World</h1>
        <p>This is the home section. It will display some basic information.</p>
        <button>Learn More</button>
    </div>

    <div id="aboutContent" class="content">
        <h1>About Us</h1>
        <p>This section describes what we do and our mission.</p>
    </div>

    <div id="projectContent" class="content">
        <h1>Our Projects</h1>
        <p>This section showcases the projects we've worked on.</p>
    </div>

    <div id="contactContent" class="content">
        <h1>Contact Us</h1>
        <p>This section will provide contact details for reaching out.</p>
    </div>

    <script>
        // Get elements
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');
        const homeContent = document.getElementById('homeContent');
        const aboutContent = document.getElementById('aboutContent');
        const projectContent = document.getElementById('projectContent');
        const contactContent = document.getElementById('contactContent');
        
        const homeLink = document.getElementById('homeLink');
        const aboutLink = document.getElementById('aboutLink');
        const projectLink = document.getElementById('projectLink');
        const contactLink = document.getElementById('contactLink');

        // Toggle the menu open/close
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('open');
        });

        // Show content when a menu link is clicked
        homeLink.addEventListener('click', () => {
            showContent(homeContent);
        });

        aboutLink.addEventListener('click', () => {
            showContent(aboutContent);
        });

        projectLink.addEventListener('click', () => {
            showContent(projectContent);
        });

        contactLink.addEventListener('click', () => {
            showContent(contactContent);
        });

        function showContent(content) {
            // Hide all content sections
            homeContent.style.display = 'none';
            aboutContent.style.display = 'none';
            projectContent.style.display = 'none';
            contactContent.style.display = 'none';

            // Show the selected content
            content.style.display = 'block';

            // Close the menu after selecting a section
            navMenu.classList.remove('open');
        }
    </script>

</body>
</html>
