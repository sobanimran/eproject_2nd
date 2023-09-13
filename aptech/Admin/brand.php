<?php

include('auth.php');
include('conn.php');
include('header.php');
include('topBar.php');
$pagname='brand';
include('sidebar.php');
?>

<!-- add Modal -->
<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD BRAND</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="code.php" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Brand Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea id="" class="form-control" required name="description" rows="3"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Brand Image</label>
                        <input type="file" name="brand_img">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="brand_save" class="btn btn-primary">Save </button>
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
                                Brands
                                <a href="#" class="btn btn-primary float-right"data-toggle="modal"
                                    data-target="#brandModal" >Add</a>
                            </h4>
                        </div> 
                        <div class="card-body">
                        <table class="table  table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        
                                        <th>CREATED AT</th>
                                        <th>EDITH</th>
                                        <th>DELETE</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    $sl_qu = mysqli_query($con, "SELECT * FROM brands");
                                    if (mysqli_num_rows($sl_qu) > 0) {
                                        foreach ($sl_qu as $row) {
                                            // echo $row['id'];
                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $row['brn_id']; ?>
                                                
                                                </td> <!-- alternative way ?= insted of php echo -->
                                                <td>
                                                    <?php echo $row['brn_name']; ?>
                                                </td>
                                                <td>
                                                   <img src="<?='img/brands/'.$row['brn_img']; ?>" width="100px" height="100px" alt="brand logo">
                                                </td>
                                                <td>
                                                <?= $row['brn_desc']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['creat_at']; ?>
                                                </td>
                                                <td>
                                                    <a href="brand_edit.php?id=<?= $row['brn_id'] ?>"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" value=" <?= $row['brn_id']; ?>" name="brn_id" id="">
                                                        <button class="btn btn-danger btn-sm" name="brn_del_btn" type="submit">Delete</button>
                                                    </form>
                                                    

                                                </td>

                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No Record Found</td>
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