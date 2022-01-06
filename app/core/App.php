<?php 

class App{
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		
		$url = $this->parseURL();
		// 1. mengambil controller dari url
		// cek apakah controller yang dimasukkan di url ada di dalam file kita
		// jika ada maka controller default akan ditimpa dengan yang di url
		if (isset($url[0])) {
			if (file_exists('../app/controllers/' . $url[0] . '.php')) {
				// menimpa isi dari controller jika ada
				$this->controller = $url[0];
				unset($url[0]);
			}
		}
		
		// memanggil file controller 
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller; // instance controller


		// 2. mengambil method dari url
		// cek apakah ada methode yang dimasukkan ke url
		if (isset($url[1])) {
			// jika ada maka
			// cek apakah method yang di url ada di dalam controller
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// 3. mengambil parameter dari url
		if (!empty($url)) {
			$this->params = array_values($url);
		}

		// 4. Menjalankan controller dan method yang ada di file controller
		call_user_func_array([$this->controller , $this->method], $this->params);

		// echo('<pre>');
		// var_dump($url);
		// echo('</pre>');
	}

	// tahap tahap routing yaitu mengonfigurasi URL agar rapih
	// routing sisanya ada di htaccess
	// function untuk memecah url yang diambil dari $_GET
	public function parseURL(){
		if (isset($_GET['url'])) {
			// menghapus tanda / dibelakang url jika ada
			$url = rtrim($_GET['url'] , '/');
			// memfilter url nya agar tidak ada url yang aneh
			$url = filter_var($url , FILTER_SANITIZE_URL);
			// memecah url yang ada menjadi array array
			$url = explode('/', $url);
			return $url;
		}
	}




}

 ?>