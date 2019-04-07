<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top" id="navbar-home">

  <!-- Apllication -->
  <a class="navbar-brand ml-4" href="../index.php"><i class="fas fa-ticket-alt"></i> Tukutiket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- All Page -->
  <div class="collapse navbar-collapse" id="navbarText">

    <!-- Tools -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
              <?php
                if(isset($_SESSION['name'])){
                  $name = $_SESSION['name'];
                  echo $name;
                }
              ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <?php
                if(isset($_SESSION['name'])){
            ?>
              <a class="dropdown-item" href="../function/logout.php">Logout</a>
            <?php } else { ?>
              <a class="dropdown-item" href="../user/login.php">Login</a>
              <a class="dropdown-item" href="../user/register.php">Register</a>
            <?php } ?>
        </div>
      </li>
    </ul>
  </div>

</nav>