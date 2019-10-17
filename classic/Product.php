
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
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "admin/uploads/".$unique_image;


		if ($productName == "" || $CatagoryId == "" || $brandId == "" || $body == "" || $type == "" || $price == "" ) {
			$msg = "<span style='color:red' > Fields must not be empty !!</span>";
			return $msg;
		}elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    
    else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO shop_product(productName,CatagoryId,brandId,body,images ,type,price) 
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

	public function getalllist(){
		$query = "SELECT * FROM shop_catagory ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getcatId($id){
		$query = "SELECT * FROM shop_catagory WHERE id='$id' ";
		$resuledit = $this->db->select($query);
		return $resuledit;
	}


	public function catupdate($name, $id){
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


public function delcatId($id){
		$query = "delete  FROM shop_catagory WHERE id='$id' ";
		$resultde = $this->db->delete($query);
		if ($resultde) {
			$msg ="<span style='color:green'> catagory Delete sucessfull</span>";
				 return $msg;
		}
		else{
				$msg ="<span style='color:green' > catagory Delete not sucessfull ..</span>";
				return $msg;
			}
			
	}

}