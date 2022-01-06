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
		if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin') {
			if ($this->model('produk_model')->inputProductToDatabase($_POST) > 0) {
				flasher::setFlash('Your Product' , ' has been added successfully' , 'success');
			}
			else{
				flasher::setFlash('Your product' , 'failed to add' , 'danger');	
			}
			
		}

		header('location: ' . BASEURL .'home');	
	}


	public function delete($id){
		if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin') {
			if ($this->model('produk_model')->deleteProduct($id) > 0) {
				flasher::setFlash('Your Product' , ' has been Deleted successfully' , 'success');
			}
			else{
				flasher::setFlash('Your Product' , ' failed to delete' , 'success');
			}
		}
		header('location: ' . BASEURL .'home');
	}
	

	public function update($id){
		$data['judul'] = 'update';
		$data['produk'] = $this->model('produk_model')->getProductByID($id);
		//var_dump($data['produk']);
		$this->view('templates/header' , $data);
		$this->view('templates/navbar');
		$this->view('produk/update',$data);
		$this->view('templates/copyright');
		$this->view('templates/footer');
	}


	public function updateData(){
		if (!isset($_POST['submit'])) header('location: ' . BASEURL .'home');
			
		
		if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin') {
			if ($this->model('produk_model')->updateProduct($_POST) > 0) {
				flasher::setFlash('Your Product' , ' has been updated successfully' , 'success');
			}
			else{
				flasher::setFlash('Your product' , 'failed to update' , 'danger');	
			}
		}

		header('location: ' . BASEURL .'home');
	}



		
}

