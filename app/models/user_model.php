<?php 


class user_model extends Controller{
	private $table = 'product';
	private $db;

	public function __construct(){
		$this->db = new database;
	}

	public function getUserByUsername($username){

	}

	public function loginAccount($data){
		// mengambil inputan dari user
		$username = htmlspecialchars($data["username"]);
		$password = htmlspecialchars($data["password"]);
		// query untuk pencocokan antara inputan user dengan database
		$this->db->query("SELECT * FROM user WHERE username=:username");
		$this->db->bind('username' , $username);
		$result = $this->db->single();

		if (count($result) > 0) {
			$password2 = $result["password"];
			$role = $result["role"];
			if (password_verify($password, $password2)) {
				$_SESSION["login"] = true;
				$_SESSION["role"] = $role;
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

	}

	public function logoutAccount(){
		session_destroy();
		session_unset();
	}

	public function addNewUser($data){
		// mengambil inputan dari user
		$username = htmlspecialchars($data["username"]);
		$email = htmlspecialchars($data["email"]);
		$password = htmlspecialchars($data["password"]);
		$role = 'user';

		// 1. cek apakah username sudah digunakan atau belum
		$this->db->query("SELECT * FROM user WHERE username=:username");
		$this->db->bind('username' , $username);
		
		

		if ($this->db->single()) return false;

		// 2. acak password menggunakan password hash
		$password = password_hash($password, PASSWORD_DEFAULT);

		// 3. masukkan data ke database
		$this->db->query("INSERT INTO user 
							VALUES 
						('' , :username , :password , :email , :role)");
		$this->db->bind('username' , $username);
		$this->db->bind('password' , $password);
		$this->db->bind('email' , $email);
		$this->db->bind('role' , $role);
		$this->db->execute();

		// 4. return value baris yang berubah
		return $this->db->affectedRows();



	}


}