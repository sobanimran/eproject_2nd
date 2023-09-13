<?php

include('auth.php');
include('conn.php');
include('header.php');
include('topBar.php');
include('sidebar.php');
//echo $con;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sl_qu = mysqli_query($con, "SELECT * FROM products where id='$id'");
    if (mysqli_num_rows($sl_qu) > 0) {
        $prod_item = mysqli_fetch_array($sl_qu);





        ?>



        <div class="content-wrapper">
            <section class="content mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php include("message.php") ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        Products - Edit
                                        <a href="product.php" class="btn btn-danger float-right">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" value="<?= $prod_item[0] ?>" name="id" id="">
                                        <input type="hidden" value="<?= $prod_item['image'] ?>" name="old_img1" id="">
                                        <input type="hidden" value="<?= $prod_item['image2'] ?>" name="old_img2" id="">
                                        <input type="hidden" value="<?= $prod_item['image3'] ?>" name="old_img3" id="">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Select Category</label>
                                                    <?php
                                                    $qu = mysqli_query($con, "SELECT * FROM categories");

                                                    if (mysqli_num_rows($qu) > 0) {
                                                        ?>
                                                        <SELEct class="form-control" required name="cate_id">
                                                            <option value="" disabled>Select Category</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($qu)) {
                                                                ?>

                                                                <option value="<?= $row[0] ?>"
                                                                    <?= $prod_item['cat_id'] == $row[0] ? 'selected' : '' ?>>
                                                                    <?= $row[1] ?>
                                                                </option>
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
                                                    <label for="" disabled>Select Brand</label>
                                                    <?php

                                                    $qu = mysqli_query($con, "SELECT * FROM brands");

                                                    if (mysqli_num_rows($qu) > 0) {
                                                        ?>
                                                        <SELEct class="form-control" required name="brn_id">
                                                            <option value="" >Select Brands</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($qu)) {
                                                                ?>

                                                                <option value="<?= $row[0] ?>"
                                                                    <?= $prod_item['brn_id'] == $row[0] ? 'selected' : '' ?>>
                                                                    <?= $row[1] ?>
                                                                </option>
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
                                                    <label for="">VIEW ON</label><br>
                                                  <span class="h5">  view on Slider Cards </span><input <?= $prod_item['view_as']==1?'checked':''?> type="radio" name="view_as_r" value="1" id=""><br>
                                                  <span class="h5">  View ON Filter Card </span><input <?= $prod_item['view_as']==0?'checked':''?> type="radio" name="view_as_r" value="0" id="">

                                                  


                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" name="name" value="<?= $prod_item['name'] ?>"
                                                        class="form-control" required id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Small Description</label>
                                                    <textarea name="small_description" id="" required
                                                        placeholder="Enter Long Description " class="form-control"
                                                        rows="3"> <?= $prod_item['small_des'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Long Description</label>
                                                    <textarea name="long_description" id="" required
                                                        placeholder="Enter Long Description " class="form-control"
                                                        rows="3"> <?= $prod_item['long_des'] ?></textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="text" name="price" value="<?= $prod_item['price'] ?>"
                                                        class="form-control" required id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Offer Price</label>
                                                    <input type="text" name="offerprice" value="<?= $prod_item['offerprice'] ?>"
                                                        class="form-control" required id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Tax</label>
                                                    <input type="text" name="tax" value="<?= $prod_item['tax'] ?>"
                                                        class="form-control" required id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Qantity</label>
                                                    <input type="text" name="qty" class="form-control"
                                                        value="<?= $prod_item['quantity'] ?>" required id="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-sm p-0">Status(Checked=Show|Hide)</label> <br>
                                                    <input type="checkbox" <?= $prod_item['status'] == '0' ? 'checked' : '' ?>
                                                        name="status"> Show/Hode
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-sm p-0">Trending</label> <br>
                                                    <input type="checkbox" <?= $prod_item['trending'] == '1' ? 'checked' : '' ?>
                                                        name="tren"> Active
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                    <img src="img/product/<?= $prod_item['image'] ?>" width="100%"
                                                        height="" alt="">
                                                    </div>
                                                    <div class="col-8">
                                                    <label for="">Upload Image</label>
                                                    <input type="file" name="image1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                    <img src="img/product/<?= $prod_item['image2'] ?>" width="100%"
                                                        height="" alt="">
                                                    </div>
                                                    <div class="col-8">
                                                    <label for="">Upload Image</label>
                                                    <input type="file" name="image2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                    <img src="img/product/<?= $prod_item['image3'] ?>" width="100%"
                                                        height="" alt="">
                                                    </div>
                                                    <div class="col-8">
                                                    <label for="">Upload Image</label>
                                                    <input type="file" name="image3" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" name="product_update" class="btn btn-primary btn-block"
                                                        value="Update">
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

            <?php
    } else {
        $_SESSION['status'] = "NO such record found";
    }
} else {
    $_SESSION['status'] = "something went wrong";
    header("Location:product.php");
    exit(0);

}
?>
</div>






<?php include('script.php'); ?>
<?php include('footer.php'); ?>