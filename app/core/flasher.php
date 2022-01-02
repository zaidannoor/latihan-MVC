<?php 

	class flasher{

		public static function setFlash($pesan , $aksi, $tipe){
			// aksi yaitu aksinya apa, contohnya tambah,ubah,hapus
			// pesan yaitu isi pesannya apa apakah berhasil atau gagal
			// tipe yaitu menunjukan warna untuk kelas bootstrap nya
			$_SESSION['flash'] = [
					'pesan' => $pesan ,
					'aksi' => $aksi ,
					'tipe' => $tipe
			];
		}

		public static function flash(){
			if (isset($_SESSION['flash'])) {
				echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] .' alert-dismissible fade show text-center" style="font-size: 14px;" role="alert">
					  <strong>' . $_SESSION['flash']['pesan'] . ' </strong>' . $_SESSION['flash']['aksi'] . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';	
				unset($_SESSION['flash']);	  
			}

		}
	}


 ?>