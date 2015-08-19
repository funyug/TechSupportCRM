<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script src="js/getcustomers.js"></script>
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
$salesdetails=mysql_fetch_array(mysql_query("Select * from sales where id=".$id));
if(!$_POST)
{
?>

<form role="form" method="POST" action="editsales.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform"  enctype="multipart/form-data">
<div class="col-lg-6">
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $salesdetails['phone'];?>">
  </div>
  <div class="form-group">
    <label for="planname">Plan Name:</label>
    <select class="form-control" id="planname" name="planname">
	<?php 
		$sql=mysql_query("Select * from plans");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>" <?php if($salesdetails['planname']==$row['id']) echo "selected";?>><?php echo $row['planname'];?></option>
		<?php 
		}
	?>
	</select>
  </div>
  <div class="form-group">
    <label for="dateofsale">Date Of Sale:</label>
    <input type="date" class="form-control" id="dateofsale" name="dateofsale" value="<?php echo $salesdetails['dateofsale'];?>">
  </div>
  <div class="form-group">
    <label for="dateofexpiry">Plan Expiration Date:</label>
    <input type="date" class="form-control" id="dateofexpiry" name="dateofexpiry" value="<?php echo $salesdetails['dateofexpiry'];?>">
  </div>
  <div class="form-group">
    <label for="agent">Agent:</label>
    <select class="form-control" id="agent" name="agent">
	<?php 
		$sql=mysql_query("Select * from agents");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>" <?php if($salesdetails['agent']==$row['id']) echo "selected";?>><?php echo $row['agentname'];?></option>
		<?php 
		}
	?>
	</select>
  </div>

</div>
<div class="col-lg-6">
  
  <div class="form-group">
    <label for="custname">Customer Name:</label>
    <input type="text" class="form-control" id="custname" name="custname" value="<?php echo $salesdetails['custname'];?>">
  </div>
  <div class="form-group">
    <label for="chargeback">Chargeback:</label>
    <select class="form-control" id="chargeback" name="chargeback">
		<option value="yes" <?php if($salesdetails['chargeback']=='yes') echo 'selected';?>>Yes</option>
		<option value="no" <?php if($salesdetails['chargeback']=='no') echo 'selected';?>>No</option>
	</select>
  </div>
  <div class="form-group">
    <label for="gatewayid">Gateway:</label>
    <select class="form-control" id="gatewayid" name="gatewayid">
	<?php 
		$sql=mysql_query("Select * from gateways");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>" <?php if($salesdetails['gatewayid']==$row['id']) echo "selected";?>><?php echo $row['gatewayname'];?></option>
		<?php 
		}
	?>
  </select>
  <div class="form-group">
    <label for="amount">Amount:</label>
    <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $salesdetails['amount'];?>">
  </div>
  <div class="form-group">
    <label for="upload">Upload:</label>
    <input type="file" class="form-control file" id="upload" name="upload">
  </div>
  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>
<?php
}
else if($_POST)
{
if(empty($_FILES['upload']['name']))
{
mysql_query("update sales set phone='".filter_var($_POST['phone'], FILTER_SANITIZE_STRING)."',planname='".filter_var($_POST['planname'], FILTER_SANITIZE_STRING)."',dateofsale='".filter_var($_POST['dateofsale'], FILTER_SANITIZE_STRING)."',dateofexpiry='".filter_var($_POST['dateofexpiry'], FILTER_SANITIZE_STRING)."',agent='".filter_var($_POST['agent'], FILTER_SANITIZE_STRING)."',custname='".filter_var($_POST['custname'], FILTER_SANITIZE_STRING)."',gatewayid='".filter_var($_POST['gatewayid'], FILTER_SANITIZE_STRING)."',amount='".filter_var($_POST['amount'], FILTER_SANITIZE_STRING)."',chargeback='".filter_var($_POST['chargeback'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
}
else
{
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES)
{
$file=$_FILES['upload'];
$path=APP_PATH."\crm\uploads\sales\\".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
mysql_query("update sales set phone='".filter_var($_POST['phone'], FILTER_SANITIZE_STRING)."',planname='".filter_var($_POST['planname'], FILTER_SANITIZE_STRING)."',dateofsale='".filter_var($_POST['dateofsale'], FILTER_SANITIZE_STRING)."',dateofexpiry='".filter_var($_POST['dateofexpiry'], FILTER_SANITIZE_STRING)."',agent='".filter_var($_POST['agent'], FILTER_SANITIZE_STRING)."',custname='".filter_var($_POST['custname'], FILTER_SANITIZE_STRING)."',gatewayid='".filter_var($_POST['gatewayid'], FILTER_SANITIZE_STRING)."',amount='".filter_var($_POST['amount'], FILTER_SANITIZE_STRING)."',upload='".$upload."' where id=".$id) or die(mysql_error());
}
echo "Record updated successfully<br>";
echo "<button class='btn' onclick='goBack()'>Go Back</button>";
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