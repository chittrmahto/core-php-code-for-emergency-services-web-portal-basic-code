<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
      header("location:dashboard.php");
    }
    else{ 
      //header("location:admin.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $bool = true;

      //mysql_connect("localhost","techn_emergency","admin@123") or die(mysql_error()); //Connect to server
  		//mysql_select_db("technsli_emergency") or die("Cannot connect to database"); //Conect to database
  		mysql_connect("localhost","root","") or die(mysql_error()); //Connect to server
  		mysql_select_db("emergencyservice") or die("Cannot connect to database"); //Conect to database

      $query = mysql_query("Select * from admin WHERE username='$username'"); 
      //print_r($query); exit;
      $exists = mysql_num_rows($query);
      $table_users = "";
      $table_password = "";
      if($exists > 0)
      {
         while($row = mysql_fetch_assoc($query)) 
         {
            $table_users = $row['username']; 
            $table_password = $row['password']; 
            $admin_id = $row['admin_id'];
         }
         if(($username == $table_users) && (md5($password) == $table_password))
         {
            if(md5($password) == $table_password)
            {
               $_SESSION['admin_id'] = $admin_id;
               header("location: dashboard.php"); 
            }
         }
         else
         {
          Print '<script>alert("Incorrect Password!");</script>'; 
          //Print '<script>window.location.assign("admin.php");</script>'; 
         }
      }
      else
      {
          Print '<script>alert("Incorrect username!");</script>'; 
          //Print '<script>window.location.assign("admin.php");</script>'; 
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/bootstrap.min.css">
  <script src="../assets/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h2 style="text-align: center;">Admin Login Form</h2>
        <form action="admin.php" accept="utf-8" method="post" >
          <div class="container">
            <div class="col-md-6">
              <div style="text-align: center;">
                <img src="img_avatar2.png" alt="Avatar" style="height: 100px;width: 100px;border-radius: 50%;">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" id="" placeholder="Enter Username" required="">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Enter Password" required="">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default"> Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>