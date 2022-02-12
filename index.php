<?php
include('config.php');
include('clean_xxs.php');
include('sendmail.php');
if (isset($_POST['send'])) {
  $name = clean_xss($_POST['name']);
  $email = clean_xss($_POST['email']);
  $subject = clean_xss($_POST['subject']);
  $message = clean_xss($_POST['message']);
  $sql = "INSERT INTO messages(name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $_SESSION['msg'] = "Thank you! your massage sent successfuly";
  }
  else{
    $_SESSION['msg'] = "Sorry! your massage not sent successfuly";

  }
}

if (isset($_SESSION['phone'])) {
  $loggedin = $_SESSION['phone'];
  $sql = "select * from users where phone = '$loggedin'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $fullname = $row['fname']." ".$row['lname'];
  $_SESSION['fullname'] = $fullname;
  $account_number = $row['account_number'];
  $balance = $row['balance'];

  $sql1 = "select * from transactions where sender = '$account_number' or receiver = '$account_number'";
  $result = mysqli_query($con, $sql1);
  $numoftransaction = mysqli_num_rows($result);
}

 ?>
 <?php if(isset($_SESSION['msg'])) {
    echo '<div class="alert alert-primary">';
    echo '<h4 style="color:red;">';
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo "</h4>";
              } 
              
            ?>
<?php
include('header.php');
 ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>FetanBirr</span></h1>
      <h2>Fast, Simple and Secure Online Banking</h2>
      <div class="d-flex">
        <a href="login.php" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
     
    </section><!-- End About Section -->

   

    <!-- ======= Counts Section ======= -->
    
    <?php
    if (isset($_SESSION['phone'])) { ?>
      <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $balance; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Current Balance</p>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $numoftransaction;  ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Transaction</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <?php }
    else{ ?>

      <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="10000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-list"></i>
              <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Transaction per day</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-clock"></i>
              <span class="">24/7</span>
              <p>Working hours</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->

   <?php  }   ?>
    

    

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Enanu Tesfaye</h3>
               
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fast and Simple Online Banking I have ever seen.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Adefris Belachew</h3>
                <h4>Farmer and Solider</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  በጣም ቀላል የክፍያ ስርዐት። ዕናመስግና
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Ride</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  A Banking System that every business rely on.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

           

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

   

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>Our Hardworking <span>Team</span></h3>
          
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ruth Endale</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                 <h4>Mahilet Manaye</h4>
                <span>Website Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Kewser Jemal</h4>
                <span>Front end Developer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Tito Hailu</h4>
                <span>FullStack Developer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-5.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Melat Tadesse</h4>
                <span>Database Manager</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3>Frequently Asked <span>Questions</span></h3>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <ul class="faq-list">

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">How to Transfer Money? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                   After Login successfuly, Click Transfer and Enter the Receiver account number and amount the click send.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Can I Pay Utillity Bills? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Yes.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Can I use as far as I have Internet Connection? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                   Yes.
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Where Can I withdraw Cash? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    You can withdraw in any Abyssinia Branch.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Where Can I deposit Money? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                   You can deposit in any Abyssinia Branch.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Can I Integrate to my ecommerce website? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    yes! you can use our Open source Payment API.
                  </p>
                </div>
              </li>

            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span>Contact Us</span></h3>
         
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Piassa, Addis Ababa, Ethiopia</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@fetanbirr.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+251 938273254</p>
            </div>
          </div>

        </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-header bg-primary">Contact Us</div>
          <div class="card-body">
            <form action="<?php $_PHP_SELF ?>" method="post">
            
              <div class="row">
                <div class="form-label-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-label-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
             <div class="form-label-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
               <div class="form-label-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="form-label-group text-center">
                <button class="btn btn-block btn-primary" name="send" type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section><!-- End Contact Section -->
</main><!-- End #main -->

<?php include('footer.php'); ?>
</body>

</html>