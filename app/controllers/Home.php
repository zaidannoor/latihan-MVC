<?php 


class Home extends Controller{
	public function index(){
		$data['judul'] = 'Home';
		$data['produk'] = $this->model('produk_model')->getAllProduct();
		//$data['nama'] = $this->model('user_model')->Getname();

		$this->view('templates/header' , $data);
		$this->view('templates/navbar');
		$this->view('home/index',$data);
		$this->view('templates/copyright');
		$this->view('templates/footer');
	}

	public function logout(){
		if (isset($_SESSION['login'])) {
			$this->model('user_model')->logoutAccount();
		}

		header("location: " . BASEURL . "login");
		
	}
}