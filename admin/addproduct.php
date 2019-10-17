<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once ('../classic/Catagory.php'); ?>
<?php require_once ('../classic/Brand.php'); ?>
<?php require_once ('../classic/Product.php'); ?>
<?php

$pd = new Product();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $productcheck = $pd->productInser($_POST, $_FILES);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>

        <?php 
                if (isset($productcheck)) {
                    echo $productcheck;
                }
        ?>


        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
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

                            <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
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

                            <option value="<?php echo $brandresult['id']; ?>"><?php echo $brandresult['name']; ?></option>
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
                        <textarea name="body" class="body" class="tinymce"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="images" class="image" type="file" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
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


