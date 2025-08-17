<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="login-modal">Login here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="login-form" class="form" role="form" method="post"action="api/login-submit.php">
              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="fas fa-user"></i>
                      </span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>

              <div class="input-group form-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="fas fa-lock"></i>
                      </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary">Login</button>
              </div>
          </form>
      </div>

      <div class="modal-footer">
          <span>
              <a href="#" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signup-modal">Click here </a>
              to register a new account
          </span>
          </div>
        </div>
      </div>
    </div>