<?php
include 'header.php';

$phone=filter_var($_GET['phone'], FILTER_SANITIZE_STRING);
$custname=filter_var($_GET['custname'], FILTER_SANITIZE_STRING);
$email=filter_var($_GET['email'], FILTER_SANITIZE_STRING);
$address=filter_var($_GET['address'], FILTER_SANITIZE_STRING);
$city=filter_var($_GET['city'], FILTER_SANITIZE_STRING);
$pincode=filter_var($_GET['pincode'], FILTER_SANITIZE_STRING);
$country=filter_var($_GET['country'], FILTER_SANITIZE_STRING);
$date=filter_var($_GET['date'], FILTER_SANITIZE_STRING);
$cardtype=filter_var($_GET['cardtype'], FILTER_SANITIZE_STRING);
$cardname=filter_var($_GET['cardname'], FILTER_SANITIZE_STRING);
$cardnumber=filter_var($_GET['cardnumber'], FILTER_SANITIZE_STRING);
$cvv=filter_var($_GET['cvv'], FILTER_SANITIZE_STRING);
$expirydate=filter_var($_GET['expirydate'], FILTER_SANITIZE_STRING);
$issue=filter_var($_GET['issue'], FILTER_SANITIZE_STRING);
define('APP_PATH', realpath(dirname(__DIR__)));
if($_FILES['upload']['name'])
{
$file=$_FILES['file-0'];
$path=APP_PATH."/crm/uploads/leads//".basename($file['name']);
move_uploaded_file($file['tmp_name'],$path);
$upload=filter_var(basename($file['name']), FILTER_SANITIZE_STRING);
}
else
$upload="";
$sql="insert into customers values ('','$phone','$custname','$email','$address','$city','$country','$pincode','$date','$upload','$issue','$cardname','$cardnumber','$cvv','$expirydate','$cardtype')";
mysql_query($sql) or die(mysql_error());


?>
<script>alert("Customer added")</script>