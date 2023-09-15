<?php include 'header.php';
$pagname='productuser' ?>

	
	<!-- Product -->
	<div class="bg0 m-t-100 p-b-50 ">
	<?php include 'main_product_z@.php';?>
	<form action="" class="d-flex justify-content-end" method="post">
	<div class="row d-flex justify-content-end ">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text"  name="filter_value" class="form-control" placeholder="Search/Filter Record" id="">
			</div>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary" type="submit" name="filter_btn">
				Filter Data
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['filter_btn'])){
$filt_val= $_POST['filter_value'];
$qu=mysqli_query($con,"SELECT * FROM products WHERE   concat(name,small_des,long_des) LIKE '%$filt_val%'; ");
if ($filt_val != "") {
if(mysqli_num_rows($qu)>0){
	

	$qu1="SELECT * FROM products
	WHERE  view_as=1 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
	$qu2="SELECT * FROM products
	WHERE  view_as=0 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
	
	getcards($qu1,$qu2);
}else{
	echo	"<h2 class='text-center text-danger'> no product found  </h2>";
	}	

}else{
	echo	"<h2 class='text-center text-danger'> kindly fill input field search field is empty or refresh the page  </h2>";
	}



}
if(isset($_POST['filter_btn1'])){
$filt_val= $_POST['filter_value1'];
$qu=mysqli_query($con,"SELECT * FROM products WHERE   concat(name,small_des,long_des) LIKE '%$filt_val%'; ");
if ($filt_val != "") {
if(mysqli_num_rows($qu)>0){
	

	$qu1="SELECT * FROM products
	WHERE  view_as=1 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
	$qu2="SELECT * FROM products
	WHERE  view_as=0 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
	
	getcards($qu1,$qu2);}else{
		echo	"<h2 class='text-center text-danger'> no product found  </h2>";
		}	

}else{
	echo	"<h2 class='text-center text-danger'> kindly fill input field search field is empty or refresh the page  </h2>";
	}



}
if(!isset($_POST['filter_btn'])){
if(!isset($_POST['filter_btn1'])){


	    $qu1 = "SELECT * FROM `products` WHERE   view_as=1 ORDER BY rand()";
		$qu2 =  "SELECT * FROM `products` WHERE   view_as=0 ORDER BY rand()";
	   getcards($qu1,$qu2);
}
}
	?>
		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Load More
			</a>
		</div>
	</div>
		

	<!-- Footer -->
	<!-- Modal1 -->
	
	<?php include 'productQuickview.php'?>
	<!-- Footer -->
	<?php include 'script.php'?>
	<?php include 'footer.php'?>
