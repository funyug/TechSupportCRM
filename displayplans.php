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
Plans
</h1>
<table class="table table-striped table-condensed table-bordered table-hover">
<thead>
	<tr>
	<th>
	</th>
	<th>Plan ID
	</th>
	<th>Plan Name
	</th>
	<th>Plan Duration
	</th>
	<th>Price
	</th>
	<th>Uploaded File
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
$sql=mysql_query("select * from plans limit ".$limitstart." , ".$limitend);
while($row=mysql_fetch_array($sql))
{
echo "<tr><td><a href='editplans.php?id=".$row['id']."'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='delete.php?mode=plans&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['planname']."</td><td>".$row['duration']."</td><td>".$row['price']."</td>";
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
$rows=mysql_query("select * from plans");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displayplans.php?page=".$i."'>".$i."</a> ";
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