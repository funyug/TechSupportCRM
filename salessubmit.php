<?php
include 'header.php';

$phone=filter_var($_GET['phone'], FILTER_SANITIZE_STRING);
$custname=filter_var($_GET['custname'], FILTER_SANITIZE_STRING);
$planname=filter_var($_GET['planname'], FILTER_SANITIZE_STRING);
$dateofsale=filter_var($_GET['dateofsale'], FILTER_SANITIZE_STRING);
$dateofexpiry=filter_var($_GET['dateofexpiry'], FILTER_SANITIZE_STRING);
$agent=filter_var($_GET['agent'], FILTER_SANITIZE_STRING);

$gatewayid=filter_var($_GET['gatewayid'], FILTER_SANITIZE_STRING);

$amount=filter_var($_GET['amount'], FILTER_SANITIZE_STRING);
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES)
{
$file=$_FILES['file-0'];
$path=APP_PATH."/crm/uploads/sales//".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
else
$upload="";
$sql="insert into sales values ('','$phone','$custname','$planname','$dateofsale','$dateofexpiry','$agent','$gatewayid','$amount','no','$upload')";
mysql_query($sql) or die(mysql_error());

echo "Sales Added";

?>
