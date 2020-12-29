<div class="row">
  <div class="container-fluid mt-5">
    <div class="row  d-flex justify-content-center align-items-center">
      <div class="col-xl-4 col-xs-12 align-self-center">
        <div class="card login-card">
          <form method="post" action="<?php base_url();?>authenticate_login">
            <div class="card-header">
              CTI Admin Login
            </div>
            <div class="card-body">
                <div class="form-group">
                  <small class="form-text text-danger"><?php echo isset($_SESSION['violation'])?$_SESSION['violation']:""; ?></small>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
