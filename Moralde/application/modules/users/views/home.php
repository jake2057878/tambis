<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Top Navigation | Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="#" class="navbar-brand">
                <img src="https://via.placeholder.com/40" alt="Logo" class="img-fluid rounded-circle">
                <span class="ml-2">AdminLTE</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Some action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="fas fa-comments"></i>
                            <span class="badge badge-danger">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">Message 1</a>
                            <a href="#" class="dropdown-item">Message 2</a>
                            <a href="#" class="dropdown-item">Message 3</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">See All Messages</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> New messages
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> Friend requests
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> New reports
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">See All Notifications</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content Wrapper -->
        <div class="container mt-4">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Card Title</h5>
                            <p class="card-text">Some example text for the card content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Card Title</h5>
                            <p class="card-text">Another card with different content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special Title</h6>
                            <p class="card-text">This is some supporting text for the card.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special Title</h6>
                            <p class="card-text">This is another supporting text for the card.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-light py-3 mt-4">
            <div class="container">
                <div class="float-right">
                    Anything you want
                </div>
                <strong>&copy; 2021 <a href="https://adminlte.io" target="_blank">AdminLTE.io</a></strong> All rights reserved.
            </div>
        </footer>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
