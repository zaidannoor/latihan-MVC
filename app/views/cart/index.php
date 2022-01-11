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
			<?php flasher::flash(); ?>
			<h1>Cart</h1>
			<!-- menampilkan isi dari database ke dalam bentuk card -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nama Produk</th>
						<th width="10%">Jumlah</th>
						<th width="20%">Harga</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"])){
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $cart){
					?>
					<tr>
						<td><?php echo $cart["produk_name"]; ?></td>
						<td><?php echo $cart["produk_quantity"]; ?></td>
						<td>Rp. <?php echo number_format($cart["produk_price"], 2); ?></td>
						<td>Rp. <?php echo number_format($cart["produk_quantity"] * $cart["produk_price"], 2);?></td>
						<td><a href="<?= BASEURL . 'cart/delete/' . $cart['produk_id'] ?>"><span class="text-danger">Hapus</span></a></td>
					</tr>
					<?php
							$total = $total + ($cart["produk_quantity"] * $cart["produk_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="left" style="font-weight: bold;">Total</td>
						<td align="left" style="font-weight: bold;">Rp. <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
            <div class="py-3">
				<form action="transaksi.php" method="post">
					<input type="hidden" name="hidden_total" value="<?php echo $total; ?>">
					<button class="btn btn-success float-end"style="width: 15%;">Check out</button>
				</form>
            </div>
			
		</div>
	</section>