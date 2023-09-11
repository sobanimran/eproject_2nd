<?php
include('auth.php');
include('header.php');
include('topBar.php');
include('sidebar.php');
include("conn.php")
    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!--add user Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="usrname" type="text" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <span class="email_error"></span>
                            <input id="email" name="usremail" type="email" placeholder="Email ID"
                                class="form-control email_id">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Nu.</label>
                            <input id="phone" name="usrph" type="text" placeholder="Phone Number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input id="pass" name="usrpass" type="password" placeholder="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cpass">confirm Password</label>
                            <input id="cpass" name="usrpass_con" type="password" placeholder="confirm your password"
                                class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--delet user Modal -->



    <div class="modal fade" id="deletModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delet user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="usr_id" class="del_id">
                        <p>
                            Are you sure you want to delet this data ?
                        </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="deletuser" class="btn btn-primary">yes, delet.!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




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
                        <li class="breadcrumb-item active">Registered Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include 'message.php' ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><h3>

                            Registered Users</h3>
                        </h3>
                        <a href="" data-toggle="modal" data-target="#addUserModal"
                            class="btn btn-primary btn-sm float-right">Add users</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qu_up = mysqli_query($con, "select * from users");
                                if (mysqli_num_rows($qu_up) > 0) {
                                    while ($row = mysqli_fetch_array($qu_up)) {
                                        if ($row[5] == 0) {
                                            $role = "user";
                                        } elseif ($row[5] == "1") {
                                            $role = "admin";
                                        } else {
                                            $role = "invalid user ";
                                        }
                                        ;
                                        echo "<tr>
                                        <td>" . $row[1] . "</td>
                                        <td>" . $row[2] . "</td>
                                        <td>" . $row[3] . "</td>
                                        <td>" . $role . "</td>
                                        <td>
                                        <a class='btn btn-info btn-sm' href='update.php?id=" . $row[0] . "'>Edit</a>
                                        <button type='button' value='" . $row[0] . "' class='btn btn-danger deletbtn btn-sm'>DELET</button>
                                        
                                        </td>
                                        
                                        </tr>";
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center">NO RECORD FOUNDED</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<?php include('script.php'); ?>
<script>

    $(document).ready(function () {

        $('.email_id').keyup(function (e) {
            var email = $('.email_id').val();

            console.log(email)
       
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'chk_Emailbtn': 1,
                'email': email,
            },
            success: function (response) {
               if(response == 'Avalible'){
                $('.email_error').text(response).css('color','green');
            }else{
                $('.email_error').text(response).css('color','red');

            }
            }
        })
    })
    });

</script>








<script>
    $(document).ready(function () {
        $('.deletbtn').click(function (e) {
            e.preventDefault();
            var id = $(this).val();
            //console.log(id)
            $('.del_id').val(id);
            $('#deletModal').modal('show');

        })

    })

</script>
<?php include('footer.php'); ?>