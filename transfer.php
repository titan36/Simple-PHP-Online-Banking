<?php
include('config.php');
include('clean_xxs.php');
if (strlen($_SESSION['phone'] != 0)) {
	if (isset($_POST['transfer'])) {
		$receiver = clean_xss($_POST['account_number']);
		$amount = clean_xss($_POST['amount']);
		$sender = $_SESSION['phone'];
		$receiversql = "select * from users where account_number = '$receiver'";
		$result = mysqli_query($con, $receiversql);
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$raccount_number = $row['account_number'];
			$receiver_amount = $row['balance'];

			$sendersql = "select * from users where phone = '$sender'";
			$result1 = mysqli_query($con, $sendersql);
			$row1 = mysqli_fetch_assoc($result1);
			
			$saccount_number = $row1['account_number'];
			$sender_amount = $row1['balance'];

			$receiver_amount = $receiver_amount+$amount;
			$sender_amount = $sender_amount-$amount;
	
			
			$supdatesql = "update users set balance = '$sender_amount' where phone = '$sender'";
			$update1 = mysqli_query($con,$supdatesql);
			$rupdatesql = "update users set balance = '$receiver_amount' where account_number = '$receiver' ";
			$update = mysqli_query($con,$rupdatesql);
			if($update1){
				if($update){
				$_SESSION['msg'] = "You have transfered ".$amount." Birr Successfully";
				$sql = "INSERT INTO transactions(sender,receiver, amount) VALUES('$saccount_number','$raccount_number','$amount')";
				mysqli_query($con, $sql);
			}
			else{
				$_SESSION['msg'] = "Transfer failed";
			}
			}	
				
			else{
				$_SESSION['msg'] = "Transfer failed";
			}	
					

		}
		else{

			$_SESSION['msg'] =  "Failed to transfer";
		}
	}
		
}
else{
$_SESSION['msg'] = "Please try later";
header("location:index.php");
}


include('header.php');
?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
		<div class="row justify-content-center">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
        	<div class="card-header bg-primary">Transfer Money</div>
          <div class="card-body">
            <form class="form-signin" action="<?php $_PHP_SELF ?>" method="POST">
              <h4 style="color:red;"><?php if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
              } 
              
            ?></h4>
							<div class="form-label-group">
								
								<input type="number" class="form-control" name="account_number" placeholder="Enter Receiver account">
							</div>
							<div class="form-label-group">
								<input type="amount" class="form-control" name="amount" placeholder="Enter amount">
							</div>
							<div class="form-label-group text-center">
								<button type="submit" class="btn btn-block btn-primary" name="transfer">Send</button>
								
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


