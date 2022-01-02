<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <h2><a class="navbar-brand" href="<?php BASEURL; ?>">E L J I</a></h2>
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?php BASEURL; ?>home">Home</a>
      </div>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <?php if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin"):?>
            <a class="nav-item nav-link" href="input_produk.php">Tambah produk</a>
          <?php endif; ?>
        </div>
        <div class="navbar-nav ms-auto">
          <a class="nav-item nav-link " href="cart.php"><img src="img/cart.png" width="25px" height="25px"alt=""></a>
          <?php if(isset($_SESSION["login"])): ?>
            <a class="nav-item nav-link " href="<?php BASEURL; ?>home/logout">Logout</a>
          <?php else : ?>
            <a class="nav-item nav-link " href="<?php BASEURL; ?>login">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>