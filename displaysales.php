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
Sales
</h1>
<table class="table table-striped table-condensed table-bordered table-hover">
<thead>
	<tr>
	<th>
	</th>
	<th>Sales ID
	</th>
	<th>Phone
	</th>
	<th>Customer Name
	</th>
	<th>Plan Name
	</th>
	<th>Date Of Sale
	</th>
	<th>Date Of expiry
	</th>
	<th>Agent
	</th>
	<th>Gateway
	</th>
	<th>Amount
	</th>
	<th>Chargeback
	</th>
	<th>Upload
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
$sql=mysql_query("select * from sales limit ".$limitstart." , ".$limitend);
while($row=mysql_fetch_array($sql))
{
$planname=mysql_fetch_array(mysql_query("select planname from plans where id=".$row['planname']));
$agentname=mysql_fetch_array(mysql_query("select agentname from agents where id=".$row['agent']));
$gatewayname=mysql_fetch_array(mysql_query("select gatewayname from gateways where id=".$row['gatewayid']));
echo "<tr><td><a href='editsales.php?id=".$row['id']."'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='delete.php?mode=sales&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['phone']."</td><td>".$row['custname']."</td><td>".$planname['planname']."</td><td>".$row['dateofsale']."</td><td>".$row['dateofexpiry']."</td><td>".$agentname['agentname']."</td><td>".$gatewayname['gatewayname']."</td><td>".$row['amount']."</td><td>".$row['chargeback']."</td>";
if($row['upload'])
{
echo "<td><a href='uploads/plans/".$row['upload']."'>File</a></td>";
}
else
echo "<td></td>";
echo "</tr>";
}
?>
</table>
</tbody>
<div class="row">
<?php
$rows=mysql_query("select * from sales");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displaysales.php?page=".$i."'>".$i."</a> ";
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