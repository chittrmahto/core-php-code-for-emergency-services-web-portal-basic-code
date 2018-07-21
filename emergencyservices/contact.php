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

       mysql_query("INSERT INTO contact(name,email,mobile,address,pincode,created_ip,is_status) VALUES ('$name','$email','$mobile','$address','$pincode','$created_ip','$is_status')"); //SQL query
       
       echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
       //header("location:index.php");
    }
?>
<?php include("header.php");?>
    <!-- Page Content -->
    <div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<section>
			      <h1 class="section-header" style="text-align: center;">Contact Us Form</h1>
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
			<div class="col-lg-6 col-md-6">
				<h1 class="section-header" style="text-align: center;">Our Address</h1>
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
		</div>
		<!-- /.row -->
    </div>
    <!-- /.container -->
<?php include("footer.php");?>