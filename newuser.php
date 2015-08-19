<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script src="js/newusersubmit.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<h1>
Add a User
</h1>
<form role="form" method="POST"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform">


  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
	<label for="duration">User Pass:</label>
	<input type="password" class="form-control" id="password" name="password">
  </div> 
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
	<button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
	<div class="form-group primary-text" id="success">
   </div>
</form>
</div>
</div>


<?php } 
else
{
header("location:logout.php");
}
?>