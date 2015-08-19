<?php
include 'header.php';


$planname=filter_var($_GET['planname'], FILTER_SANITIZE_STRING);
$duration=filter_var($_GET['duration'], FILTER_SANITIZE_STRING);
$price=filter_var($_GET['price'], FILTER_SANITIZE_STRING);
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
$path=APP_PATH."/crm/uploads/plans//".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
else
$upload="";
$sql="insert into plans values ('','$planname','$duration','$price','$upload')";
mysql_query($sql) or die(mysql_error());

echo "Plan Added";

?>
