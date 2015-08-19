<?php
include 'header.php';

if(!$_SESSION)
{
	header("location:login.php");
}

else if($_SESSION['role']=="agents"||$_SESSION['role']=="admin")
{
?>
<script src="js/agentsubmit.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<h1>
Add New Record
</h1>
<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myform" >
  <div class="form-group">
    <label for="agentname">Agent Name:</label>
    <input type="text" class="form-control" id="agentname" name="agentname">
  </div>
  <div class="form-group">
    <div class="form-group">
  <label for="agentusername">Agent Username:</label>
  <input type="agentusername" class="form-control" id="username" name="username">
  </div> 
  <label for="password">Agent Password:</label>
  <input type="password" class="form-control" id="password" name="password">
  </div> 
  <div class="form-group">
    <label for="upload">Upload:</label>
    <input type="file" class="form-control file" id="upload" name="upload">
  </div>
  <div class="form-group">
    <label for="bio">Agent Bio:</label>
    <input type="text" class="form-control" id="bio" name="bio">
  </div>
     <button class="btn btn-primary" id="submit" type="submit">Submit</button>
	 <button type="reset" class="btn btn-primary" id="Clear">Clear Form</button>
	 <div class="form-group primary-text" id="success">
   </div>
</form>
</div>
</div>
<?php } 
else
{
header("location:logout.php");
}
?>