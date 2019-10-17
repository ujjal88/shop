
<?php require_once ('../lib/Database.php'); ?>
<?php require_once ('../helpers/Format.php'); ?>






<?php


class Brand{
    
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db = new Database(); 
		$this->fm = new Format(); 
	}

	public function brandInsert($name){
		$name = $this->fm->validation($name);
		$name = mysqli_real_escape_string($this->db->link, $name);
		if (empty($name)) {
			$msg = "<span style='color:red' > Catagroy must not be empty !!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO shop_brand(name) VALUES('$name')";
			$catinsert = $this->db->insert($query);
			if ($catinsert){
			$msg ="<span style='color:green'> catagory add sucessfull</span>";
				 return $msg;
			}else{
				$msg ="<span style='color:green' > catagory not sucessfull ..</span>";
				return $msg;
			}
	}
}

	public function getBrandlist(){
		$query = "SELECT * FROM shop_brand ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getcatId($id){
		$query = "SELECT * FROM shop_brand WHERE id='$id' ";
		$resuledit = $this->db->select($query);
		return $resuledit;
	}


	public function brandUpdate($name, $id){
		$name = $this->fm->validation($name);
		$name = mysqli_real_escape_string($this->db->link, $name);
		$id   = mysqli_real_escape_string($this->db->link, $id);
		if (empty($name)) {
			$msg = "<span style='color:red' > Catagroy must not be empty !!</span>";
			return $msg;
		}else{
			$query = "update shop_brand
			    SET
			 name = '$name'
			 where id= '$id' ";
			 $update_row = $this->db->update($query);
			if ($update_row){
			$msg ="<span style='color:green'> Brand update sucessfull</span>";
				 return $msg;
			}else{
				$msg ="<span style='color:green' > Brand update not sucessfull ..</span>";
				return $msg;
			}
	}

} 


public function delBrand($id){
		$query = "delete  FROM shop_brand WHERE id='$id' ";
		$resultde = $this->db->delete($query);
		if ($resultde) {
			$msg ="<span style='color:green'> Brand Delete sucessfull</span>";
				 return $msg;
		}
		else{
				$msg ="<span style='color:green' > Brand Delete not sucessfull ..</span>";
				return $msg;
			}
			
	}

}