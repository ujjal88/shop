<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Catagory.php'; ?>

<?php

if (!isset($_GET['catid']) || $_GET['catid'] == NULL ) {
    echo "<script> windows.location = 'catlist.php'; </script>";
}else{
   $id = $_GET['catid'];
}


$cat = new Catagory();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $updatecheck =$cat->catupdate($name,$id);
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

                $getCat =$cat->getcatId($id);
                if ($getCat) {
                        while ($resultedit =$getCat->fetch_assoc()) {

                ?>
               
                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $resultedit['name']; ?>" class="medium" />
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