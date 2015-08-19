<?php
include 'header.php';
if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
</head>
<body>
<div class="container">
<div class="row">
<h1>
Leads
</h1>
<table class="table table-striped table-condensed table-bordered table-hover table-hover">
<thead>
	<tr>
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
	</tr>
</thead>
<tbody>
<?php
if(isset($_GET['page']))
{
$page=$_GET['page'];
}
else
{
$page=1;
}
$limitstart=($page-1)*10;
$limitend=$page*10;
$sql=mysql_query("select * from customers limit ".$limitstart." , ".$limitend);
while($row=mysql_fetch_array($sql))
{
echo "<tr><td><a href='editleads.php?id=".$row['id']."'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='delete.php?mode=customers&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['phone']."</td><td>".$row['custname']."</td><td>".$row['email']."</td><td>".$row['address']."</td><td>".$row['city']."</td><td>".$row['country']."</td><td>".$row['pincode']."</td><td>".$row['date']."</td>";
if($row['upload'])
{
echo "<td><a href='uploads/leads/".$row['upload']."'>Click To View</a></td>";
}
else
echo "<td></td>";
echo "<td>".$row['cardname']."</td><td>".$row['cardtype']."</td><td>".$row['cardnumber']."</td><td>".$row['cvv']."</td><td>".$row['expirydate']."</td><td>".$row['issue']."</td></tr>";
}
?>
</tbody>
</table>
<div class="row">
<?php
$rows=mysql_query("select * from customers");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displayleads.php?page=".$i."'>".$i."</a> ";
}
?>
</div>

</div>
</div>
<?php } 
else
{
header("location:logout.php");
}
?>