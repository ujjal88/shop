
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>





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

} 