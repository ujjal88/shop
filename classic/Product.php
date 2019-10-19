
<?php require_once ('../lib/Database.php'); ?>
<?php require_once ('../helpers/Format.php'); ?>






<?php


class Product{
    
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db = new Database(); 
		$this->fm = new Format(); 
	}

	public function productInser($data, $file){
	
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$CatagoryId  = mysqli_real_escape_string($this->db->link, $data['CatagoryId']);
		$brandId     = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link, $data['body']);
		$type        = mysqli_real_escape_string($this->db->link, $data['type']);
		$price       = mysqli_real_escape_string($this->db->link, $data['price']);


		$permited  = array('jpg','jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;


		if ($productName == "" || $CatagoryId == "" || $brandId == "" || $body == "" || $type == "" || $price == "" ) {
			$msg = "<span style='color:red' > Fields must not be empty !!</span>";
			return $msg;
		}elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    
    else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO shop_product(productName,CatagoryId,brandId,body,image,type,price) 
			    VALUES('$productName','$CatagoryId','$brandId','$body','$uploaded_image','$type',$price)";
			    
			$productinsert = $this->db->insert($query);
			if ($productinsert){
			$msg ="<span style='color:green'> Product add sucessfull</span>";
				 return $msg;
			}else{
				$msg ="<span style='color:green' >Product not sucessfull ..</span>";
				return $msg;
			}
		}


}

	public function getproductlist(){
		$query ="SELECT shop_product.*,  shop_catagory.name, shop_brand.name
		FROM shop_product
		INNER JOIN shop_catagory
		ON shop_product.CatagoryId = shop_catagory.id
		INNER JOIN shop_brand
		ON shop_product.brandId = shop_brand.id
		
		ORDER BY shop_product.productId DESC ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getProductid($id){
		$query = "SELECT * FROM shop_product WHERE productId='$id' ";
		$resuledit = $this->db->select($query);
		return $resuledit;
	}


	public function productUpdate($_POST, $_FILES,$id){
		$name = $this->fm->validation($name);
		$name = mysqli_real_escape_string($this->db->link, $name);
		$id   = mysqli_real_escape_string($this->db->link, $id);
		if (empty($name)) {
			$msg = "<span style='color:red' > Catagroy must not be empty !!</span>";
			return $msg;
		}else{
			$query = "update shop_catagory
			SET
			 name = '$name'
			 where id= '$id' ";
			 $update_row = $this->db->update($query);
			if ($update_row){
			$msg ="<span style='color:green'> catagory update sucessfull</span>";
				 return $msg;
			}else{
				$msg ="<span style='color:green' > catagory update not sucessfull ..</span>";
				return $msg;
			}
	}

} 


public function delproduct($id){
		$query = "select * FROM shop_product WHERE productId='$id' ";
		$getData = $this->db->select($query);
		if ($getData) {
		    while ($reulst = $getData->fetch_assoc()) {
		    	$dellink = $reulst['image'];
		    	unlink($dellink);
		    }
			
		}

		$delquery = "delete  FROM shop_product WHERE productId='$id' ";
		$delData = $this->db->delete($delquery);
		if ($delData) {
			$msg ="<span style='color:green'> Product Delete sucessfull</span>";
				 return $msg;
		}
		else{
				$msg ="<span style='color:green' > Product Delete not sucessfull ..</span>";
				return $msg;
			}
		
			
	}

}








