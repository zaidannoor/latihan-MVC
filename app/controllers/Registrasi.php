<?php 


class Registrasi extends Controller{
	public function index(){
		$data['judul'] = 'Registrasi';
		//$data['nama'] = $this->model('user_model')->Getname();
		$this->view('templates/header' , $data);
		$this->view('Registrasi/index',$data);
		$this->view('templates/footer');
	}

	public function addUser(){
		if (isset($_POST['submit'])) {
			if ($this->model('user_model')->addNewUser($_POST) > 0) {
				header('location: ' . BASEURL .'login');
			}
			else{
				flasher::setFlash('Sorry, your username already taken.' , 'Please use other username' , 'danger');
				header('location: ' . BASEURL .'registrasi');
			}
		}
		else{
			header('location: ' . BASEURL .'registrasi');
		}
	}
}