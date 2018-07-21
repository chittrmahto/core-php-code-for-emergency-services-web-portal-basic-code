<?php
    session_start();
    if(isset($_SESSION['admin_id'])){

    }
    else{ 
       header("location:admin.php");
    }
    $listmg = '';
    //mysql_connect("localhost","techn_emergency","admin@123") or die(mysql_error()); //Connect to server
		//mysql_select_db("technsli_emergency") or die("Cannot connect to database"); //Conect to database
		mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
		mysql_select_db("emergencyservice") or die("Cannot connect to database"); //Conect to database

	$query = mysql_query("Select * from womens_helpline"); 
	$exists = mysql_num_rows($query);
	if($exists > 0)
	{
		$listmg .= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
		            <th>Email</th>
		            <th>Mobile Number</th>
		            <th>Address</th>
		            <th>Pincode</th>
		            <th>Created IP</th>
		            <th>Created On</th>
		            <th>Is Status</th>
	            </tr>
	        </thead>
	 
	        <tfoot>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
		            <th>Email</th>
		            <th>Mobile Number</th>
		            <th>Address</th>
		            <th>Pincode</th>
		            <th>Created IP</th>
		            <th>Created On</th>
		            <th>Is Status</th>
	            </tr>
	        </tfoot>';
		while($row = mysql_fetch_assoc($query)) 
		{
			$listmg .= "<tr>";
			$listmg .= "<td>" . $row['id'] . "</td>";
			$listmg .= "<td>" . $row['name'] . "</td>";
			$listmg .= "<td>" . $row['email'] . "</td>";
			$listmg .= "<td>" . $row['mobile'] . "</td>";
			$listmg .= "<td>" . $row['address'] . "</td>";
			$listmg .= "<td>" . $row['pincode'] . "</td>";
			$listmg .= "<td>" . $row['created_ip'] . "</td>";
			$listmg .= "<td>" . $row['created_on'] . "</td>";
			$listmg .= "<td>" . $row['is_status'] . "</td>";
			$listmg .= "</tr>";
		}
		$listmg .= "</table>";
	}
	else
	{
	  	$listmg .= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
		            <th>Email</th>
		            <th>Mobile Number</th>
		            <th>Address</th>
		            <th>Pincode</th>
		            <th>Created IP</th>
		            <th>Created On</th>
		            <th>Is Status</th>
	            </tr>
	        </thead>
	 
	        <tfoot>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
		            <th>Email</th>
		            <th>Mobile Number</th>
		            <th>Address</th>
		            <th>Pincode</th>
		            <th>Created IP</th>
		            <th>Created On</th>
		            <th>Is Status</th>
	            </tr>
	        </tfoot>';
		$listmg .= "<tr>";
		$listmg .= "<td colspan='9'> Records are not available</td>";
		$listmg .= "</tr>";
		$listmg .= "</table>";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/bootstrap.min.css">
  <script src="../assets/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	      <div class="container">
	        <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	        <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
	          <ul class="navbar-nav ml-auto">
	            <li class="nav-item">
	              <a href="adminlogout.php" style="float:right;line-height: 46px;">Logout</a>
	            </li>
	          </ul>
	        </div> -->
	      </div>
	    </nav>
		<!-- <nav class="navbar navbar-default">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
	        </div>
	        <a href="adminlogout.php" style="float:right;line-height: 46px;">Logout</a>
	      </div>
	    </nav> -->
	    <div class="row" style="margin-top:80px;">
		    <div class="col-lg-3">
	          <!-- <h1 class="my-4" style="color:#ff0000;text-align: center;">Emergency Services</h1> -->
	          <div class="list-group">
	          	<h4>Services List</h4>
	            <a href="police.php" class="list-group-item ">Police</a>
	            <a href="ambulance.php" class="list-group-item">Ambulance</a>
	            <a href="fire.php" class="list-group-item">Fire Brigade</a>
	            <a href="disaster_management.php" class="list-group-item">Disaster management</a>
	            <a href="womens_helpline.php" class="list-group-item active">Women's helpline</a>
	            <a href="aids_helpline.php" class="list-group-item ">AIDS helpline</a>
	            <a href="child_abuse_hotline.php" class="list-group-item ">Child abuse hotline</a>
	            <a href="air_ambulance.php" class="list-group-item ">Air ambulance</a>
	          </div>
	          <div>&nbsp;</div>
	          <div class="list-group">
	          	<a href="contact.php" class="list-group-item">Contact</a>
	          	<a href="feedback.php" class="list-group-item">Feedback</a>
	            <a href="adminlogout.php" class="list-group-item" style="color:#ff0000;">Logout</a>
	          </div>
	        </div>
	        <!-- /.col-lg-3 -->
		    <div class="col-md-9">
		        <h2 style="text-align: center;">Womens Helpline request list</h2>
		        <?php echo $listmg; ?>
		    </div>
		</div>
    </div>
  </div>
</body>
</html>