<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if(Session::exists(Config::get('session/session_name'))) {echo Session::get(Config::get('session/session_name'));}else{?>Gestion Des Notes <?php }?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="template/css/bootstrap.css">
	<link rel="stylesheet" href="template/css/theme.css">
	<link rel="stylesheet" href="template/css/style.css">
	<!-- here is the js script -->
	<script src="template/js/jq.js"></script>
	<script src="template/js/bootstrap.js"></script>
</head>
<body>

<div class="navbar navbar-default">
	<div class="col-sm-2 plogo"><img src="template/img/logo.png" alt=""></div>
	<div class="col-sm-2 account">

		<ul>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				 <i class="fa fa-user"></i> <?php echo Session::get(Config::get('session/session_name'));?> <i class="fa fa-sort-desc"></i></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="">My ProfILe</a></li>
					<li><a href="">Setting</a></li>
					<li><a href="lgt.php">LogOut</a></li>
				</ul>
			</li>

		</ul>

	</div>
</div>