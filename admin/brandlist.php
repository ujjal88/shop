<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Brand.php'; ?>
<?php

$cat = new Brand();
if(isset($_GET['branddel'])){
	$id = $_GET['branddel'];
	$delBrand = $cat->delBrand($id);
}


?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <?php 
                if (isset($delBrand)) {
                    echo $delBrand;
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

					$getBrand = $cat->getBrandlist();
					if ($getBrand) {
						$i = 0;
						while ($resultcat =$getBrand->fetch_assoc()) {
						$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultcat['name']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $resultcat['id'];?>">Edit</a> || <a onclick="return confirm ('Are you Sure Delete')" href="?branddel=<?php echo $resultcat['id'];?>">Delete</a></td>
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

