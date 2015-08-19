<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="agents"||$_SESSION['role']=="admin")
{
?>
</head>
<body>
<div class="container">
<div class="page-header">
<h1>Search record</h1>
</div>
<div class="row">
<form role="form" method="POST" action="search.php">
<div class="form-group">
<label for="phone">Phone:</label>
<input type="number" name="phone" class="form-control" required="true">
</div>
<button class="btn btn-primary" type="submit">Search</button>
</form>
<?php
if($_POST)
{
?>
<h1>
Lead Data
</h1>
<table class="table table-striped table-condensed table-bordered">
<thead>
<th>
</th>
<th>ID
</th>
<th>Phone
</th>
<th>Customer Name
</th>
<th>Email
</th>
<th>Address
</th>
<th>City
</th>
<th>Country
</th>
<th>Pincode
</th>
<th>Date
</th>
<th>Upload
</th>
<th>Name On Card
</th>
<th>Card Type
</th>
<th>Card Number
</th>
<th>CVV
</th>
<th>Expiry Date
</th>
<th>Issue
</th>
</thead>
<tbody>

<?php
$sql=mysql_query("select * from customers where phone=".filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
while($customerdetails=mysql_fetch_array($sql))
{
if($_SESSION)
		{
			echo"<tr><td><a href='editissue.php?id=".$customerdetails['id']."'>Edit</a> ";
		if($_SESSION['role']=="admin")
		{
echo"<a href='delete.php?mode=customers&id=".$customerdetails['id']."'>Delete</a></td>";
}
		
		}
?>
<td><?php echo $customerdetails['id'];?></td>
<td><?php echo $customerdetails['phone'];?></td>
<td><?php echo $customerdetails['custname'];?></td>
<td><?php echo $customerdetails['email'];?></td>
<td><?php echo $customerdetails['address'];?></td>
<td><?php echo $customerdetails['city'];?></td>
<td><?php echo $customerdetails['country'];?></td>
<td><?php echo $customerdetails['pincode'];?></td>
<td><?php echo $customerdetails['date'];?></td>
<?php if($customerdetails['upload'])
{
echo "<td><a href='uploads/leads/".$customerdetails['upload']."'>File</a></td>";
}
else
echo "<td>&nbsp;</td>";
?>
<td><?php echo $customerdetails['cardname'];?></td>
<td><?php echo $customerdetails['cardtype'];?></td>
<td><?php echo "xxxxxxxxxxxx".substr($customerdetails['cardnumber'],-4,4);?></td>
<td><?php echo $customerdetails['cvv'];?></td>
<td><?php echo $customerdetails['expirydate'];?></td>
<td><?php echo $customerdetails['issue'];?></td></tr>
<?php }
?></tbody></table>
<h1>
Sales Data
</h1>
<table class="table table-striped table-condensed table-bordered">
<thead>
<th>
</th>
<th>Sales ID
</th>
<th>Phone
</th>
<th>Plan Name
</th>
<th>Date Of Sale
</th>
<th>Date Of Expiry
</th>
<th>Agent
</th>
<th>Gateway
</th>
<th>Amount
</th>
<th>Upload
</th>
</thead>
<tbody>
<tr>
<?php
$sql=mysql_query("select * from sales where phone=".filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
if(mysql_num_rows($sql)!=0)
{

while($customerdetails=mysql_fetch_array($sql))
{
$planname=mysql_fetch_array(mysql_query("select planname from plans where id=".$customerdetails['planname']));
$agentname=mysql_fetch_array(mysql_query("select agentname from agents where id=".$customerdetails['agent']));
$gatewayname=mysql_fetch_array(mysql_query("select gatewayname from gateways where id=".$customerdetails['gatewayid']));

		if($_SESSION)
		{
		if($_SESSION['role']=="admin")
		{
		
echo"<tr><td><a href='sales.php?id=".$customerdetails['id']."'>Edit</a> <a href='delete.php?mode=sales&id=".$customerdetails['id']."'>Delete</a></td>";

		}
		
		else
		{
		echo "<tr><td>&nbsp;</td>";
		}
		}
		
?>
<td><?php echo $customerdetails['id'];?></td>
<td><?php echo $customerdetails['phone'];?></td>
<td><?php echo $customerdetails['custname'];?></td>
<td><?php echo $customerdetails['dateofsale'];?></td>
<td><?php echo $customerdetails['dateofexpiry'];?></td>
<td><?php echo $agentname['agentname'];?></td>
<td><?php echo $gatewayname['gatewayname'];?></td>
<td><?php echo $customerdetails['amount'];?></td>

<?php if($customerdetails['upload'])
{
echo "<td><a href='uploads/sales/".$customerdetails['upload']."'>File</a></td>";
}
else
echo "<td></td>";
}
?>
</tr>
<?php
}
?></tbody></table>
<?php }?>
</div>
<?php } 
else
{
header("location:logout.php");
}
?>
