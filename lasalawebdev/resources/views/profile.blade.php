<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="logo">My Profile</div>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="burger-menu" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Profile Content -->
    <section id="about" class="about-section">
        <div class="profile-picture">
            <img src="profile.jpg" alt="Profile Picture" />
        </div>
        <h2>About Me</h2>
        <p class="about-text">
            Hi! I'm John Doe, a web developer with a passion for creating interactive and dynamic websites. I specialize in front-end technologies like HTML, CSS, and JavaScript. 
            <span class="more-text">
                I also have experience with back-end development using Node.js and Python. In my spare time, I love working on open-source projects, reading tech blogs, and learning new programming languages.
            </span>
        </p>
        <button class="show-more-btn" onclick="toggleAboutContent()">Show More</button>
    </section>

    <section id="projects" class="projects-section">
        <h2>Projects</h2>
        <p>Here are some of my recent projects:</p>
        <!-- Add project details here -->
    </section>

    <section id="contact" class="contact-section">
        <h2>Contact</h2>
        <p>You can contact me via email at: johndoe@example.com</p>
    </section>

    <script src="script.js"></script>
</body>
</html>
