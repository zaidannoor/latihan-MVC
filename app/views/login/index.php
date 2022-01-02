

<div class="card mx-auto bg-light" style="width: 23rem; margin-top: 120px;">
  <div class="card-body">
    <h1 class="card-title text-center">Login</h1>
    <?php flasher::flash(); ?>

    <form method="post" action="<?php BASEURL; ?>login/check">
  		<div class="mb-3">
		  <label for="username" class="form-label">username</label>
		  <input type="text" class="form-control" id="username" placeholder="username" name="username"> 
		</div>
		<div class="mb-3">
		 <label for="password" class="form-label">password</label>
		  <input type="password" class="form-control" id="password" placeholder="password" name="password">
		</div>
  		<button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Submit</button>
	</form>
    <a href="#" class="card-link text-dark">Lupa Password</a>
    <p class="mt-1">Belum punya akun? 
		<span class="badge bg-info">
			<a href="<?php BASEURL; ?>registrasi" class="text-decoration-none text-dark fw-bold">Registrasi</a>
		</span>
	</p>
  </div>
</div>