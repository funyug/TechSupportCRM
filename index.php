<?php
include 'header.php';
if($_SESSION['role']=="agents"||$_SESSION['role']=="admin")
{
?>
<script src="js/leadsubmit.js"></script>
</head>
<body>
<div class="container">
<div class="page-header">
<h1>Welcome to BPOforce CRM</h1>
</div>
<div class="row">
<div class="col-lg-6">
<h2>Get started!</h2>

<div class="col-sm-4">
    <a href="lead.php" class="btn btn-success btn-info">
      <span class="glyphicon glyphicon-edit"></span> Add Lead
    </a></div>
<div class="col-sm-4">
    <a href="sales.php" class="btn btn-success btn-info">
      <span class="glyphicon glyphicon-edit"></span> Add Sale
    </a></div>

</div>
<?php }
else
{
?>

<?php
echo "You are not authorized to view this page";
}
?>
</div>
</body>
