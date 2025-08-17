<div class="header sticky-top">
  <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="index_home.php">
        <img src="img\logo.png"/>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
        <ul class="navbar-nav">
          <?php
          //Check if user is loging or not
          if (!isset($_SESSION["user_id"])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page"data-bs-toggle="modal" data-bs-target="#signup-modal">
                  <i class="fas fa-user"></i>Signup
              </a> 
            </li>           
            <div class="nav-vl"></div>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#login-modal">
                <i class="fas fa-sign-in-alt"></i>Login
              </a>
            </li>
            <?php
          }
          else{
            ?>
            <div class='nav-name'>
                Hi, <?php echo $_SESSION["full_name"] ?>
          </div>
          <li class="nav-item">
              <a class="nav-link" href="dashboardM.php">
                  <i class="fas fa-user"></i>Dashboard
              </a> 
            </li> 
            <div class="nav-vl"></div>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>Logout
              </a>
            </li> 
            <?php
          }
          ?>
        </ul>
      </div>
   </nav>
</div>
