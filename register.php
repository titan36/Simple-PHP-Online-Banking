<?php
include('config.php');
include('clean_xxs.php');

if(isset($_POST['submit'])){
	$fname = clean_xss($_POST['fname']);
	$lname = clean_xss($_POST['lname']);
	$phone = clean_xss($_POST['phone']);
	$pass = md5(clean_xss($_POST['password']));
	$select_sql = "select * from users where phone='$phone'";
	$select = mysqli_query($con, $select_sql);
	$number = mysqli_num_rows($select); 
	if($number > 0){
		$_SESSION['msg'] = "Account Already Exist";
	}
	else{
		$sql = "INSERT INTO users(fname, lname, phone, password) VALUES('$fname', '$lname', '$phone', '$pass')";
		$insert = mysqli_query($con,$sql);
		if($insert){
			$_SESSION['msg'] = "You have been registered successfuly";
			header("location:login.php");
			
		}
		else{
			$_SESSION['msg'] = "Registration Field, Please try Later";
		}
	}


	

}
include('header.php');
 ?>


<section id="hero" class="d-flex align-items-center">
	<div class="container">
		<div class="row justify-content-center">
      <div class="col-lg-6 col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
        	 <div class="card-header bg-primary">Registration</div>
          <div class="card-body">
            <form class="form-signin" action="<?php $_PHP_SELF ?>" method="POST">
              <h4 style="color:red"><?php if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
              } 
              
            ?></h4>
							<div class="form-label-group">
								
								<input type="text" id="lname" class="form-control" name="fname" placeholder="Enter your first name" required autofocus>
								
							</div>
							<div class="form-label-group">
						
								<input type="text" id="lname" class="form-control" name="lname" placeholder="Enter your Last name" required>
								
							</div>
							<div class="form-label-group">
							
								<input type="number" id="phone" class="form-control" name="phone" placeholder="Enter your Phone number" required>
								
							</div>
							<div class="form-label-group">
								
								<input type="password" id="password" class="form-control" name="password" placeholder="Enter your Password" required>
							
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-block btn-primary" name="submit">Register</button>
							</div>
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

