<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script src="js/exportcsv.js"></script>
</head>
<body>

<div class="container">
<h1>
Gateway Reports
</h1>
<div class="row">
<form role="form" class="form" action="gatewayreports.php" method="POST">
<div class="form-group">
<div class="col-xs-3">
    <label for="gateway">Gateway:</label>
    <select class="form-control" id="id" name="id">
	<?php 
		$sql=mysql_query("Select * from gateways");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['gatewayname'];?></option>
		<?php 
		}
	?>
	</select>
  </div>
<div class="col-xs-2">
   <label for="startdate">Start Date:</label>
    <input type="date" class="form-control" id="startdate" name="startdate">
	</div>
	<div class="col-xs-2">
   <label for="enddate">End Date:</label>
    <input type="date" class="form-control" id="enddate" name="enddate">
	</div></div><br>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php 
if($_POST)
{
?>
<table class="table table-striped table-bordered table-hover" id="thetable">
<thead>
	<tr>
	<td class="headert">Sale ID
	</td>
	<td class="headert">Customer Name
	</td>
	<td class="headert">Credit Card Number
	</td>
	<td class="headert">Phone no
	</td>
	<td class="headert">Gateway
	</td>
	<td class="headert">Chargebacks
	</td>
	<td class="headert">Docusign Uploaded
	</td>
	<td class="headert">Payout
	</td>
	<td class="headert">Commission
	</td>
	<td class="headert">Sale Amount
	</td>
	<td class="headert">Final Amount
	</td>
	</tr>
</thead>
<tbody>
<?php

$sql="select * from sales where gatewayid=".$_POST['id'];
if($_POST['startdate'])
{
	if($_POST['enddate'])
	{
		$sql=$sql." and dateofsale between '".$_POST['startdate']."' and '".$_POST['enddate']."'";
	}
	else
	{
			$sql=$sql." and dateofsale >'".$_POST['startdate']."'";
	}
}
else if($_POST['enddate'])
{
	if($_POST['startdate'])
	{
		$sql=$sql." and dateofsale between '".$_POST['startdate']."' and '".$_POST['enddate']."'";
	}
	else
	{
			$sql=$sql." and dateofsale <'".$_POST['enddate']."'";
	}
}

$sql=mysql_query($sql);
$sales=array();
$verified=array();
$verifiedsum=array();
$unverified=array();
$unverifiedsum=array();
while($row=mysql_fetch_array($sql))
{
$cardnumber=mysql_fetch_array(mysql_query("select cardnumber from customers where phone=".$row['phone']))['cardnumber'];
$cardnumber="xxxxxxxxxxxx".substr($cardnumber,-4,4);
$commission=0;
$payout=0;
$gatewayname=mysql_fetch_array(mysql_query("select gatewayname from gateways where id=".$row['gatewayid']));
$finalamount=mysql_fetch_array(mysql_query("select payout from gateways where id=".$row['gatewayid']))['payout']*$row['amount']/100;
$sales[]=$finalamount;
if($row['upload'] && $row['chargeback']=="no")
{
$verified[]=$row['amount'];
$verifiedsum[]=$finalamount;
}
if(!$row['upload'] && $row['chargeback']=="no")
{
$unverified[]=$row['amount'];
$unverifiedsum[]=$finalamount;
}
$payout=mysql_fetch_array(mysql_query("select payout from gateways where id=".$row['gatewayid']))['payout'];
$commission=mysql_fetch_array(mysql_query("select commission from gateways where id=".$row['gatewayid']));



echo "<tr><td>".$row['id']."</td><td>".$row['custname']."</td><td>".$cardnumber."</td><td>".$row['phone']."</td><td>".$gatewayname['gatewayname']."</td><td>".$row['chargeback']."</td>";
if($row['upload'])
{
echo "<td><a href='uploads/sales/".$row['upload']."'>Yes</a></td>";
}
else
echo "<td>No</td>";
echo "<td>".$payout."%</td><td>".$commission['commission']."%</td><td>".$row['amount']."</td><td>".$finalamount."</td>";
echo "</tr>";
}

?>

<tr>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Unverified Total</td><td><?php
echo array_sum($unverified)."</td>";
echo "<td>".array_sum($unverifiedsum)."</td>";
?>
</tr>
<tr>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Verified Total</td><?php

echo "<td>".array_sum($verified)."</td>";
echo "<td>".array_sum($verifiedsum)."</td>";
?>
<tr>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td><?php
echo array_sum($unverified)+array_sum($verified)."</td><td>";
echo array_sum($unverifiedsum)+array_sum($verifiedsum)."</td>";
?>
</tr>
</tbody>
</table>
<a class="btn btn-primary" id="export" name="export">Export to CSV</a>
</div>
</div>
<?php } } 
else
{
header("location:logout.php");
}
?>