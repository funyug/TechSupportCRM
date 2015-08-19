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

<div class="row">
<h1>
Gateways
</h1>
<table class="table table-striped table-condensed table-bordered table-responsive table-hover">
<thead>
	<tr>
	<th>
	</th>
	<th>Gateway ID
	</th>
	<th>Gateway Name
	</th>
	<th>Priority
	</th>
	<th>Payout
	</th>
	<th>Commission
	</th>
	<th>Notes
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
$sql=mysql_query("select * from gateways limit ".$limitstart." , ".$limitend);
while($row=mysql_fetch_array($sql))
{
echo "<tr><td><a href='editgateways.php?id=".$row['id']."'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='delete.php?mode=gateways&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['gatewayname']."</td><td>".$row['priority']."</td><td>".$row['payout']."</td><td>".$row['commission']."</td><td>".$row['notes']."</td></tr>";
}
?>
</table>
</tbody>
<div class="row">
<?php
$rows=mysql_query("select * from gateways");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displaygateways.php?page=".$i."'>".$i."</a> ";
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