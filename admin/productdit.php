<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once ('../classic/Catagory.php'); ?>
<?php require_once ('../classic/Brand.php'); ?>
<?php require_once ('../classic/Product.php'); ?>



<?php

if (!isset($_GET['productid']) || $_GET['productid'] == NULL ) {
    echo "<script> windows.location = 'productlist.php'; </script>";
}else{
   $id = $_GET['productid'];
}


$pd = new Product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $productcheck = $pd->productUpdate($_POST, $_FILES,$id);


}
?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>

        <div class="block">  

        <?php 
                if (isset($productcheck)) {
                    echo $productcheck;
                }
        ?>

        <?php

        $getproductid =$pd->getProductid($id);
        if ($getproductid) {
            while ($value =$getproductid->fetch_assoc()) { ?>
                
         


             
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="CatagoryId">
                            <option>Select Category</option>
                            <?php 
                                $cat =new Catagory();
                                $getcatId = $cat->getalllist();
                                if ($getcatId) {
                                     while ($result =$getcatId->fetch_assoc()) { ?>

                            <option <?php
                            if ($value['CatagoryId']== $result['id']) { ?>
                                selected = "selected";
                           <?php }
                            ?>
                            
                             value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                            <?php

                            }} 

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 
                                $brand=new Brand();
                                $getbrandId = $brand->getBrandlist();
                                if ($getbrandId) {
                                     while ($brandresult =$getbrandId->fetch_assoc()) { ?>

                            <option <?php
                            if ($value['brandId']== $result['id']) { ?>
                                selected = "selected";
                           <?php }
                            ?>
                            value="<?php echo $brandresult['id']; ?>"><?php echo $brandresult['name']; ?></option>
                            <?php

                            }} 

                            ?>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" class="body" class="tinymce" >
                            <?php echo $value['body']; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" value="<?php echo $value['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>

                    </td>
                    <td>
                        <img src="<?php echo $value['image']; ?>" height="40px" width="60px" >
                        <input name="image" class="image" type="file" />

                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if ($value['type'] == 0) { ?>
                               <option selected = "selected" value="1">Featured</option>
                            <?php } else{ ?>

                                <option  selected = "selected" value="0">Non-Featured</option>
                            <?php } ?>
                            
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
<?php }} ?>

        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


