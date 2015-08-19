<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script src="js/gatewaysubmit.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<h1>
Add a Gateway
</h1>
<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform">
  <div class="form-group">
    <label for="name">Gateway Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
	<label for="notes">Notes:</label>
	<input type="text" class="form-control" id="notes" name="notes">
  </div>
   <div class="form-group">
	<label for="priority">Priority:</label>
	<input type="number" class="form-control" id="priority" name="priority">
  </div>
   <div class="form-group">
	<label for="payout">Payout:</label>
	<input type="number" class="form-control" id="payout" name="payout">
  </div>
   <div class="form-group">
	<label for="commission">Commission:</label>
	<input type="number" class="form-control" id="commission" name="commission">
  </div>
   <button type="submit" class="btn btn-primary" id="submit">Submit</button>
   <button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
   <div class="form-group primary-text" id="success">
   </div>
</div>
</form>
</div>

<?php } 
else
{
header("location:logout.php");
}
?>