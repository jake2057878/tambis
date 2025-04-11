<!-- application/modules/users/views/home.php -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Display the number of users -->
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Total Users</h3>
                        </div>
                        <div class="card-body">
                            <p class="lead">
                                Number of Users: <strong><?php echo isset($user_count) ? $user_count : 0; ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
