    <header class="bg-secondary py-5">
    	<div class="container mx-auto my-5">
    		<div class="text-center text-white">
    			<h1 class="display-4 fw-bolder">Input Produk</h1>
    		</div>
    	</div>
    </header>
	<section>
        <div class="container py-3 px-3">
            <form method="post" enctype="multipart/form-data" action="<?= BASEURL; ?>produk/inputproduk">
                <div class="form-group mb-3">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="nama produk" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" placeholder="deskripsi produk" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="harga produk(rupiah)" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="stock">Stok</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="stok barang" required="">
                </div>
                <div class="mb-3">
					<label for="image" class="form-label">Gambar</label>
  					<input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark" name="submit" style="width: 20%;">Submit</button>

                </div>
                
            </form>
        </div>
		
	</section>