<?php
include 'header.php';


$gatewayname=filter_var($_GET['gatewayname'], FILTER_SANITIZE_STRING);

$notes=filter_var($_GET['notes'], FILTER_SANITIZE_STRING);
$priority=filter_var($_GET['priority'], FILTER_SANITIZE_STRING);
$payout=filter_var($_GET['payout'], FILTER_SANITIZE_STRING);
$commission=filter_var($_GET['commission'], FILTER_SANITIZE_STRING);
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
$path=APP_PATH."\crm\uploads\agents\\".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
else
$upload="";
$sql=mysql_query("select * from gateways");
while($row=mysql_fetch_array($sql))
{
	if($priority==$row['priority'])
	{
	echo "Gateway of this priority is already added. Please change the priority of this or other gateways.";
	exit(0);
	}
	
}

$sql="insert into gateways values ('','$gatewayname','$notes','$priority','$payout','$commission')";
mysql_query($sql) or die(mysql_error());

echo "Gateway Added";

?>
