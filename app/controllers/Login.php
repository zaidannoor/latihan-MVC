<?php 

class Login extends Controller{
	public function index(){
		if (!isset($_SESSION['login'])) {
			$data['judul'] = 'login';
			//$data['nama'] = $this->model('user_model')->Getname();
			$this->view('templates/header' , $data);
			$this->view('login/index',$data);
			$this->view('templates/footer');
		}
		else{
			header('location: ' . BASEURL .'home');
		}
		
	}

	public function check(){
		if (isset($_POST['submit'])) {
			if ($this->model('user_model')->loginAccount($_POST) > 0) {
				header('location: ' . BASEURL .'home');
			}
			else{
				flasher::setFlash('sorry, your username or password was incorrect.' , 'Please double check your username or password' , 'danger');
				header('location: ' . BASEURL .'login');
			}
		}
		else{
			header('location: ' . BASEURL .'login');
		}
	} 
}