<?php
    require_once("./Entities/product.class.php");
    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtcateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_POST['txtpic'];
        $newProduct = new Product($productName,$cateID,$price,$quantity,$description,$picture);
        $result = $newProduct->save();
        if(!$result)
        {
            header("Location: add_product.php?failure");

        }else{
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php include_once("header.php");?>
<?php
    if(isset($_GET["inserted"])){
        echo"<h2>Thêm sản phẩm thành công</h2>";
    }
?>
<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label>Tên sản phẩm </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"])? $_POST["txtName"] : ""; ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <textarea name="txtdesc" id="" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"])? $_POST["txtdesc"] : ""; ?>"></textarea>
        </div>
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class= "row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm sản phẩm"/>
        </div>

    </div>
</form>
<?php include_once("footer.php")?>