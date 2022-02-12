<?php
include('config.php');
include('clean_xxs.php');
if (strlen($_SESSION['phone'] != 0)) {

}

include('header.php');

?>
<section id="" class="d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-sm-9 col-md-7">
        <div class="card card-signin">
          <div class="card-header bg-primary">Transactions</div>
          <div class="card-body">
       
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Time</th>
                
            </tr>
        </thead>
        <tbody>
          <?php
          $num = 0;
          $user = $_SESSION['account_number'];
          $sql = "select * from transactions where sender='$user' or receiver = '$user'";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result)){
            $num++;
           ?>
             <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo $row['sender']; ?></td>
                <td><?php echo $row['receiver']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['time']; ?></td>
                
              </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include('footer.php'); ?>
</body>

</html>

