<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  
  <!-- Include necessary styles -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card-header {
      background-color: #007bff;
      color: white;
    }
    .btn-edit, .btn-delete {
      margin-right: 10px;
    }
    .modal-header {
      background-color: #007bff;
      color: white;
    }
    .modal-footer .btn {
      border-radius: 0;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card shadow-sm">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Middle Name</th>
                      <th>Address</th>
                      <th>Birthday</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>User Type</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $user): ?>
                      <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->firstname; ?></td>
                        <td><?php echo $user->lastname; ?></td>
                        <td><?php echo $user->middlename; ?></td>
                        <td><?php echo $user->address; ?></td>
                        <td><?php echo $user->birthday; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->gender; ?></td>
                        <td><?php echo $user->usertype; ?></td>
                        <td>
                          <button class="btn btn-warning btn-sm btn-edit" 
                                  data-id="<?php echo $user->id; ?>"
                                  data-firstname="<?php echo $user->firstname; ?>"
                                  data-lastname="<?php echo $user->lastname; ?>"
                                  data-middlename="<?php echo $user->middlename; ?>"
                                  data-address="<?php echo $user->address; ?>"
                                  data-birthday="<?php echo $user->birthday; ?>"
                                  data-email="<?php echo $user->email; ?>"
                                  data-gender="<?php echo $user->gender; ?>"
                                  data-usertype="<?php echo $user->usertype; ?>">
                            <i class="fas fa-edit"></i> Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete" data-id="<?php echo $user->id; ?>">
                            <i class="fas fa-trash"></i> Delete
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables & Plugins -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js?v=3.2.0') ?>"></script>

<!-- Page specific script -->
<script>
  $(function () {
    // Initialize DataTable

  // Edit button click: open the modal and populate it with user data
  $(".btn-edit").click(function () {
    var userId = $(this).data("id");
    var firstname = $(this).data("firstname");
    var lastname = $(this).data("lastname");
    var middlename = $(this).data("middlename");
    var address = $(this).data("address");
    var birthday = $(this).data("birthday");
    var email = $(this).data("email");
    var gender = $(this).data("gender");
    var usertype = $(this).data("usertype");

    // Populate the modal with user data
    $("#editUserId").val(userId);
    $("#editFirstname").val(firstname);
    $("#editLastname").val(lastname);
    $("#editMiddlename").val(middlename);
    $("#editAddress").val(address);
    $("#editBirthday").val(birthday);
    $("#editEmail").val(email);
    $("#editGender").val(gender);
    $("#editUsertype").val(usertype);

    // Show the modal
    $("#editModal").modal("show");
  });

  // Delete button click: open the delete modal and set the delete URL
  $(".btn-delete").click(function () {
    var userId = $(this).data("id");

    // Set the delete confirmation button URL
    $("#deleteConfirmBtn").attr("href", "<?php echo site_url('admin/delete/'); ?>" + userId);

    // Show the delete modal
    $("#deleteModal").modal("show");
  });
});
</script>

<!-- Edit User Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" method="post" action="<?php echo site_url('admin/update'); ?>">
          <input type="hidden" name="id" id="editUserId" />
          <div class="mb-3">
            <label for="editFirstname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="editFirstname" required>
          </div>
          <div class="mb-3">
            <label for="editLastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="editLastname" required>
          </div>
          <div class="mb-3">
            <label for="editMiddlename" class="form-label">Middle Name</label>
            <input type="text" class="form-control" name="middlename" id="editMiddlename" required>
          </div>
          <div class="mb-3">
            <label for="editAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="editAddress" required>
          </div>
          <div class="mb-3">
            <label for="editBirthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" name="birthday" id="editBirthday" required>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="editEmail" required>
          </div>
          <div class="mb-3">
            <label for="editGender" class="form-label">Gender</label>
            <select class="form-select" name="gender" id="editGender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="editUsertype" class="form-label">User Type</label>
            <select class="form-select" name="usertype" id="editUsertype" required>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <a id="deleteConfirmBtn" href="#" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
