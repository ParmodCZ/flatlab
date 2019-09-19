<?php 
	//session_start();
	include('header.php'); 
	// if (isAdmin()) {
		// print_r($_SESSION); die('55');
		// $_SESSION['msg'] = "You must log in first";
		// header('location: index.php');
	// }
?>

    <div class="container">

      <form class="form-signin" method="post" action="login.php">
        <h2 class="form-signin-heading">sign in now</h2>
		<?php echo display_error('auth'); ?>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
			<?php echo display_error('username'); ?>
            <input type="password" class="form-control" name="password" placeholder="Password">
			<?php echo display_error('password'); ?>
           <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label> -->
            <button class="btn btn-lg btn-login btn-block" type="submit" name="login_btn">Sign in</button>
         <!--   <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>  -->

        </div>

          <!-- Modal -->
       <!--   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div> -->
          <!-- modal -->
      </form>
    </div>

