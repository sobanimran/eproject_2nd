<?php
include('auth.php');
include('conn.php');
include('header.php');
include('topBar.php');
$pagname='product';
include('sidebar.php');
//echo $con;
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
                                Gift Products
                                <a href="product_add.php" class="btn btn-primary float-right" >Add</a>
                            </h4>
                        </div> 
                        <div class="card-body table-responsive">
                            <table  id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>IMAGE</th>
                                        <th>PRICE</th>
                                        <th>Qty</th>
                                        <th>STATUS</th>
                                        <th>CREATED AT</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                      
                                        
                                    </tr>

                                </thead>
                                <tbody>
                                   <?php
                                  $sl_qu_product = mysqli_query($con, "SELECT * FROM products  ORDER BY id DESC ");
                                    if (mysqli_num_rows($sl_qu_product) > 0) {
                                        foreach ($sl_qu_product as $row) {
                                           
                                            ?>

                                            <tr>
                                                <td>
                                                     <?= $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <img src="img/product/<?php echo $row['image']; ?>" width="100px" height="100px" alt="<?php echo $row['name']; ?>">
                                                    
                                                </td>
                                                <td>
                                                    <?php echo $row['price']; ?>
                                                </td>
                                               
                                                <td>
                                                    <?php echo $row['quantity']; ?>
                                                </td>
                                               
                                                <td>
                                                    <input type="checkbox" name="" readonly id="" <?php echo $row['status'] == '0' ? 'checked' : ''; ?>>Show
                                                </td>
                                                <td>
                                                    <?php echo $row['created_at']; ?>
                                                </td>
                                                <td>
                                                    <a href="product-edit.php?id=<?= $row['id'] ?>"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                                
                                                <td>
                                                    
                                                        <form action="code.php" method="post">
                                                            <input type="hidden" value="<?= $row['id']?>"  name="id" id="">
                                                            <input type="submit" name="product_del" id=""
                                                            class="btn btn-danger btn-sm"value="Delete">
                                                        </form>
                                                         
                                                </td>
                                                

                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7" align='center'>No Record Found</td>
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