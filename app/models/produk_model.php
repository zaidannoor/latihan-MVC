<?php 


class produk_model extends Controller{
	private $table = 'product';
	private $db;

	public function __construct(){
		$this->db = new database;
	}

	public function getAllProduct(){
		$this->db->query("SELECT * FROM product");
		return $this->db->resultSet();
	}

}