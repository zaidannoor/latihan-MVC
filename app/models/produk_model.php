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

	public function getProductByID($id){
		$this->db->query("SELECT * FROM product WHERE id=:id");
		$this->db->bind('id' , $id);
		return $this->db->single();
	}

	public function uploadImage(){
		$namaFile = $_FILES["image"]["name"];
		$ukuranFile = $_FILES["image"]["size"];
		$tmpFile = $_FILES["image"]["tmp_name"];
		$errorFile = $_FILES["image"]["error"];


		// jika gambar tidak diupload
		if ($errorFile == 4) {
			echo(
				"<script>
					alert('gambar tidak diupload, mohon untuk upload gambar');
				</script>
				"
			);
			return false;
		}

		// mengecek format file yang diupload
		$formatFileValid = ["jpg" , "jpeg" , "png"];
		$format = pathinfo($namaFile , PATHINFO_EXTENSION);
		if ( !in_array($format, $formatFileValid)) {
			echo(
				"<script>
					alert('extensi file yang diupload tidak cocok , pastika extensi file adalah jpg, jpeg, atau png')
				</script>
				"
			);
			return false;
		}

		// mengecek ukuran file besar atau kecil
		if ($ukuranFile > 1000000) {
			echo(
				"<script>
					alert('file yang diupload terlalu besar, maksimal ukuran file adalah 1 mb')
				</script>
				"
			);
			return false;
		}

		// jika lolos semua seleksi maka file siap diupload
		// mengubah nama dan tempat penyimpanan file
		// file akan disimpan di folder img/img-produk
		$namaFile = uniqid();
		$namaFile = $namaFile . '.' . $format;
		$image_path = 'img/img-produk/'. $namaFile;
		move_uploaded_file($tmpFile , $image_path); 
		
		return $image_path;
	}

	public function inputProductToDatabase($data){
		// ambil data dari inputan user
		$name = htmlspecialchars($data["name"]);
		$description = htmlspecialchars($data["description"]);
		$price = htmlspecialchars($data["price"]);
		$stock = htmlspecialchars($data["stock"]);
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');

		$image_path = $this->uploadImage();
		if (!$this->uploadImage()){
			return false;
		}

		$query = "INSERT INTO product
					VALUES ('' , :name , :description , :price , :stock , :image_path , :waktu , :waktu)";

		$this->db->query($query);
		$this->db->bind('name' , $name);
		$this->db->bind('description' , $description);
		$this->db->bind('price' , $price);
		$this->db->bind('stock' , $stock);
		$this->db->bind('image_path' , $image_path);
		$this->db->bind('waktu' , $waktu);
		$this->db->execute();
		
		return $this->db->affectedRows();
		
	}

	public function deleteProduct($id){
		$query = "DELETE FROM product WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id' , $id);
		$this->db->execute();

		return $this->db->affectedRows();
	}

	public function updateProduct($data){
		$id = $data["id"];
		$name = htmlspecialchars($data["name"]);
		$price = htmlspecialchars($data["price"]);
		$stock = htmlspecialchars($data["stock"]);
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d H:i:s');
		$errorFile = $_FILES["image"]["error"];
		$imageLama = $data["imageLama"];

		// pengecekan apakah deskripsi kosong atau tidak
		if (htmlspecialchars($data["description"]) == '') {
			// jika kosong pake, deskripsi yang lama
			$description = $data["descriptionLama"];
		}
		else{
			// kalo ada pake yang baru
			$description = htmlspecialchars($data["description"]);
		}

		// pengecekan apakah image kosong atau tidak
		if ($errorFile == 4) { // jika kosong, pakai image yang lama
			$image_path = $imageLama;
		}
		else{ // jika ada, pakai image yang baru
			$image_path = $this->uploadImage();
		}

		$query = "UPDATE product SET 
					name=:name , description=:description, 
					price=:price , stock=:stock , 
					image_path=:image_path , updated_at=:waktu 
					WHERE id=:id";

		$this->db->query($query);
		$this->db->bind('id' , $id);
		$this->db->bind('name' , $name);
		$this->db->bind('description' , $description);
		$this->db->bind('price' , $price);
		$this->db->bind('stock' , $stock);
		$this->db->bind('image_path' , $image_path);
		$this->db->bind('waktu' , $waktu);
		$this->db->execute();

		return $this->db->affectedRows();







	}

	

}