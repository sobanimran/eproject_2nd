<?php
//session_start();
include("auth.php");
include("conn.php");

if(isset($_POST['product_update'])){
    $prod_id=$_POST['id'];
    $name = $_POST["name"];
    $cate_id = $_POST["cate_id"];
    $small_des = $_POST["small_description"];
    $long_des = $_POST["long_description"];
    $price = $_POST["price"];
    $offerprice = $_POST["offerprice"];
    $tax = $_POST["tax"];
    $qty = $_POST["qty"];
    $status = $_POST['status']?'0':'1';
    $old_img = $_POST['old_img'];
    $img = $_FILES['image']['name'];

    if($img!=''){
        $update_img=$_FILES['image']['name'];
        $allow_extion =['png','jpg','jpeg'];
        $img_ext=pathinfo($update_img,PATHINFO_EXTENSION);
        if(!in_array($img_ext,$allow_extion)){
            $_SESSION['status']="you are allowed with only jpg,png,jpeg extension images";
            header("Location:product_edit.php");
            exit(0);
            
        }
        $update_img=$img;
    }else{
        $update_img=$old_img;
    }
    $pro_updt_qu=mysqli_query($con,"UPDATE products set cat_id='$cate_id', name='$name',small_des='$small_des',long_des='$long_des',price='$price',
    offerprice='$offerprice',tax='$tax',quantity='$qty',image='$update_img',status='$status' WHERE id='$prod_id' ");
    if($pro_updt_qu){
        if($img!=''){
            $img_addr = $_FILES['image']['tmp_name'];
            move_uploaded_file($img_addr,'img/product/'.$update_img);
            if(file_exists('img/product/'.$old_img)){
                unlink('img/product/'.$old_img);
            
            }
         


            
               
        };
        
        $_SESSION['status']="Product Updated Sucessfully";
      
        header('Location:product.php');
        exit(0);
        
    }
    
    else{
        
        $_SESSION['status']="Product Update Failed";
      
        header('Location:product-edit.php?id='.$prod_id);
        exit(0);
    }



}
if(isset($_POST['product_del'])){
    $id = $_POST['id'];
    $del_qu=mysqli_query($con,"DELETE FROM products WHERE id='$id' ");
    if($del_qu){
        $_SESSION['status']="Product Deleted Sucessfully";
        header("Location:product.php");
        exit(0);
    }else{
        
        $_SESSION['status']="Product Deletaion Failed";
        header("Location:product.php");
        exit(0);
    }
}
if (isset($_POST["product_save"])) {
    $name = $_POST["name"];
    $cate_id = $_POST["cate_id"];
    $small_des = $_POST["small_description"];
    $long_des = $_POST["long_description"];
    $price = $_POST["price"];
    $offerprice = $_POST["offerprice"];
    $tax = $_POST["tax"];
    $qty = $_POST["qty"];
    $status = $_POST['status']?'0':'1';

    $img = $_FILES['image']['name'];
    $allow_extion =['png','jpg','jpeg'];
    $img_ext=pathinfo($img,PATHINFO_EXTENSION);
    if(!in_array($img_ext,$allow_extion)){
        $_SESSION['status']="you are allowed with only jpg,png,jpeg extension images";
        header("Location:product_add.php");
        exit(0);
        
    }
    else{
        $in_qu=mysqli_query($con,"INSERT INTO products values('','$cate_id','$name','$small_des','$long_des','$price','$offerprice','$tax','$qty','$img','$status',CURRENT_TIMESTAMP())");
        if($in_qu){
            $img_addr = $_FILES['image']['tmp_name'];
            move_uploaded_file($img_addr,'img/product/'.$img);
            
            $_SESSION['status']="Product Added Sucessfully";
            header("Location:product_add.php");
            exit(0);
        }
        else{
            
            $_SESSION['status']="Something went wrong";
            header("Location:product_add.php");
            exit(0);
            
        }
    }

}
;


if (isset($_POST['category_save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $cat_qu = mysqli_query($con, "INSERT INTO categories VALUES ('','$name','$description','$trending','$status',CURRENT_TIMESTAMP())");
    if ($cat_qu) {
        $_SESSION['status'] = "Category Inserted successfully";
        header("location:category.php");
    } else {
        $_SESSION['status'] = "category insertion failed !";
        header("location:category.php");
    }
}
;
if (isset($_POST['category_update'])) {
    $cat_id = $_POST['id'];
    $cat_name = $_POST['name'];
    $cat_des = $_POST['description'];
    $cat_trending = $_POST['trending'] == true ? '1' : '0';
    $cat_status = $_POST['status'] == true ? '1' : '0';
    $cat_qu_update = mysqli_query($con, "UPDATE categories SET name='$cat_name',description='$cat_des',trending='$cat_trending',status=' $cat_status' WHERE id='$cat_id' ");
    if ($cat_qu_update) {
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
    header("location:login.php");
    exit(0);
}

if (isset($_POST['chk_emailbtn'])) {
    $email = $_POST["email"];
    $qu_chek = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($qu_chek) > 0) {
        echo "email id already taken";
    } else {
        echo "its avalible";
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

?>