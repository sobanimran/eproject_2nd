<?php
session_start();
include('header.php');

include("conn.php");
if (isset($_SESSION['auth'])) {
    $_SESSION['status'] = "You  are already logged In";
    header("location: index.php");
    exit(0);
}
?>

<div class="section mb-5">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
                <div class="card my-5">
                    <?php
                    if (isset($_SESSION['authstatus'])) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show " role="alert">
                            <strong>Hey!</strong>
                            <?php echo $_SESSION['authstatus']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <?php
                        unset($_SESSION['authstatus']);
                    }
                    ?>
                    <?php include("message.php") ?>
                    <div class="card-header bg-light">
                        <h5 class="my-2">Login Form</h5>
                    </div>
                    <div class="card-body my-4 ">
                        <form action="logincode.php" method="POST">
                            <table>
                                <div class="form-group">
                                    <tr>
                                        <td> <label for="email">Email Id</label></td>
                                        <td><input type="email" name="email" id="email"></td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td><label for="pass">Password</label></td>

                                        <td> <input type="password" name="password" id="pass"></td>
                                    </tr>
                                </div>
                            </table>
                            <hr>
                            <div class="form-group mt-5">
                                <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('script.php'); ?>
<?php include('footer.php'); ?>