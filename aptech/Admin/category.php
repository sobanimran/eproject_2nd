<?php

include('auth.php');
include('conn.php');
include('header.php');
include('topBar.php');
include('sidebar.php');
//echo $con;
?>
<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gift Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea id="" class="form-control" required name="description" rows="3"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">Trending
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">Status
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="category_save" class="btn btn-primary">Save </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--modal end -->



<div class="content-wrapper">
    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include("message.php") ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Gift Category
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#categoryModal">Add</a>
                            </h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table  table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>TREANDING</th>
                                        <th>STATUS</th>
                                        <th>CREATED AT</th>
                                        <th>EDITH</th>
                                        <th>DELETE</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $sl_qu = mysqli_query($con, "SELECT * FROM categories");
                                    if (mysqli_num_rows($sl_qu) > 0) {
                                        foreach ($sl_qu as $row) {
                                            // echo $row['id'];
                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $row['id']; ?>
                                                </td> <!-- alternative way ?= insted of php echo -->
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <input type="checkbox" disabled name="" id="" <?php echo $row['trending'] == '1' ? 'Checked' : ''; ?>>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="" readonly id="" <?php echo $row['status'] == '1' ? 'checked' : ''; ?>> <?php echo $row['status'] == '1' ? 'Active' : 'Deactive'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['created_at']; ?>
                                                </td>
                                                <td>
                                                    <a href="category_edit.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" value=" <?= $row['id']; ?>" name="cate_id" id="">
                                                        <button class="btn btn-danger btn-sm" name="cate_del_btn" type="submit">Delete</button>
                                                    </form>
                                                    

                                                </td>

                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
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
    </section>


</div>
<?php include('script.php'); ?>
<?php include('footer.php'); ?>