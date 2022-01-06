<?php 


class Produk extends Controller{
	public function index(){
		$data['judul'] = 'input produk';
		if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin') {
			$this->view('templates/header' , $data);
			$this->view('templates/navbar');
			$this->view('produk/index',$data);
			$this->view('templates/copyright');
			$this->view('templates/footer');
		}
		else{
			header('location: ' . BASEURL .'home');
		}	
	}


	public function inputProduk(){
			if ($this->model('produk_model')->inputProdukToDatabase($_POST) > 0) {
				flasher::setFlash('Your Product' , ' has been added successfully' , 'success');
				echo("Berhasil");
				die();
				header('location: ' . BASEURL .'home');
			}
			else{
				flasher::setFlash('Your product' , 'failed to add' , 'danger');
				echo('Gagal');
				die();
				header('location: ' . BASEURL .'home');
			}
		
		

			
	}
	



	// public function update($id){
	// 	echo 'Hello';
	// 	$data['judul'] = 'update';

	// 	$this->view('templates/header' , $data);
	// 	$this->view('templates/navbar');
	// 	$this->view('produk/update',$data);
	// 	$this->view('templates/copyright');
	// 	$this->view('templates/footer');
	// }
		
}

