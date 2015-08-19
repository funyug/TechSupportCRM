<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin"||$_SESSION['role']=="agents")
{
?>
<script>
function goBack() {
    window.history.go(-3);
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
$leaddetails=mysql_fetch_array(mysql_query("Select * from customers where id=".$id));
if(!$_POST)
{
?>
<div class="col-lg-6">
<form role="form" method="POST" action="editissue.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform" enctype="multipart/form-data">
    <div class="form-group">
	<label for="issue">Issue:</label>
	<textarea rows="10" cols="10" type="text" class="form-control" id="issue" name="issue"><?php echo $leaddetails['issue'];?></textarea>
  </div>
     <button class="btn btn-primary" id="submit" type="submit">Submit</button>
	 <div class="form-group primary-text" id="success">
   </div>
</form>
<?php
}
else if($_POST)
{
mysql_query("update customers set issue='".filter_var($_POST['issue'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
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