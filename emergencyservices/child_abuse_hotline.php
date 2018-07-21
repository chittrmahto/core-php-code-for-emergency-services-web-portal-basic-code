<?php
    function get_client_ip() {
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP']))
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_X_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
      else if(isset($_SERVER['REMOTE_ADDR']))
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $name = $_POST['name'];
       $email = $_POST['email'];
       $mobile = $_POST['mobile'];
       $address = $_POST['address'];
       $pincode = $_POST['pincode'];
       $created_ip = get_client_ip();
       $is_status = 0;
   
       	//include("conn.php");
       	//mysql_connect("localhost","techn_emergency","admin@123") or die(mysql_error()); //Connect to server
		//mysql_select_db("technsli_emergency") or die("Cannot connect to database"); //Conect to database
		mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
		mysql_select_db("emergencyservice") or die("Cannot connect to database"); //Conect to database

       mysql_query("INSERT INTO child_abuse_hotline(name,email,mobile,address,pincode,created_ip,is_status) VALUES ('$name','$email','$mobile','$address','$pincode','$created_ip','$is_status')"); //SQL query
       
       echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
       //header("location:index.php");
    }
?>
<?php include("header.php");?>
    <!-- Page Content -->
    <div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		            <ol class="carousel-indicators">
		              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		            </ol>
		            <div class="carousel-inner" role="listbox">
		              <div class="carousel-item active">
		                <img class="d-block img-fluid" src="assets/700x400.png" alt="First slide">
		              </div>
		              <div class="carousel-item">
		                <img class="d-block img-fluid" src="assets/700x400.png" alt="Second slide">
		              </div>
		              <div class="carousel-item">
		                <img class="d-block img-fluid" src="assets/700x400.png" alt="Third slide">
		              </div>
		            </div>
		            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		              <span class="sr-only">Previous</span>
		            </a>
		            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		              <span class="carousel-control-next-icon" aria-hidden="true"></span>
		              <span class="sr-only">Next</span>
		            </a>
		        </div>
		        <div class="container">
					<div class="row">
						<div class="col-md-6">
							<address>
							  <strong>Example Inc.</strong><br>
							  1234 Example Street<br>
							  Antartica, Example 0987<br>
							  <abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
							<address>
							  <strong>Full Name</strong><br>
							  <a href="mailto:#">exam.ple@example.com</a>
							</address>
						</div>
						<div class="col-md-6">
							<address>
							  <strong>Example Inc.</strong><br>
							  1234 Example Street<br>
							  Antartica, Example 0987<br>
							  <abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
							<address>
							  <strong>Full Name</strong><br>
							  <a href="mailto:#">exam.ple@example.com</a>
							</address>
						</div>
						<div class="col-md-6">
							<address>
							  <strong>Example Inc.</strong><br>
							  1234 Example Street<br>
							  Antartica, Example 0987<br>
							  <abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
							<address>
							  <strong>Full Name</strong><br>
							  <a href="mailto:#">exam.ple@example.com</a>
							</address>
						</div>
						<div class="col-md-6">
							<address>
							  <strong>Example Inc.</strong><br>
							  1234 Example Street<br>
							  Antartica, Example 0987<br>
							  <abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
							<address>
							  <strong>Full Name</strong><br>
							  <a href="mailto:#">exam.ple@example.com</a>
							</address>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<section>
			      <h1 class="section-header" style="text-align: center;">Child Abuse Hotline Contact Form</h1>
			      <div class="container">
			        <form class="form-horizontal" accept="utf-8" action="" method="POST">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label for="">Your name</label>
			              <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
			            </div>
			            <div class="form-group">
			              <label for="">Email Address</label>
			              <input type="text" class="form-control" name="email" placeholder="Enter Email id" required="">
			            </div>  
			            <div class="form-group">
			              <label for="">Mobile No.</label>
			              <input type="tel" class="form-control" name="mobile" placeholder="Enter 10-digit mobile no." maxlength="10" required="">
			            </div>
			            <div class="form-group">
			              <label for="">Address</label>
			              <input type="text" class="form-control" name="address" placeholder="Enter address" maxlength="10" required="">
			            </div>
			            <div class="form-group">
			              <label for="">Pincode</label>
			              <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" maxlength="6" required="">
			            </div>
			            <div class="form-group">
			              <label for =""> Message</label>
			              <textarea  class="form-control" placeholder="Enter Your Message" required=""></textarea>
			            </div>
			            <div class="form-group">
			              <button type="submit" class="btn btn-default"> Submit</button>
			            </div>
			          </div>
			        </form>
			    </section>
			</div>
		</div>
		<!-- /.row -->
    </div>
    <!-- /.container -->
<?php include("footer.php");?>