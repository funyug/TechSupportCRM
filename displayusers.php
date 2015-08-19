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
<h1>User</h1>
<table class="table table-striped table-condensed table-bordered table-responsive table-hover">
<thead>
	<tr>
	<th>
	</th>
	<th>User ID
	</th>
	<th>User Name
	</th>
	<th>User Role
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
$sql=mysql_query("select * from users limit ".$limitstart." , ".$limitend);
while($row=mysql_fetch_array($sql))
{
echo "<tr><td><a href='delete.php?mode=users&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['user']."</td><td>".$row['role']."</td></tr>";
}
?>
</table>
</tbody>
<div class="row">
<?php
$rows=mysql_query("select * from users");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displayusers.php?page=".$i."'>".$i."</a> ";
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