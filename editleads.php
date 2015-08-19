<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script>
function goBack() {
    window.history.go(-2);
}
</script>
</head>
<body>

<div class="container">
<div class="row">
<h1>
Edit Record
</h1>
<?php
$id=filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$leaddetails=mysql_fetch_array(mysql_query("Select * from customers where id=".$id));
if(!$_POST)
{
?>
<div class="col-lg-6">
<form role="form" method="POST" action="editleads.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform" enctype="multipart/form-data">
 <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $leaddetails['phone'];?>">
  </div>

  <div class="form-group">
	<label for="custname">Customer Name:</label>
	<input type="text" class="form-control" id="custname" name="custname" value="<?php echo $leaddetails['custname'];?>">
  </div>
    <div class="form-group">
	<label for="email">Email:</label>
	<input type="text" class="form-control" id="email" name="email" value="<?php echo $leaddetails['email'];?>">
  </div>  
  <div class="form-group">
	<label for="address">Address:</label>
	<input type="text" class="form-control" id="address" name="address" value="<?php echo $leaddetails['address'];?>">
  </div>  
  <div class="form-group">
	<label for="city">City:</label>
	<input type="text" class="form-control" id="city" name="city" value="<?php echo $leaddetails['city'];?>">
  </div>  
  <div class="form-group">
	<label for="pincode">Pincode:</label>
	<input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $leaddetails['pincode'];?>">
  </div>  
  <div class="form-group">
	<label for="country">Country:</label>
	<input type="text" class="form-control" id="country" name="country" value="<?php echo $leaddetails['country'];?>">
  </div>
</div>
<div class="col-lg-6">
	  <div class="form-group">
	<label for="date">Date:</label>
	<input type="date" class="form-control" id="date" name="date" value="<?php echo $leaddetails['date'];?>">
  </div>
  <div class="form-group">
  <label for="cardname">Name on Card:</label>
  <input type="text" class="form-control" id="cardname" name="cardname" value="<?php echo $leaddetails['cardname'];?>">
  </div>
  <div class="form-group">
  <label for="cardtype">Card Type:</label>
  <input type="text" class="form-control" id="cardtype" name="cardtype" value="<?php echo $leaddetails['cardtype'];?>">
  </div>
  <div class="form-group">
  <label for="cardnumber">Card Number:</label>
  <input type="text" class="form-control" id="cardnumber" name="cardnumber" value="<?php echo $leaddetails['cardnumber'];?>">
  </div>
  <div class="form-group">
  <label for="cvv">CVV:</label>
  <input type="text" class="form-control" id="cvv" name="cvv" value="<?php echo $leaddetails['cvv'];?>">
  </div>
  <div class="form-group">
  <label for="expirydate">Expiry Date:</label>
  <input type="text" class="form-control" id="expirydate" name="expirydate" value="<?php echo $leaddetails['expirydate'];?>">
  </div>
    <div class="form-group">
	<label for="issue">Issue:</label>
	<textarea type="text" class="form-control" id="issue" name="issue"><?php echo $leaddetails['issue'];?></textarea>
  </div>
  <div class="form-group">
    <label for="upload">Upload:</label>
    <input type="file" class="form-control file" id="upload" name="upload">
  </div>
     <button class="btn btn-primary" id="submit" type="submit">Submit</button>
	 <div class="form-group primary-text" id="success">
   </div>
</form>
<?php
}
else if($_POST)
{
if(empty($_FILES['upload']['name']))
{
mysql_query("update customers set phone='".filter_var($_POST['phone'], FILTER_SANITIZE_STRING)."',custname='".filter_var($_POST['custname'], FILTER_SANITIZE_STRING)."',email='".filter_var($_POST['email'], FILTER_SANITIZE_STRING)."',address='".filter_var($_POST['address'], FILTER_SANITIZE_STRING)."',city='".filter_var($_POST['city'], FILTER_SANITIZE_STRING)."',country='".filter_var($_POST['country'], FILTER_SANITIZE_STRING)."',pincode='".filter_var($_POST['pincode'], FILTER_SANITIZE_STRING)."',date='".filter_var($_POST['date'], FILTER_SANITIZE_STRING)."',issue='".filter_var($_POST['issue'], FILTER_SANITIZE_STRING)."',cardname='".filter_var($_POST['cardname'], FILTER_SANITIZE_STRING)."',cardtype='".filter_var($_POST['cardtype'], FILTER_SANITIZE_STRING)."',cardnumber='".filter_var($_POST['cardnumber'], FILTER_SANITIZE_STRING)."',cvv='".filter_var($_POST['cvv'], FILTER_SANITIZE_STRING)."',expirydate='".filter_var($_POST['expirydate'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
echo "Record updated successfully<br>";
echo "<button class='btn' onclick='goBack()'>Go Back</button>";
}
else if($_FILES)
{
define('APP_PATH', realpath(dirname(__DIR__)));
$file=$_FILES['upload'];
$path=APP_PATH."/crm/uploads/leads//".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
mysql_query("update customers set phone='".filter_var($_POST['phone'], FILTER_SANITIZE_STRING)."',custname='".filter_var($_POST['custname'], FILTER_SANITIZE_STRING)."',email='".filter_var($_POST['email'], FILTER_SANITIZE_STRING)."',address='".filter_var($_POST['address'], FILTER_SANITIZE_STRING)."',city='".filter_var($_POST['city'], FILTER_SANITIZE_STRING)."',country='".filter_var($_POST['country'], FILTER_SANITIZE_STRING)."',pincode='".filter_var($_POST['pincode'], FILTER_SANITIZE_STRING)."',date='".filter_var($_POST['date'], FILTER_SANITIZE_STRING)."',upload='".$upload."',issue='".filter_var($_POST['issue'], FILTER_SANITIZE_STRING)."',cardname='".filter_var($_POST['cardname'], FILTER_SANITIZE_STRING)."',cardtype='".filter_var($_POST['cardtype'], FILTER_SANITIZE_STRING)."',cardnumber='".filter_var($_POST['cardnumber'], FILTER_SANITIZE_STRING)."',cvv='".filter_var($_POST['cvv'], FILTER_SANITIZE_STRING)."',expirydate='".filter_var($_POST['expirydate'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
echo "Record updated successfully<br>";
echo "<button class='btn' onclick='goBack()'>Go Back</button>";
}

}
?>
</div>
</div>
<?php } 
else
{
header("location:logout.php");
}
?>