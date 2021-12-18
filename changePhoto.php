<style type="text/css">
    body {
        background: #f7f7ff;
        margin-top: 20px;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .me-2 {
        margin-right: .5rem !important;
    }
</style>
<?php
session_start();
include "header.php"; ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <form action="changePT.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $getUserById = $user->getUserById($_GET['user_id']);
                        foreach ($getUserById as $values) : ?>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">User_ID</label>
                                        <input readonly value="<?php echo $values['user_id'] ?>" type="text" id="inputID" class="form-control" name="user_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Image</label>
                                        <!-- <input type="text"  name="fileToUpload" id="inputProjectLeader" class="form-control" -->
                                        <img style="width:50px" src="../img/<?php echo $values['image'] ?>" alt="">
                                        <input type="file" name="image" id="fileToUpload">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" value="Change Photo" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "footer.php" ?>