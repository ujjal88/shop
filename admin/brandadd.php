<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Brand.php'; ?>

<?php

$cat = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $catgorycheck =$cat->brandInsert($name);
}


?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand </h2>
                
               <div class="block copyblock"> 
               <?php 
                if (isset($catgorycheck)) {
                    echo $catgorycheck;
                }
                ?>
               
                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>