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
$agentdetails=mysql_fetch_array(mysql_query("Select * from agents where id=".$id));
if(!$_POST)
{
?>

<form role="form" method="POST" action="editagents.php?id=<?php echo filter_var($_GET['id'], FILTER_SANITIZE_STRING);?>" id="myform"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="agentname">Agent Name:</label>
    <input type="text" class="form-control" id="agentname" name="agentname" value="<?php echo $agentdetails['agentname'];?>">
  </div>
  <div class="form-group">
    <label for="bio">Agent Bio:</label>
    <input type="text" class="form-control" id="bio" name="bio" value="<?php echo $agentdetails['bio'];?>">
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
mysql_query("update agents set agentname='".filter_var($_POST['agentname'], FILTER_SANITIZE_STRING)."',bio='".filter_var($_POST['bio'], FILTER_SANITIZE_STRING)."' where id=".$id) or die(mysql_error());
}
else
{
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES)
{
$file=$_FILES['upload'];
$path=APP_PATH."\crm\uploads\agents\\".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
mysql_query("update agents set agentname='".filter_var($_POST['agentname'], FILTER_SANITIZE_STRING)."',bio='".filter_var($_POST['bio'], FILTER_SANITIZE_STRING)."',upload='".$upload."' where id=".$id) or die(mysql_error());
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