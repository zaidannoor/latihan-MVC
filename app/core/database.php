<?php 

class database{
	private $db_name = DB_NAME;
	private $host = DB_HOST;
	private $pass = DB_PASS;
	private $user = DB_USER;

	private $dbh;
	private $stmt;

	// Php Database Object
		public function __construct(){
			// membuat koneksi ke database menggunakan PDO
			// database source name , diisi alamat database dan nama database
			$dsn = "mysql:host=$this->host;dbname=$this->db_name";

			$option = [
				PDO::ATTR_PERSISTENT => true ,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

			];


			try{
				$this->dbh = new PDO($dsn , $this->user , $this->pass, $option);
			} catch(PDOException $e){ // jika error masukkan ke variabel e
				die($e->getMessage()); // tampilkan pesan kesalahan
			}
		}


		public function query($query){
			// mengambil query ke database
			// 1. diprepare terlebih dahulu
			$this->stmt = $this->dbh->prepare($query);

			// // 2. eksekusi query
			// $this->stmt->execute();
			// // 3. Ambil datanya
			// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

		}

		public function bind($param,$value,$type = null){

			// mengecek bahwa type masih null
			if (is_null($type)) {

				if (is_int($value)) {
					$type = PDO::PARAM_INT;
				}
				else if (is_bool($value)) {
					$type = PDO::PARAM_BOOL;
				}
				else if (is_null($value)) {
					$type = PDO::PARAM_NULL;
				}
				else{
					$type = PDO::PARAM_STR;
				}


			}

			$this->stmt->bindValue($param,$value,$type);
		}
	

		public function execute(){
			$this->stmt->execute();
		}

		public function resultSet(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function single(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function affectedRows(){
			return $this->stmt->rowCount();
		}

}



 ?>