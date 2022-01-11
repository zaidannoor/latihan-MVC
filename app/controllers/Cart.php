<?php 


class Cart extends Controller{
	public function index(){
		if (!isset($_SESSION['login'])) header('location: ' . BASEURL .'login');
		
		if (isset($_POST['add_to_cart'])){
			if ($this->model('produk_model')->addToCart($_POST) > 0) {
				flasher::setFlash('Your Product' , ' has been added to cart' , 'success');
			}
			else{
				flasher::setFlash('Your product' , 'failed to add to cart' , 'danger');	
			}
		}	
		
		$data['judul'] = 'Cart';
		$this->view('templates/header' , $data);
		$this->view('templates/navbar');
		$this->view('cart/index',$data);
		$this->view('templates/copyright');
		$this->view('templates/footer');
		echo("<pre>");
		var_dump($_SESSION['shopping_cart']);
		var_dump(count($_SESSION['shopping_cart']));
		echo("</pre>");
	}

	public function delete($id){
		if ($this->model('produk_model')->deleteProductFromCart($id) > 0) {
			flasher::setFlash('Your Product' , ' has been deleted from cart' , 'success');
		}
		else{
			flasher::setFlash('Your Product' , ' failed to delete from cart' , 'danger');
		}

		header('location: ' . BASEURL .'cart');

	}
}