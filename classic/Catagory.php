
<?php require_once ('../lib/Database.php'); ?>
<?php require_once ('../helpers/Format.php'); ?>






<?php


class Catagory{
    
	private $db;
	private $fm;
	
	
	public function __construct(){
		$this->db = new Database(); 
		$this->fm = new Format(); 
	}

	public function catInsert($name){
		$name = $this->fm->validation($name);
		$name = mysqli_real_escape_string($this->db->link, $name);
		if (empty($name)) {
			$msg = "<span style='color:red' > Catagroy must not be empty !!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO shop_catagory(name) VALUES('$name')";
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