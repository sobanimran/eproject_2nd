<?php


include('auth.php');
include('header.php');
include('topBar.php');
include('sidebar.php');
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qu = mysqli_query($con, "select * from users where id='$id'");
    $row = mysqli_fetch_array($qu);
    ;
}
;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Registered Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit - Registered Users</h3>
                        <a href="registered.php" class="bt btn-danger btn-sm float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="code.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" value="<?php echo $row[0] ?>" name="usrid" id="">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="usrname" class="form-control"
                                                value="<?php echo $row[1] ?>" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Id</label>
                                            <input type="email" name="usremail" class="form-control"
                                                value="<?php echo $row[2] ?>" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Nu.</label>
                                            <input type="number" name="usrph" class="form-control"
                                                value="<?php echo $row[3] ?>" id="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" name="usrpass" class="form-control"
                                                value="<?php echo $row[4] ?>" id="pass">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Give Role</label>
                                            <select name="role" class="form-control" id="" required>
                                                <option value="">Select</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateuser" class="btn btn-info">update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
  




</div>
<?php include('script.php'); ?>
<?php include('footer.php'); ?>