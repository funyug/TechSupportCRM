<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="agents"||$_SESSION['role']=="admin")
{
?>
<script src="js/getcustomers.js"></script>
<script src="js/salessubmit.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<h1>
Add new sales record
</h1>
<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform" >
<div class="col-lg-6">
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="number" class="form-control" id="phone" name="phone">
    <span class="help-block">Enter customer's phone number to link an existing lead. A new number will open a new lead entry browser window/tab.</span>
  </div>
  <div class="form-group">
    <label for="planname">Plan Name:</label>
    <select class="form-control" id="planname" name="planname">
	<?php 
		$sql=mysql_query("Select * from plans");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['planname'];?></option>
		<?php 
		}
	?>
	</select>
  </div>
  <div class="form-group">
<div class="col-xs-4">
    <label for="dateofsale">Date Of Sale:</label>
    <input type="date" class="form-control" id="dateofsale" name="dateofsale">
</div>
  </div>
  <div class="form-group">
<div class="col-xs-4">
    <label for="dateofexpiry">Plan Expiration:</label>
    <input type="date" class="form-control" id="dateofexpiry" name="dateofexpiry">
</div>
  </div><br><br><br><br>
  <div class="form-group">
    <label for="agent">Agent:</label>
    <select class="form-control" id="agent" name="agent">
	<?php 
		$sql=mysql_query("Select * from agents");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['agentname'];?></option>
		<?php 
		}
	?>
	</select>
  </div><div class="form-group">
    <label for="upload">Upload:</label>
    <input type="file" class="form-control" id="upload" name="upload">
  </div>
</div>
<div class="col-lg-6">
  
  <div class="form-group">
    <label for="custname">Customer Name:</label>
    <input required type="text" class="form-control" id="custname" name="custname" disabled="true">
  </div>
  <div class="form-group" id="warningmsg">
  
  </div>
  <div class="form-group">
    <label for="gatewayid">Gateway:</label>
    <select class="form-control" id="gatewayid" name="gatewayid">
	<?php 
		$sql=mysql_query("Select * from gateways");
		while($row=mysql_fetch_array($sql))
		{
		?>
		<option value="<?php echo $row['id'];?>"><?php echo $row['gatewayname'];?></option>
		<?php 
		}
	?>
  </select>
  <div class="form-group">
    <label for="amount">Amount:</label>
    <input type="number" class="form-control" id="amount" name="amount">
  </div>
   <button type="submit" class="btn btn-primary" id="submit">Submit</button>
   <button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
   <div class="form-group primary-text" id="success">
   </div>
</div>
</div>
</form>
</div>

<?php } 
else
{
header("location:logout.php");
}
?>