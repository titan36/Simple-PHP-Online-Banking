<?php
//include('sendmail.php');
include('config.php');
include('clean_xxs.php');

if(isset($_POST['submit'])){
	$phone = clean_xss($_POST['phone']);
	$pass = md5(clean_xss($_POST['password']));
	$select_sql = "select * from users where phone='$phone' and password='$pass'";
	$select = mysqli_query($con, $select_sql);
	$number = mysqli_num_rows($select);
	$current_user = mysqli_fetch_assoc($select);
	if($number == 1){
		$_SESSION['phone'] = $phone;
		$_SESSION['account_number'] = $current_user['account_number'];
		$_SESSION['msg'] = "You have been Logged in successfuly";
		header("location:index.php");
	} 
	else{
		$_SESSION['msg'] = "Login Field, Please check your phone and Password";
		//header("location:index.php");
	}

}
include('header.php');

 ?>



  <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container">
		<div class="row justify-content-center">
      <div class="col-lg-6 col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
           <div class="card-header bg-primary">Sign In</div>
          <div class="card-body">
           
            <form class="form-signin" action="<?php $_PHP_SELF ?>" method="POST">
              <h4 style="color:red;"><?php if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
              } 
              
            ?></h4>
              <div class="form-label-group">
                <input type="number" id="phone" class="form-control" name="phone" placeholder="Enter Phon number" required autofocus>
                
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Enter Your Password" required>
               
              </div>

              <div class="text-center">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Sign in</button>
              </div>
              
              <hr class="my-4">
        <h5>Are you new? <a href="register.php">Register</a></h5>
            </form>
          </div>
        </div>
      </div>
		</div>
	</div>
</section><!-- End Hero -->

<?php include('footer.php'); ?>
</body>
</html>
