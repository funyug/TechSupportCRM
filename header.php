<?
	include 'dbconnection.php';
	session_start();
	if(!isset($_SESSION))
{
header("location:login.php");
}
?>
<html>
<head>
<title>BPOforce CRM by Von Media | vonmedia.net</title>
<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">VonMedia BPOforce CRM</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
	  <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search</a></li>
	   <?php
		if(isset($_SESSION))
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="newuser.php"><span class="glyphicon glyphicon-plus"></span> Add Admin</a></li>
		  <li><a href="agents.php"><span class="glyphicon glyphicon-plus"></span> Add Agent</a></li>
		  <li><a href="displayusers.php"><span class="glyphicon glyphicon-th-list"></span> Display Users</a></li>
		  </ul></li>
		  <?php
		}
		}
		?>
	  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Leads
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href="lead.php"><span class="glyphicon glyphicon-plus"></span> Add Lead</a></li>
		<?php
		if($_SESSION)
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li><a href="displayleads.php"><span class="glyphicon glyphicon-th-list"></span> Display Leads</a></li>
		<?php
		}
		}
		?>
		</ul></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sales
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		<li><a href="sales.php"><span class="glyphicon glyphicon-plus"></span> Add Sale</a></li>
		<?php
		if($_SESSION)
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li><a href="displaysales.php"><span class="glyphicon glyphicon-th-list"></span> Display Sales</a></li>
		<?php
		}
		}
		?>
		</ul></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Plans
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <?php
		if($_SESSION)
		{
		if($_SESSION['role']=="admin")
		{
		?>
        <li><a href="plans.php"><span class="glyphicon glyphicon-plus"></span> Add Plan</a></li>
		<?php
		}
		}
		?>
		<li><a href="displayplans.php"><span class="glyphicon glyphicon-th-list"></span> Display Plans</a></li>
		</ul></li>
		 <?php
		if(isset($_SESSION))
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Agents
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		<li><a href="agents.php"><span class="glyphicon glyphicon-plus"></span> Add Agent</a></li>
		<li><a href="displayagents.php"><span class="glyphicon glyphicon-th-list"></span> Display Agents</a></li>
		</ul></li>
		<?php
		}
		}
		?>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gateways
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		   <?php
		if($_SESSION)
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li><a href="gateway.php"><span class="glyphicon glyphicon-plus"></span> Add Gateway</a></li>
		<?php
		}
		}
		?>
		<li><a href="displaygateways.php"><span class="glyphicon glyphicon-th-list"></span> Display Gateways</a></li>
		</ul></li>
		 <?php
		if(isset($_SESSION))
		{
		if($_SESSION['role']=="admin")
		{
		?>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="salesreports.php"><span class="glyphicon glyphicon-list-alt"></span> Sales Reports</a></li>
		  <li><a href="agentreports.php"><span class="glyphicon glyphicon-list-alt"></span> Agent Reports</a></li>
		  <li><a href="gatewayreports.php"><span class="glyphicon glyphicon-list-alt"></span> Gateway Reports</a></li>
		  <li><a href="chargebackreports.php"><span class="glyphicon glyphicon-list-alt"></span> Chargeback Reports</a></li>
		  </ul></li>
		  <?php
		}
		}
		?>
       <li><a href="http://vonmedia.net/bpoforce-crm" target="_blank"><span class="glyphicon glyphicon-earphone"></span> Help</a></li>

        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>


      </ul>
    </div>
  </div>
</nav>
