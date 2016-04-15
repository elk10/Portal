<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Cerulean 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20131223

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
  <link href="default.css" rel="stylesheet" type="text/css" media="all" />
  <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

  <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
  <div id="header-wrapper">
    <div id="header" class="container">
      <div id="logo">
        <h1><a href="#">e-Parent Portal</a></h1>
   </div>
 </div>
</div>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Login</h2>
		</div>
		<form action = "login.php" method ="POST">
			<table>
				<tr>
					<td>Username</td>	
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Password</td>	
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td></td>	
					<td><input type="submit" name="submit" value="log in" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php include ('footer.php'); ?>
