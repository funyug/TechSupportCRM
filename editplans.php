<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="admin")
{
?>
<script>
function goBack() {
    window.history.go(-2);
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
$plandetails=mysql_fetch_array(mysql_query("Select * from plans where id=".$id));
if(!$_POST)
{
?>

<form role="form" method="POST" action="editplans.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform" enctype="multipart/form-data">
  <div class="form-group">
    <label for="planname">Plan Name:</label>
    <input type="text" class="form-control" id="planname" name="planname" value="<?php echo $plandetails['planname'];?>">
  </div>
  <div class="form-group">
    <label for="duration">Duration:</label>
    <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $plandetails['duration'];?>">
  </div>
    <div class="form-group">
    <label for="price">Price:</label>
    <input type="number" class="form-control" id="price" name="price" value="<?php echo $plandetails['price'];?>">
  </div>
    <div class="form-group">
    <label for="upload">Upload:</label>
    <input type="file" class="form-control file" id="upload" name="upload">
  </div>
     <button class="btn btn-primary" id="submit" type="submit">Submit</button>
	 <div class="form-group primary-text" id="success">
   </div>
</form>
<?php
}
else if($_POST)
{
if(empty($_FILES['upload']['name']))
{

mysql_query("update plans set planname='".filter_var($_POST['planname'], FILTER_SANITIZE_STRING)."',duration='".filter_var($_POST['duration'], FILTER_SANITIZE_STRING)."',price='".filter_var($_POST['price'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
}
else
{
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES)
{

$file=$_FILES['upload'];
$path=APP_PATH."\crm\uploads\plans\\".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
mysql_query("update plans set planname='".filter_var($_POST['planname'], FILTER_SANITIZE_STRING)."',duration='".filter_var($_POST['duration'], FILTER_SANITIZE_STRING)."',price='".filter_var($_POST['price'], FILTER_SANITIZE_STRING)."',upload='".$upload."' where id=".$id) or die(mysql_error());
}
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