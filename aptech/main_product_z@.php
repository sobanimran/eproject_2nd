<?php
// if(isset($_POST['search_Ajex'])){
//     $keyword= $_POST['key'];
//     if($keyword!= ''){
//         return 1;
//     }else{
//         return 0;
//     }
// }
$con=mysqli_connect("localhost","root","","adminpanel") or die("mar gaya");
if(isset($_POST['search_Ajex'])){
    $filt_val= $_POST['key'];
    if($filt_val!=""){
    $qu=mysqli_query($con,"SELECT * FROM products WHERE trending=1  AND concat(name,small_des,long_des) LIKE '%$filt_val%'; ");
    if(mysqli_num_rows($qu)>0){
        

        $qu1="SELECT * FROM products
        WHERE trending=1 AND view_as=1 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
        $qu2="SELECT * FROM products
        WHERE trending=1 AND view_as=0 AND concat(name,small_des,long_des) LIKE '%$filt_val%';";
        
       return getcards($qu1,$qu2);}
    }}

 function getcards($qu1,$qu2){
    global $con;
    $sl_qu_prod_slid = mysqli_query($con, $qu1);
    $sl_qu_prod_card = mysqli_query($con, $qu2);
   
    if (mysqli_num_rows($sl_qu_prod_slid) > 0) {
        ?>
            <!-- cards by Slider -->
        <!-- Product cards slider in INDEX page -->
        <section class="sec-product bg0 p-t-100 p-b-50">
            <div class="container">
                <div class="p-b-32">
                    <h3 class="ltext-105 cl5 txt-center respon1">
                        Store Overview
                    </h3>
                </div>

                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Trending product</a>
                        </li>

                    
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-50">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                            <!-- Slide2 -->
                            <div class="wrap-slick2">
                                <div class="slick2">
                                    <?php
                                    while ($row = mysqli_fetch_array($sl_qu_prod_slid)) { ?>
                                            <div class=" p-l-20 p-r-20 p-t-15 p-b-15">
                                                <!-- Block2 -->
                                                <div class="">
                                                    <div style="height:350px ;" class=" hov-img0">
                                                        <img src="Admin/img/product/<?= $row['image'] ?>" height="100% !important" alt="<?= $row['name'] ?>">
    
                                                        <a href="#"
                                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                            Quick View
                                                        </a>
                                                    </div>
    
                                                    <div class="block2-txt flex-w flex-t p-t-14">
                                                        <div class="block2-txt-child1 flex-col-l ">
                                                            <a href="product-detail.php?id=<?= $row[0] ?>"
                                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                                <?= $row['name'] ?>
                                                            </a>
    
                                                            <span class="stext-105 cl3">
                                                                RS.<?= $row['price'] ?>/=
                                                            </span>
                                                        </div>
    
                                                        <div class="block2-txt-child2 flex-r p-t-3">
                                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                                <img class="icon-heart1 dis-block trans-04"
                                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                            </div>
            <?php
                                    }
                                    ?>
                           

                          

                            

                            

                           

                            

                            
                                </div>
                            </div>
                        </div>

               

                        <!-- - -->
               
               
               
                    </div>
                </div>
            </div>
        </section>
    <?php };
    if (mysqli_num_rows($sl_qu_prod_card) > 0) {
    
	?>
        <!-- cards by rows -->

        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>
            <div class="flex-w flex-sb-m p-b-20">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".jewellery">
                        Jewllery
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".cosmetic">
                        Cosmetic
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".l’oreal">
                    l’oreal
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Almas">
                    Almas Jewellers
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Tesoro">
                    Tesoro Jewellers
                    </button>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                
                </div>

              
                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Popularity
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Average rating
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Fashion
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Lifestyle
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Denim
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Streetstyle
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Crafts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                <?php
                while ($row = mysqli_fetch_array($sl_qu_prod_card)) {
                    $cat_id=$row['cat_id'];
                    $brn_id=$row['brn_id'];
                    $sl_qu_cat=mysqli_query($con,"SELECT * FROM categories WHERE id='$cat_id'");
                    $sl_qu_brn=mysqli_query($con,"SELECT * FROM brands WHERE brn_id='$brn_id'");
                    $row_cat=mysqli_fetch_array($sl_qu_cat);
                    $row_brn=mysqli_fetch_array($sl_qu_brn);
                    
                    ?>
                        <div class="col-6 col-md-4 col-xlg-3 m-0  p-0 isotope-item <?= $row['brn_id']==$row_brn['brn_id']?$row_brn['brn_name']:'' ?> <?= $row['cat_id']==$row_cat['id']?$row_cat['name']:'' ?>">
                        <!-- Block2 -->
                        <div class="block2 m-2 mt-5">
                            <div class="block2-pic hov-img0">
                                <img src="Admin/img/product/<?= $row['image'] ?>" height="250px" alt="<?= $row['name'] ?>">

                                <a href="#" id="<?= $row['id'] ?>"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.php?id=<?=$row['id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?= $row['name'] ?>
                                    </a>

                                    <span class="stext-105 cl3">
                                        RS.<?= $row['price'] ?>/=
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png"
                                            alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
             <?php } ?>

            </div>

        </div>


        <?php
    }

 }
 
 ?>

<!-- cards by Slider -->
<!-- Product cards slider -->

<!-- cards by rows -->

