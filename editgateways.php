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
$gatewaydetails=mysql_fetch_array(mysql_query("Select * from gateways where id=".$id));
if(!$_POST)
{
?>

<form role="form" method="POST" action="editgateways.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform" >
  <div class="form-group">
    <label for="gatewayname">Gateway Name:</label>
    <input type="text" class="form-control" id="gatewayname" name="gatewayname" value="<?php echo $gatewaydetails['gatewayname'];?>">
  </div>
  <div class="form-group">
    <label for="notes">Notes:</label>
    <input type="text" class="form-control" id="notes" name="notes" value="<?php echo $gatewaydetails['notes'];?>">
  </div>
  <div class="form-group">
    <label for="priority">Priority:</label>
    <input type="number" class="form-control" id="priority" name="priority" value="<?php echo $gatewaydetails['priority'];?>">
  </div>
  <div class="form-group">
    <label for="payout">Payout:</label>
    <input type="number" class="form-control" id="payout" name="payout" value="<?php echo $gatewaydetails['payout'];?>">
  </div>
  <div class="form-group">
    <label for="commission">Commission:</label>
    <input type="number" class="form-control" id="commission" name="commission" value="<?php echo $gatewaydetails['commission'];?>">
  </div>
     <button class="btn btn-primary" id="submit" type="submit">Submit</button>
	 <div class="form-group primary-text" id="success">
   </div>
</form>
<?php
}
else if($_POST)
{
mysql_query("update gateways set gatewayname='".filter_var($_POST['gatewayname'], FILTER_SANITIZE_STRING)."',notes='".filter_var($_POST['notes'], FILTER_SANITIZE_STRING)."',priority='".filter_var($_POST['priority'], FILTER_SANITIZE_STRING)."',payout='".filter_var($_POST['payout'], FILTER_SANITIZE_STRING)."',commission='".filter_var($_POST['commission'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
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