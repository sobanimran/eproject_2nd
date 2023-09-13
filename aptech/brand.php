<?php include 'header.php'; ?>
<?php include('main_product_z@.php'); ?>


<section class="bg0 p-t-23 p-b-30">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $qu1 = "SELECT * FROM `products` WHERE brn_id='$id' and view_as='1' ORDER BY rand()";
        $qu2 = "SELECT * FROM `products` WHERE brn_id='$id' and view_as='0' ORDER BY rand()";
      
      
            getcards($qu1, $qu2);
      
    }

    ?>
</section>








<?php include 'productQuickview.php' ?>
<!-- Footer -->
<?php include 'script.php' ?>
<?php include 'footer.php' ?>