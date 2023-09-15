<?php include 'header.php'; ?>
<?php include('main_product_z@.php'); ?>


<section class="bg0 p-t-23 p-b-30">
	<!-- breadcrumb -->

	<?php
	 if(isset($_POST['filter_btn'])){
        $id = $_GET['id'];
        $filt_val= $_POST['filter_value'];
        $qu=mysqli_query($con,"SELECT * FROM products WHERE   concat(name,small_des,long_des) LIKE '%$filt_val%'; ");
        if ($filt_val != "") {
        if(mysqli_num_rows($qu)>0){
            
        
            $qu1="SELECT * FROM products
            WHERE  cat_id='$id' AND view_as=1 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
            $qu2="SELECT * FROM products
            WHERE  cat_id='$id' AND  view_as=0 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
            
            getcards($qu1,$qu2);}else{
                echo	"<h2 class='text-center text-danger'> no product found  </h2>";
                }	
        
        }else{
            echo	"<h2 class='text-center text-danger'> kindly fill input field search field is empty or refresh the page  </h2>";
            }

   
      
      
      
    }
	 if(isset($_POST['filter_btn1'])){
        $id = $_GET['id'];
        $filt_val= $_POST['filter_value1'];
        $qu=mysqli_query($con,"SELECT * FROM products WHERE   concat(name,small_des,long_des) LIKE '%$filt_val%'; ");
        if ($filt_val != "") {
        if(mysqli_num_rows($qu)>0){
            
        
            $qu1="SELECT * FROM products
            WHERE  cat_id='$id' AND view_as=1 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
            $qu2="SELECT * FROM products
            WHERE  cat_id='$id' AND  view_as=0 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
            
            getcards($qu1,$qu2);}else{
                echo	"<h2 class='text-center text-danger'> no product found  </h2>";
                }	
        
        }else{
            echo	"<h2 class='text-center text-danger'> kindly fill input field search field is empty or refresh the page  </h2>";
            }

   
      
      
      
    }

if (!isset($_POST['filter_btn'])) {
	if (!isset($_POST['filter_btn1'])) {
	if (isset($_GET['id'])) {

		$id = $_GET['id'];
		$qu = mysqli_query($con, "SELECT * FROM categories where id='$id'");
		$row = mysqli_fetch_array($qu);
		?>

		<div class="container m-t-80">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.php" class="h1    ">
					Home
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</a>

				<a href="<?= $row_cat['name'] ?>.php" class="h2 mx-3  ">
					<?= $row['name'] ?>
					<i class="fa fa-angle-right mt-1  " aria-hidden="true"></i>
				</a>


			</div>
		</div>
		<?php
		$qu1 = "SELECT * FROM `products` WHERE cat_id='$id' and view_as='1' ORDER BY rand()";
		$qu2 = "SELECT * FROM `products` WHERE cat_id='$id' and view_as='0' ORDER BY rand()";



		getcards($qu1, $qu2);
	}}}

	?>
</section>








<?php include 'productQuickview.php' ?>
<!-- Footer -->
<?php include 'script.php' ?>
<?php include 'footer.php' ?>