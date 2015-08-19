<?php
include 'header.php';


$agentname=filter_var($_GET['agentname'], FILTER_SANITIZE_STRING);
$agentusername=filter_var($_GET['username'], FILTER_SANITIZE_STRING);
$agentpass=md5(filter_var($_GET['password'], FILTER_SANITIZE_STRING));
$bio=filter_var($_GET['bio'], FILTER_SANITIZE_STRING);
/*$address=$_GET['address'];
$city=$_GET['city'];
$pincode=$_GET['pincode'];
$country=$_GET['country'];
$date=$_GET['date'];

$issue=$_GET['issue'];
*/
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES)
{
$file=$_FILES['file-0'];
$path=APP_PATH."/crm/uploads/agents//".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
else
$upload="";
$sql="insert into agents values ('','$agentname','$bio','$upload')";
mysqli_query($con,$sql);
$sql="insert into users values ('','$agentusername','$agentpass','agent')";
mysqli_query($con,$sql);

echo "Agent Added";

?>
