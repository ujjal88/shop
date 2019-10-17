<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Brand.php'; ?>

<?php

if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL ) {
    echo "<script> windows.location = 'brandlist.php'; </script>";
}else{
   $id = $_GET['brandid'];
}


$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $updatecheck =$brand->brandUpdate($name,$id);
}


?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                
               <div class="block copyblock"> 
               <?php 
                if (isset($updatecheck)) {
                    echo $updatecheck;
                }
                ?>

                <?php

                $getBrand =$brand->getcatId($id);
                if ($getBrand) {
                        while ($result =$getBrand->fetch_assoc()) {

                ?>
               
                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
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
<?php include 'inc/footer.php';?>