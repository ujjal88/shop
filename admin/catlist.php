<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classic/Catagory.php'; ?>
<?php

$cat = new Catagory();


?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
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
						$i =0;
						while ($resultcat =$getcat->fecth_assoc() ) {
							$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $resultcat['catName']; ?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
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

