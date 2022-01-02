

<div class="card mx-auto bg-light" style="width: 23rem; margin-top: 120px;">
  <div class="card-body">
    <h1 class="card-title text-center">Registrasi</h1>
    <?php flasher::flash(); ?>

    <form method="post" action="<?php BASEURL; ?>registrasi/addUser">
    	<div class="mb-3">
		  <label for="email" class="form-label">Email Address</label>
		  <input type="email" class="form-control" id="email" name="email" placeholder="example, zaidan@gmail.com" required="">
		</div>
  		<div class="mb-3">
		  <label for="username" class="form-label">Username</label>
		  <input type="text" class="form-control" id="username" name="username" placeholder="username" required="">
		</div>
		<div class="mb-3">
		 <label for="password" class="form-label">Password</label>
		  <input type="password" class="form-control" id="password" name="password" placeholder="Atleast 8 character" required="">
		</div>
  		<button type="submit" name="submit" class="btn btn-dark" style="width: 100%;">Submit</button>
	</form>
    <a href="#" class="card-link text-dark">Lupa Password</a>
    <p class="mt-1">Sudah punya akun? 
		<span class="badge bg-info">
			<a href="<?php BASEURL; ?>login" class="text-decoration-none text-dark fw-bold">Login</a>
		</span>
	</p>
  </div>
</div>