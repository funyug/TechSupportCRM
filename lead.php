<?php
include 'header.php';
if($_SESSION['role']=="agents"||$_SESSION['role']=="admin")
{
?>
<script src="js/leadsubmit.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<h1>
Add new lead
</h1>
<div class="col-lg-6">

<form role="form"  enctype="multipart/form-data" method="POST" action="<? echo $_SERVER['PHP_SELF']; ?>" id="myform">
<div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" name="phone" value="<?php if(isset($_REQUEST['phone'])) echo $_REQUEST['phone'];?>" required>
  </div>

  <div class="form-group">
	<label for="custname">Customer Name:</label>
	<input type="text" class="form-control" id="custname" name="custname">
  </div>
    <div class="form-group">
	<label for="email">Email:</label>
	<input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
	<label for="address">Address:</label>
	<input type="text" class="form-control" id="address" name="address">
  </div>
  <div class="form-group">
	<label for="city">City:</label>
	<input type="text" class="form-control" id="city" name="city">
  </div>
  <div class="form-group">
	<label for="pincode">Pincode:</label>
	<input type="number" class="form-control" id="pincode" name="pincode">
  </div>
  <div class="form-group">
	<label for="country">Country:</label>
	<input type="text" class="form-control" id="country" name="country">
  </div>
</div>
<div class="col-lg-6">
	  <div class="form-group">
<div class="col-xs-4">
	<label for="date">Date:</label>
	<input type="date" class="form-control" id="date" name="date">
</div>
  </div><br><br><br>
  <div class="form-group">
	<label for="cardname">Name on Card:</label>
	<input type="text" class="form-control" id="cardname" name="cardname">
  </div>
  <div class="form-group">
	<label for="cardtype">Card Type:</label>
	<input type="text" class="form-control" id="cardtype" name="cardtype">
  </div>
  <div class="form-group">
	<label for="cardnumber">Credit Card Number:</label>
	<input type="text" class="form-control" id="cardnumber" name="cardnumber">
  </div>
  <div class="form-group">
	<label for="cvv">CVV:</label>
	<input type="text" class="form-control" id="cvv" name="cvv">
  </div>
  <div class="form-group">
	<label for="country">Expiry Date:</label>
	<input type="text" class="form-control" id="expirydate" name="expirydate">
  </div>
    <div class="form-group">
	<label for="upload">Upload:</label>
	<input type="file" class="form-control file" id="upload" name="upload">
  </div>
    <div class="form-group">
	<label for="issue">Issue:</label>
	<textarea rows="10" columns="10" class="form-control" id="issue" name="issue"></textarea>
  </div>
   <button type="submit" class="btn btn-primary" id="submit">Submit</button>
   <button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
   <div class="form-group primary-text" id="success">
   </div>
   </form>

</div>
<?php }

?>
</div>
</body>
