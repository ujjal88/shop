<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Catagory.php'; ?>
<?php

$cat = new Catagory();
if(isset($_GET['catdel'])){
	$id = $_GET['catdel'];
	$delCat = $cat->delcatId($id);
}


?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php 
                if (isset($delCat)) {
                    echo $delCat;
                }
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
				<?php

					$getcat = $cat->getalllist();
					if ($getcat) {
						$i = 0;
						while ($resultcat =$getcat->fetch_assoc()) {
						$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultcat['name']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $resultcat['id'];?>">Edit</a> || <a onclick="return confirm ('Are you Sure Delete')" href="?catdel=<?php echo $resultcat['id'];?>">Delete</a></td>
						</tr>
						
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

