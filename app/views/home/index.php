
<header class="bg-secondary py-5">
	<div class="container mx-auto my-5">
		<div class="text-center text-white">
			<h1 class="display-4 fw-bolder">E L J I</h1>
			<p class="lead fw-normal text-white-50 mb-0">Your tech shop</p>
		</div>
	</div>
</header>

<section class="py-5">
		<div class="container px-4 px-lg-5 mt-5">
			<h1>List Produk</h1>
			<!-- menampilkan isi dari database ke dalam bentuk card -->
			<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
			<?php foreach ($data['produk'] as $produk) : ?>
				<div class="col-md mb-5">
          			<div class="card h-100">		
          				<?php if(isset($_SESSION["role"])) : // pengecekan role ?>
          					<?php if($_SESSION["role"] == "admin") : ?>
          						<div class="badge bg-warning position-absolute" style="top: 0.5rem; left: 0.5rem"><a href="update.php?id=<?php echo($produk["id"]); ?>" class="text-dark">Update</a></div>
          						<div class="badge bg-danger position-absolute" style="top: 2rem; left: 0.5rem"><a href="delete.php?id=<?php echo($produk["id"]); ?>" class="text-dark" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">	Delete</a></div>
          					<?php endif; ?>
          				<?php endif; ?>

          				<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            			<img class="card-img-top" src="<?php echo($produk["image_path"]); ?>">
            			<div class="card-body p-2">
            				<div class="text-center">
            					<h4><?php echo($produk["name"]); ?> </h4>
	             				<p class="card-text"><?php echo($produk["description"]);  ?> </p>
	             				<p class="card-text font-weight-bold" style="font-weight: bold ">Harga : Rp <?php echo($produk["price"]);  ?> </p>
	             				<p class="card-text">Stock : <?php echo($produk["stock"]);  ?> </p>

            				</div>
            			</div>
            			<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
							<form action="cart.php" method="post" class="text-center">
								<label for="quantity">Jumlah</label>
								<input type="hidden" name="id" value="<?php echo $produk["id"]; ?>" />
								<input type="text" name="quantity" value="1" class="form-control mx-auto mb-2" style="width: 50px;" />
								<input type="hidden" name="hidden_name" value="<?php echo $produk["name"]; ?>" />
								<input type="hidden" name="hidden_price" value="<?php echo $produk["price"]; ?>" />
								<input type="hidden" name="hidden_stock" value="<?php echo $produk["stock"]; ?>" />
								<input type="submit" name="add_to_cart"class="btn btn-outline-dark mt-auto" value="Add to Cart"/>
							</form>
						</div>
          			</div>
        		</div>
        		
			<?php endforeach;  ?>
			</div>
			
		</div>
	</section>