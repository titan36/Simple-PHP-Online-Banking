<?php
include('config.php');
include('clean_xxs.php');
if (strlen($_SESSION['phone'] != 0)) {
	if (isset($_POST['changepass'])) {
		$oldpass = md5(clean_xss($_POST['password']));
		$newpass = clean_xss($_POST['new_password']);
		$hashed = md5($newpass);
		$confpass = clean_xss($_POST['confirm_password']);
		$user = $_SESSION['phone'];
		$sql = "select * from users where phone = '$user' and password = '$oldpass'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($newpass == $confpass) {
			$update = "update users set password = '$hashed' where phone = '$user'";
			if(mysqli_query($con,$update)){
				$_SESSION['msg'] = "You have changed your password successfuly";
			}
			else{
				$_SESSION['msg'] = "Failed to change password";
			}
		}
		else{
				$_SESSION['msg'] = "Failed to change password";
			}
		
				
			}

	if (isset($_POST['update'])) {
		$fname = clean_xss($_POST['fname']);
		$lname = clean_xss($_POST['lname']);
		$phone = clean_xss($_POST['phone']);
		$user = $_SESSION['phone'];
		$sql = "select * from users where phone = '$user'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$update = "update users set fname = '$fname', lname = '$lname', phone = '$phone' where phone = '$user'";
			if(mysqli_query($con,$update)){
				$_SESSION['msg'] = "You have updated your profile successfuly";
				$_SESSION['phone'] = $phone;
			}
			else{
				$_SESSION['msg'] = "Failed to update profile";
			}
		}
	}
else{
$_SESSION['msg'] = "Please try later";
header("location:index.php");
}


include('header.php');
?>

<section id="" class="d-flex align-items-center">
  <div class="container">
		<div class="row justify-content-center">
      <div class="col-lg-6 col-sm-9 col-md-7 mx-auto">
        <div class="card card-signin my-5">
        	<div class="card-header bg-primary">Profile</div>
          <div class="card-body">
            <form class="form-signin" action="<?php $_PHP_SELF ?>" method="POST">
              <h4 style="color:red;"><?php if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
              } 
              
            ?></h4>
							
								
									<?php
									$user = $_SESSION['phone'];
									$sql = "select * from users where phone='$user'";
									$select = mysqli_query($con, $sql);
									$result = mysqli_fetch_assoc($select);

									 ?>
							<div class="form-label-group">
								<h5>First Name</h5>
								<input type="text" class="form-control" name="fname" value="<?php echo $result['fname']; ?>">
							</div>	
							<div class="form-label-group">
								<h5>Last Name</h5>
								<input type="text" class="form-control" name="lname" value="<?php echo $result['lname']; ?>">
							</div>
							<div class="form-label-group">	
								<h5>Account Number</h5>
								<input type="number" class="form-control" value="<?php echo $result['account_number']; ?>" disabled>
							</div>
							<div class="form-label-group">
								<h5>Phone Number</h5>
								<input type="number" class="form-control" name="phone" value="<?php echo $result['phone']; ?>">
							</div>
							<div class="form-label-group">
								<h5>Balance</h5>
								<input type="number" class="form-control" value="<?php echo $result['balance']; ?>" disabled></li>
							</div>
									
									
								</ul>
								<div class="form-label-group text-center">
									<button type="submit" class="btn btn-primary" name="update">Update</button>
								</div>
							<div class="form-label-group">

							</div>
							</form>
					
          </div>
        </div>
      </div>
            <div class="col-lg-6 col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
        	<div class="card-header bg-primary">Change Password</div>
          <div class="card-body">
            <form class="form-signin" action="<?php $_PHP_SELF ?>" method="POST">
              <h4 style="color:red;"><?php if(isset($_SESSION['msg1'])) {
                echo $_SESSION['msg1'];
                $_SESSION['msg1'] = "";
              } 
              
            ?></h4>
							<div class="form-label-group">
								
								<input type="text" class="form-control" name="password" placeholder="Current Password">
							</div>
							<div class="form-label-group">
								<input type="password" class="form-control" name="new_password" placeholder="New Password">
							</div>
							<div class="form-label-group">
								<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
							</div>
							<div class="form-label-group text-center">
								<button type="submit" class="btn btn-block btn-primary" name="changepass">Change Password</button>
								
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


