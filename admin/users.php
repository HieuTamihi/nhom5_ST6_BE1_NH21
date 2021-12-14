<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Users</h3>

        <div class="card-tools">
        <a class="btn  btn-sm bg-green" href="addUser.php">
            <i class="fas fa-plus"></i>
            Add
          </a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 15%">
                User_ID
              </th>
              <th style="width: 28%">
                Username
              </th>
              <th style="width: 28%">
                Password
              </th>
              <th style="width: 15%">
                Role_ID
              </th>
              <th style="width: 14%">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $user = $user->getAllUserDESC();
            foreach ($user as $value) :
            ?>
              <tr>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['password'] ?></td>
                <td><?php echo $value['role_id'] ?></td>
              
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="editUser.php?user_id=<?php echo $value['user_id'];?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="deleteU.php?user_id=<?php echo $value['user_id'];?>">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.php" ?>