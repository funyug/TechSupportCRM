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
<h1><?php
$tablename=$_GET['mode'];
$id=$_GET['id'];
mysql_query("delete from ".$tablename." where id=".$id);

?>
Entry Deleted
</h1>
</div>
</div>
<?php } ?>