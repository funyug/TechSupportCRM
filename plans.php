<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script src="js/plansubmit.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<h1>
Add a Plan
</h1>
<form role="form" method="POST"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform">
<div class="col-lg-6">

  <div class="form-group">
    <label for="planname">Plan Name:</label>
    <input type="text" class="form-control" id="planname" name="planname">
  </div>
  <div class="form-group">
	<label for="duration">Plan Duration:</label>
	<input type="number" class="form-control" id="duration" name="duration">
  </div>
    <div class="form-group">
	<label for="price">Price:</label>
	<input type="number" class="form-control" id="price" name="price">
  </div>  
</div>
<div class="col-lg-6">
 <div class="form-group">
	<label for="upload">Upload:</label>
	<input type="file" class="form-control file" id="upload" name="upload">
  </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
	<button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
	<div class="form-group primary-text" id="success">
   </div>
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