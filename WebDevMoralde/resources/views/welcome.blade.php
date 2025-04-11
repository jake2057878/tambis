<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Morald's Portfolio</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f7f7f7;
      color: #333;
      font-family: 'Nunito', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Sidenav Style */
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    /* Navbar Customization */
    .navbar-custom {
      background-color: #333;
    }

    .navbar-custom .navbar-nav .nav-link {
      color: white;
    }

    .navbar-custom .navbar-nav .nav-link:hover {
      color: #ddd;
    }

    .navbar-custom a {
      color: white;
      font-size: 1.2em;
      text-decoration: none;
    }

    .navbar-custom a:hover {
      background-color: #555;
      color: white;
    }

    .navbar-header {
      display: flex;
      justify-content: space-between;
      align-items: right;
    }

    .navbar-toggler {
      border: none;
      background: none;
      font-size: 1.5em;
      color: white;
      cursor: pointer;
    }

    /* Hero Section */
    .hero-section {
      background: linear-gradient(135deg, #f06, #f94);
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px;
    }

    .hero-section h1 {
      font-size: 4em;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 1.3em;
      font-weight: 500;
      margin-bottom: 30px;
    }

    .hero-section .btn {
      background-color: #2C3E50;
      color: white;
      font-size: 1.2em;
      padding: 15px 35px;
      border: none;
      border-radius: 30px;
      transition: background-color 0.3s ease;
    }

    .hero-section .btn:hover {
      background-color: #34495E;
    }

    .container {
      max-width: 1100px;
      margin: auto;
    }

    .flex-container {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .flex-container .card {
      background-color: black;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
      border: none;
      margin: 10px;
      width: 280px;
      transition: transform 0.3s ease-in-out;
    }

    .flex-container .card:hover {
      transform: translateY(-10px);
    }

    .card .card-title {
      font-size: 1.5em;
      margin-bottom: 10px;
    }

    /* Media Queries for responsiveness */
    @media (max-width: 768px) {
      .hero-section h1 {
        font-size: 3em;
      }

      .flex-container {
        flex-direction: column;
        align-items: center;
      }

      .card {
        width: 90%;
        margin-bottom: 20px;
      }
    }
  </style>

</head>

<body>

  <!-- Sidenav Section -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#home">Home</a>
    <a href="#about">About Me</a>
    <a href="#contact">Contact</a>
    <a href="#more">More</a>
  </div>

  <!-- Open Sidenav Button -->
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; | JOHN LLOYD G. MORALDE</span>

  <!-- Hero Section -->
  <section class="hero-section" id="home">
    <div class="container flex-container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center text-warning">JOHN LLOYD G. MORALDE</h5>
          <h6> I'm 20 years old</h6>
          <h6>I live in Hinapo Tomas Oppus Southern Leyte</h6>
          <h6>I studied in Southern Leyte State University Bontoc Campus</h6>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center text-primary">MY HOBBIES</h5>
          <p class="card-text">I enjoy spending my time doing the following activities:</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">🎸 Playing Guitar</li>
            <li class="list-group-item">🎮 Playing Online Games</li>
            <li class="list-group-item">🎤 Singing</li>
            <li class="list-group-item">🍿 Watching Movies</li>
          </ul>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center text-success">MY CONTACT</h5>
          <p class="card-text">Feel free to reach out to me:</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">📧 Email: <a href="mailto:johnlloydmoralde16@gmail.com" class="text-decoration-none">johnlloydmoralde16@gmail.com</a></li>
            <li class="list-group-item">📱 Phone: 09305855214</li>
            <li class="list-group-item">💬 FB: <a href="https://www.facebook.com/johnlloydmoralde" class="text-decoration-none">John Lloyd Garvez Moralde</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center text-danger">MORE ABOUT ME!</h5>
          <p></p>
          <!-- Extra About Content (hidden by default) -->
          <div id="aboutExtra" style="display: none;">
            <p>Overthinking is my best talent!.</p>
          </div>
          <!-- Button to toggle extra about content -->
          <button id="toggleAbout" class="btn btn-secondary">Show More</button>
        </div>
      </div>
    </div>
  </section>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom jQuery Scripts -->
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }

    $(document).ready(function(){
      // Toggle the About section content on click
      $("#toggleAbout").click(function(){
        $("#aboutExtra").slideToggle();
        var btnText = $("#toggleAbout").text() === "Show More" ? "Show Less" : "Show More";
        $("#toggleAbout").text(btnText);
      });
    });
  </script>

</body>

</html>
