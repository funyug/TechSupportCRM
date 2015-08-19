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
<h1>Agents</h1>
<div class="row">
<table class="table table-striped table-condensed table-bordered table-hover">
<thead>
	<tr>
	<th>
	</th>
	<th>Agent ID
	</th>
	<th>Agent Name
	</th>
	<th>Uploaded File
	</th>
	<th>Bio
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
$sql=mysql_query("select * from agents limit ".$limitstart." , ".$limitend);


while($row=mysql_fetch_array($sql))
{
echo "<tr><td><a href='editagents.php?id=".$row['id']."'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='delete.php?mode=agents&id=".$row['id']."'><span class='glyphicon glyphicon-remove'></span> Delete</a></td><td>".$row['id']."</td><td>".$row['agentname']."</td>";
if($row['upload'])
{
echo "<td><a href='uploads/agents/".$row['upload']."'>File</a></td>";
}
else
echo "<td></td>";
echo "<td>".$row['bio']."</td></tr>";
}
?>
</table>
</tbody>
<div class="row">
<?php
$rows=mysql_query("select * from agents");
echo "Pages: ";
for($i=1;$i<=mysql_num_rows($rows)/10+1;$i++)
{
echo "<a href='displayagents.php?page=".$i."'>".$i."</a> ";
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