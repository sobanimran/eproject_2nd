<?php $con = mysqli_connect("localhost", "root", "", "adminpanel") or die('margaya'); ?>
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="ajex_mod">

</div>
<script>
	// ------------- **** productQuickview -add-to-cart btn ------****************
	$(document).on("click", ".js-addcart-detail", function () {
		// var prodId=
		var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		//$(document).on("click",".js-addcart-detail",function(){
		$(this).on("click", function () {
			var prodId = $('input[name="chk_id"]').val();
			alert(prodId)


			swal(nameProduct, "is added to cart !", "success");
		});
	});
</script>
<?php if (isset($_POST["qick_view"])) {

	$id = $_POST['id'];
	$qu = mysqli_query($con, "SELECT * FROM products WHERE id='$id' limit 1");
	$row = mysqli_fetch_array($qu)
		?>
	<script>

		$('.js-hide-modal1').on('click', function () {
			$('.js-modal1').removeClass('show-modal1');
		});

		//******** */	[ +/- num product ]*/******* */
		$('.btn-num-product-down').on('click', function () {
			var numProduct = Number($(this).next().val());
			if (numProduct > 0) $(this).next().val(numProduct - 1);
		});

		$('.btn-num-product-up').on('click', function () {
			var numProduct = Number($(this).prev().val());
			$(this).prev().val(numProduct + 1);
		});
		//---------------------------------------------------------------------





	</script>
	<!--quick view modal
-->
	//<div class="overlay-modal1 js-hide-modal1"></div>
	<div class="container">
		<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src="images/icons/icon-close.png" alt="CLOSE">
			</button>



			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<input type="hidden" name="chk_id" value="<?= $_POST['id'] ?>" id="chk_id">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="Admin/img/product/<?= $row['image'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="Admin/img/product/<?= $row['image'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
											href="Admin/img/product/<?= $row['image'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<!-- <div class="item-slick3" data-thumb="Admin/img/product/ //$row['image2']; ">
										<div class="wrap-pic-w pos-relative">
											<img src="Admin/img/product/ //$row['image2']" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="Admin/img/product/<=// $row['image2']>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									
									<div class="item-slick3" data-thumb="Admin/img/product/<=// $row['image3']>">
										<div class="wrap-pic-w pos-relative">
											<img src="Admin/img/product/<=// $row['image3']>" alt="IMG-PRODUCT">
											
											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="Admin/img/product/<=// $row['image3']>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
	-->
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $row['name']; ?>
						</h4>

						<span class="mtext-106 cl2">
							<?= $row['price']; ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?= $row['long_des']; ?>
						</p>



						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
											value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>
						</div>

						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#"
									class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
									data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>