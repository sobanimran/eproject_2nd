<?php include 'header.php';
$pagname='productuser' ?>

	
	<!-- Product -->
	<div class="bg0 m-t-0 p-b-50 ">
	<?php include 'main_product_z@.php';
	    $qu1 = "SELECT * FROM `products` WHERE   view_as=1 ORDER BY rand()";
		$qu2 =  "SELECT * FROM `products` WHERE   view_as=0 ORDER BY rand()";
	   getcards($qu1,$qu2);
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
