<?php
include 'dbconnection.php';
$c=2;
$phone=$_GET['phone'];
$sql=mysql_query("select * from customers");
while($row=mysql_fetch_array($sql))
{
if($row['phone']==$phone)
{
$c=1;
echo $row['custname'];
break;
}
}
if($c!=1)
{
echo $c;
}
?>

