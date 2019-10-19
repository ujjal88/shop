<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php include '../classic/Catagory.php'; ?>
<?php include '../classic/Brand.php'; ?>
<?php include '../classic/Product.php'; ?>
<?php require_once ('../helpers/Format.php'); ?>
<?php

$pd = new Product();
$fm = new Format();

if(isset($_GET['prodel'])){
	$id = $_GET['prodel'];
	$delProduct = $pd->delproduct($id);
}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
         <?php 
                if (isset($delProduct)) {
                    echo $delProduct;
                }
                ?>
                
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl.</th>
					<th>Name</th>
					<th>Catagory</th>
					<th>Brand Name</th>
					<th>Body</th>
					<th>Image</th>
					<th>Type</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			    <?php

					$getproduct = $pd->getproductlist();
					if ($getproduct) {
						$i = 0;
						while ($result =$getproduct->fetch_assoc()) {
						$i++;
					
					?>
					
				<tr class="odd gradeX">
				    	
					
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $fm->textShorten($result['body'],50); ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" ></td>
					<td><?php
					
					if($result['type'] == 0){
					    echo "Featured";
					}else{
					    echo "General";
					}
					
					?></td>
					<td>$<?php echo $result['price']; ?></td>
				
					
				<td><a href="productdit.php?productid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm ('Are you Sure Delete')" href="?prodel=<?php echo $result['productId'];?>">Delete</a></td>
					
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
