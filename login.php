<?php
	include 'dbconnection.php';
?>
<?
	if($_POST)
	{
		session_start();
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$sql=mysqli_query($con,"select * from users");

		while($row=mysqli_fetch_array($sql))
		{
			if($user==$row['user']&&$pass==$row['pass'])
			{
			$_SESSION['role']=$row['role'];
			header("location:index.php");
			}
		}
		echo '<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Warning!</strong> Wrong username or password
</div>';
	}
?><html>
<head>
<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<title>
Von Media BPOforce CRM - Login
</title>
</head>
<body>
<div class="container">
<div class="jumbotron">
    <h1>Von Media BPOforce CRM</h1>
    <p>Cloud based Customer Relationship Management SaaS designed especially for BPOs. Please login to continue.</p>
  </div>
<form role="form" method="POST" action="<? echo $_SERVER["PHP_SELF"];?>">

<div class="form-group">
<div class="col-xs-3">
    <label for="user">Username:</label>
    <input type="user" class="form-control" id="user" name="user" required="true">
  </div>
<div class="col-xs-3">
    <label for="pass">Password:</label>
    <input type="password" class="form-control" id="pass" name="pass" required="true">
  </div><br>
<button type="submit" class="btn btn-primary">Login</button>
</div>
</form>
</div>
</body>
</html>
