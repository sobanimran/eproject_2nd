<?php

include('auth.php');
include('conn.php');
include('header.php');
include('topBar.php');
include('sidebar.php');
//echo $con;
?>



<div class="content-wrapper bg-light">
    <section class="content mt-4">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <?php include("message.php") ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Gift Products - ADD
                                <a href="product.php" class="btn btn-danger float-right">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="post" enctype="multipart/form-data">


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Select Category</label>
                                            <?php
                                            $qu = mysqli_query($con, "SELECT * FROM categories WHERE status=1");

                                            if (mysqli_num_rows($qu) > 0) {
                                                ?>
                                                <SELEct class="form-control" required name="cate_id">
                                                <option value="" selected disabled>Select Category</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($qu)) {
                                                        ?>

                                                        <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                    <?php } ?>

                                                </SELEct>
                                                <?PHP
                                            }
                                            ;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Select Brand</label>
                                            <?php
                                            $qu = mysqli_query($con, "SELECT * FROM brands ");

                                            if (mysqli_num_rows($qu) > 0) {
                                                ?>
                                                <SELEct required class="form-control" name="brn_id">
                                                <option value="" selected disabled>Select Brand</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($qu)) {
                                                        ?>

                                                        <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                    <?php } ?>

                                                </SELEct>
                                                <?PHP
                                            }
                                            ;
                                            ?>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">VIEW ON</label>
                                           
                                          
                                                <SELEct required class="form-control" name="view_as">
                                                <option value="" selected disabled>Select   </option>
                                                <option value="1"  >view on Slider Cards</option>
                                                <option value="0"  >View ON Filter Cards</option>
                                                </SELEct>
                                            
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Small Description</label>
                                            <textarea name="small_description" id="" required
                                                placeholder="Enter Long Description " class="form-control"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long Description</label>
                                            <textarea name="long_description" id="" required
                                                placeholder="Enter Long Description " class="form-control"
                                                rows="3"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" name="price" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Offer Price</label>
                                            <input type="text" name="offerprice" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tax</label>
                                            <input type="text" name="tax" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Qantity</label>
                                            <input type="text" name="qty" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-sm p-0">Status(Checked=Show|Hide)</label> <br>
                                            <input type="checkbox" name="status">Show / Hide
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="text-sm p-0">Trending</label> <br>
                                            <input type="checkbox" name="tren"> Active
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ayb" class="form-label">Upload Image1</label>
                                            <input  type="file"  id="ayb" required name="image1" class="p-0  form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ayb" class="form-label">Upload Image2</label>
                                            <input  type="file"  id="ayb" required name="image2" class="p-0  form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="ayb" class="form-label">Upload Image3</label>
                                            <input  type="file"  id="ayb" required name="image3" class="p-0  form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="form-group">
                                            <label for="">Click to Save</label>
                                            <input type="submit" name="product_save" class="btn btn-primary btn-block"
                                                value="save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>







<?php include('script.php'); ?>
<?php include('footer.php'); ?>