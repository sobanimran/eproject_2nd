<?php
//session_start();
include("auth.php");
include("conn.php");

if (isset($_POST['product_update'])) {
    $prod_id = $_POST['id'];
    $name = $_POST["name"];
    $cate_id = $_POST["cate_id"];
    $brn_id = $_POST["brn_id"];
    $tren = $_POST["tren"] ? '1' : '0';
    $view_as = $_POST["view_as_r"];
    $cate_id = $_POST["cate_id"];
    $small_des = $_POST["small_description"];
    $long_des = $_POST["long_description"];
    $price = $_POST["price"];
    $offerprice = $_POST["offerprice"];
    $tax = $_POST["tax"];
    $qty = $_POST["qty"];
    $status = $_POST['status'] ? '0' : '1';
    $old_img1 = $_POST['old_img1'];
    $old_img2 = $_POST['old_img2'];
    $old_img3 = $_POST['old_img3'];
    $img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $img3 = $_FILES['image3']['name'];

    if ($img1 != '') {
        $update_img1 = $_FILES['image1']['name'];
        $allow_extion = ['png', 'jpg', 'jpeg'];
        $img_ext1 = pathinfo($update_img1, PATHINFO_EXTENSION);
        if (!in_array($img_ext1, $allow_extion)) {
            $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
            header("Location:product_edit.php");
            exit(0);

        }
        $update_img1 = $img1;
    }else {
        $update_img1 = $old_img1;
    }
    if ($img2 != '') {
        $update_img2 = $_FILES['image2']['name'];
        $allow_extion = ['png', 'jpg', 'jpeg'];
        $img_ext2 = pathinfo($update_img2, PATHINFO_EXTENSION);
        if (!in_array($img_ext2, $allow_extion)) {
            $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
            header("Location:product_edit.php");
            exit(0);

        }
        $update_img2 = $img2;

    }else {
        $update_img2 = $old_img2;
    }
    if ($img3 != '') {
        $update_img3 = $_FILES['image3']['name'];
        $allow_extion = ['png', 'jpg', 'jpeg'];
        $img_ext3 = pathinfo($update_img3, PATHINFO_EXTENSION);
        if (!in_array($img_ext3, $allow_extion)) {
            $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
            header("Location:product_edit.php");
            exit(0);

        }
        $update_img3 = $img3;

    } else {
        $update_img3 = $old_img3;
    }
    $pro_updt_qu = mysqli_query($con, "UPDATE products set cat_id='$cate_id',brn_id='$brn_id',view_as='$view_as',trending='$tren', name='$name',small_des='$small_des',long_des='$long_des',price='$price',
    offerprice='$offerprice',tax='$tax',quantity='$qty',image='$update_img1',image2='$update_img2',image3='$update_img3',status='$status' WHERE id='$prod_id' ");
    if ($pro_updt_qu) {
        if ($img1 != '') {
            $img_addr1 = $_FILES['image1']['tmp_name'];
            move_uploaded_file($img_addr1, 'img/product/' . $update_img1);
            if (file_exists('img/product/' . $old_img1)) {
                unlink('img/product/' . $old_img1);

            }
        }
        if ($img2 != '') {
            $img_addr2 = $_FILES['image2']['tmp_name'];
            move_uploaded_file($img_addr2, 'img/product/' . $update_img2);
            if (file_exists('img/product/' . $old_img2)) {
                unlink('img/product/' . $old_img2);

            }
        }
        if ($img3 != '') {
            $img_addr3 = $_FILES['image3']['tmp_name'];
            move_uploaded_file($img_addr3, 'img/product/' . $update_img3);
            if (file_exists('img/product/' . $old_img3)) {
                unlink('img/product/' . $old_img3);

            }}
        ;

        $_SESSION['status'] = "Product Updated Sucessfully";

        header('Location:product.php');
        exit(0);

    } else {

        $_SESSION['status'] = "Product Update Failed";

        header('Location:product-edit.php?id=' . $prod_id);
        exit(0);
    }



}
if (isset($_POST['product_del'])) {
    $id = $_POST['id'];
    $del_qu = mysqli_query($con, "DELETE FROM products WHERE id='$id' ");
    if ($del_qu) {
        $_SESSION['status'] = "Product Deleted Sucessfully";
        header("Location:product.php");
        exit(0);
    } else {

        $_SESSION['status'] = "Product Deletaion Failed";
        header("Location:product.php");
        exit(0);
    }
}
if (isset($_POST["product_save"])) {
    $name = $_POST["name"];
    $cate_id = $_POST["cate_id"];
    $brn_id = $_POST["brn_id"];
    $tren = $_POST["tren"] ? '1' : '0';
    $view_as = $_POST["view_as"];
    $small_des = $_POST["small_description"];
    $long_des = $_POST["long_description"];
    $price = $_POST["price"];
    $offerprice = $_POST["offerprice"];
    $tax = $_POST["tax"];
    $qty = $_POST["qty"];
    $status = $_POST['status'] ? '0' : '1';

    $img1 = $_FILES['image1']['name'];
    $img2 = $_FILES['image2']['name'];
    $img3 = $_FILES['image3']['name'];
    $allow_extion = ['png', 'jpg', 'jpeg'];
    $img_ext1 = pathinfo($img1, PATHINFO_EXTENSION);
    $img_ext2 = pathinfo($img2, PATHINFO_EXTENSION);
    $img_ext3 = pathinfo($img3, PATHINFO_EXTENSION);
    if (!in_array($img_ext1, $allow_extion) || !in_array($img_ext2, $allow_extion) || !in_array($img_ext3, $allow_extion)) {
        $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
        header("Location:product_add.php");
        exit(0);

    } else {
        $in_qu = mysqli_query($con, "INSERT INTO products values('','$cate_id','$brn_id','$view_as','$tren','$name','$small_des','$long_des','$price','$offerprice','$tax','$qty','$img1','$img2','$img3','$status',CURRENT_TIMESTAMP())");
        if ($in_qu) {
            $img_addr1 = $_FILES['image1']['tmp_name'];
            $img_addr2 = $_FILES['image2']['tmp_name'];
            $img_addr3 = $_FILES['image3']['tmp_name'];
            move_uploaded_file($img_addr1, 'img/product/' . $img1);
            move_uploaded_file($img_addr2, 'img/product/' . $img2);
            move_uploaded_file($img_addr3, 'img/product/' . $img3);

            $_SESSION['status'] = "Product Added Sucessfully";
            header("Location:product.php");
            exit(0);
        } else {

            $_SESSION['status'] = "Something went wrong";
            header("Location:product_add.php");
            exit(0);

        }
    }

}
;

if (isset($_POST['brand_save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    // to croos check if data is already present
    $brn_qu_sl = mysqli_query($con, "SELECT *FROM brands WHERE brn_name='$name'");

    if (mysqli_num_rows($brn_qu_sl) > 0) {
        $_SESSION['status'] = " Inserting Failed ! This Brand Already Present in Database ";
        header("location:brand.php");
    } else {
        $img = $_FILES['brand_img']['name'];
        $allow_extion = ['png', 'jpg', 'jpeg'];
        $img_ext = pathinfo($img, PATHINFO_EXTENSION);
        if (!in_array($img_ext, $allow_extion)) {
            $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
            header("Location:brand.php");
            exit(0);

        } else {
            $in_qu_brn = mysqli_query($con, "INSERT INTO brands values('','$name','$description','$img',CURRENT_TIMESTAMP())");
            if ($in_qu_brn) {
                $img_addr = $_FILES['brand_img']['tmp_name'];
                move_uploaded_file($img_addr, 'img/brands/' . $img);

                $_SESSION['status'] = "Brand Added Sucessfully";
                header("Location:brand.php");
                exit(0);
            } else {

                $_SESSION['status'] = "Something went wrong";
                header("Location:brand.php");
                exit(0);

            }
        }
    }
}
;



if (isset($_POST['category_save'])) {
    $name = $_POST['name'];
    $img = $_FILES['cat_img']['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';
    //check image extension
    $allow_extion = ['png', 'jpg', 'jpeg'];
    $img_ext = pathinfo($img, PATHINFO_EXTENSION);
    if (!in_array($img_ext, $allow_extion)) {
        $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
        header("Location:category.php");
        exit(0);

    } else {
        // to croos check if data is already present
        $cat_qu_sl = mysqli_query($con, "SELECT *FROM categories WHERE name='$name'");
        if (mysqli_num_rows($cat_qu_sl) > 0) {
            $_SESSION['status'] = " Inserting Failed ! This Category Already Present in Database ";
            header("location:category.php");
        } else {
            $cat_qu = mysqli_query($con, "INSERT INTO categories VALUES ('','$name','$img','$description','$trending','$status',CURRENT_TIMESTAMP())");

            if ($cat_qu) {
                $img_addr = $_FILES['cat_img']['tmp_name'];
                move_uploaded_file($img_addr, 'img/categories/' . $img);
                $_SESSION['status'] = "Category Inserted successfully";
                header("location:category.php");
            } else {
                $_SESSION['status'] = "category insertion failed !";
                header("location:category.php");
            }
        }
    }
}
;
if (isset($_POST['category_update'])) {
    $cat_id = $_POST['id'];
    $cat_name = $_POST['name'];
    $cat_des = $_POST['description'];
    $cat_trending = $_POST['trending'] == true ? '1' : '0';
    $cat_status = $_POST['status'] == true ? '1' : '0';
    $old_img = $_POST['old_img'];
    $img = $_FILES['image']['name'];

    if ($img != '') {
        $update_img = $_FILES['image']['name'];
        $allow_extion = ['png', 'jpg', 'jpeg'];
        $img_ext = pathinfo($update_img, PATHINFO_EXTENSION);
        if (!in_array($img_ext, $allow_extion)) {
            $_SESSION['status'] = "you are allowed with only jpg,png,jpeg extension images";
            header("Location:product_edit.php");
            exit(0);

        }
        $update_img = $img;
    } else {
        $update_img = $old_img;
    }


    $cat_qu_update = mysqli_query($con, "UPDATE categories SET name='$cat_name',img='$update_img',description='$cat_des',trending='$cat_trending',status=' $cat_status' WHERE id='$cat_id' ");
    if ($cat_qu_update) {
        if ($img != '') {
            $img_addr = $_FILES['image']['tmp_name'];
            move_uploaded_file($img_addr, 'img/categories/' . $update_img);
            if (file_exists('img/categories/' . $old_img)) {
                unlink('img/categories/' . $old_img);

            }





        }
        ;
        $_SESSION['status'] = "Category updated successfully";
        header("location:category.php");
    } else {
        $_SESSION['status'] = "category updating failed !";
        header("location:category.php");
    }
}

if (isset($_POST['logout_btn'])) {
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth-user']);
    $_SESSION['status'] = "Logged out successfully";
    header("location:../index.php");
    exit(0);
}

if (isset($_POST['chk_Emailbtn'])) {
    $email = $_POST["email"];
    $qu_chak = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($qu_chak) > 0) {
        echo "<h3 style='color:red;'>Email Id Already Taken</h3>";
    } else {
        echo 'Avalible';
    }
    ;

}
;

if (isset($_POST['adduser'])) {
    $name = $_POST["usrname"];
    $email = $_POST["usremail"];
    $phoneNu = $_POST["usrph"];
    $password = $_POST["usrpass"];
    $chkPas = $_POST["usrpass_con"];
    if ($password === $chkPas) {

        $qu_chk = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        if (mysqli_num_rows($qu_chk) > 0) {
            $_SESSION['status'] = "user registeration  failed,email already taken";
            header("location:registered.php");
        } else {


            $qu = mysqli_query($con, "insert into users values('','$name','$email','$phoneNu','$password','','')");
            if ($qu) {
                $_SESSION['status'] = "user added successfully";
                header("location:registered.php");
            } else {

                $_SESSION['status'] = "user registeration failed";
                header("location:registered.php");
            }
        }
    } else {
        $_SESSION['status'] = "password and confirm password dosn't match!";
        header("location:registered.php");
    }

}
;



if (isset($_POST['updateuser'])) {
    $id = $_POST['usrid'];
    $name = $_POST["usrname"];
    $email = $_POST["usremail"];
    $phoneNu = $_POST["usrph"];
    $password = $_POST["usrpass"];
    $role = $_POST["role"];

    $qu_update = mysqli_query($con, "update users set name='$name',email='$email',phoneNu='$phoneNu',password='$password' ,role_as='$role' where id=$id ");
    if ($qu_update) {
        $_SESSION['status'] = "user updated successfully";
        header("location:registered.php");
    } else {

        $_SESSION['status'] = "user updating failed";
        header("location:registered.php");
    }
}

if (isset($_POST['deletuser'])) {
    $id = $_POST['usr_id'];
    $qu_del = mysqli_query($con, "delete FROM users WHERE id='$id'");
    if ($qu_del) {
        $_SESSION['status'] = "user delete successfully";
        header("location:registered.php");
    } else {

        $_SESSION['status'] = "user deletaion failed";
        header("location:registered.php");
    }
}
;
if (isset($_POST["brn_del_btn"])) {
    echo "i am in";
    $brn_id = $_POST["brn_id"];
    $del_qu = mysqli_query($con, "DELETE FROM brands WHERE brn_id='$brn_id'");
    if ($del_qu) {
        $_SESSION['status'] = "Brand delete successfully";
        header("location:brand.php");
    } else {

        $_SESSION['status'] = "Brand deletaion failed";
        header("location:brand.php");
    }
}
if (isset($_POST["cate_del_btn"])) {
    echo "i am in";
    $cat_id = $_POST["cate_id"];
    $del_qu = mysqli_query($con, "DELETE FROM categories WHERE id='$cat_id'");
    if ($del_qu) {
        $_SESSION['status'] = "category delete successfully";
        header("location:category.php");
    } else {

        $_SESSION['status'] = "category deletaion failed";
        header("location:category.php");
    }
}
// customer review
if(isset($_POST['rew_submit'])){
    $review=$_POST['review'];
    $name=$_POST['name'];  
    $id=$_POST['id'];  
    $email=$_POST['email'];
    header("location:../product-detail.php?id=$id");
}
?>