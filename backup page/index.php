<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Navbar with Inline Login Form in Dropdown</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	body{
		font-family: 'Open Sans', sans-serif;
	}
	.form-control {
		box-shadow: none;
		border-radius: 4px;        
        border-color: #dfe3e8;
	}
	.form-control:focus {
		border-color: #29c68c;
		box-shadow: 0 0 8px rgba(0,0,0,0.1);
	}
	.navbar-header.col {
		padding: 0 !important;
	}	
	.navbar {
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		border-bottom: 1px solid #dfe3e8;
		border-radius: 0;
	}
	.navbar .navbar-brand {
		font-size: 20px;
		padding-left: 0;
		padding-right: 50px;
	}
	.navbar .navbar-brand b {
		font-weight: bold;
		color: #29c68c;		
	}
	.navbar ul.nav li a {
		color: #999;
	}
	.navbar ul.nav li a:hover, .navbar ul.nav li a:focus {
		color: #29c68c !important;
	}
	.navbar ul.nav li.active > a, .navbar ul.nav li.open > a {
		color: #26bb84 !important;
		background: transparent !important;
	}
    .navbar .form-inline .input-group-addon {
		box-shadow: none;
        border-radius: 2px 0 0 2px;
		background: #f5f5f5;
        border-color: #dfe3e8;
        font-size: 16px;
    }
	.navbar .form-inline i {
		font-size: 16px;
	}
	.navbar .form-inline .btn {
		border-radius: 2px;
		color: #fff;
        border-color: #29c68c;
		background: #29c68c;
		outline: none;
	}
	.navbar .form-inline .btn:hover, .navbar .form-inline .btn:focus {
        border-color: #26bb84;
		background: #26bb84;
    }
	.navbar .search-form {
		display: inline-block;
	}
	.navbar .search-form .btn {
		margin-left: 4px;
	}
	.navbar .search-form .form-control {
		border-radius: 2px;
	}
	.navbar .login-form .input-group {
		margin-right: 4px;
		float: left;
	}
	.navbar .login-form .form-control {
		max-width: 158px;
		border-radius: 0 2px 2px 0;
	}    	
	.navbar .navbar-right .dropdown-toggle::after {
		display: none;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		padding: 6px 20px;
	}
	.navbar .navbar-right .dropdown-menu {
		width: 505px;
		padding: 20px;
		left: auto;
		right: 0;
        font-size: 14px;
	}
	@media (min-width: 1200px){
		.search-form .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 768px){
		.navbar .navbar-right .dropdown-menu {
			width: 100%;
			background: transparent;
			padding: 10px 20px;
		}
		.navbar .input-group {
			width: 100%;
			margin-bottom: 15px;
		}
		.navbar .input-group .form-control {
			max-width: none;			
		}
		.navbar .login-form .btn {
			width: 100%;
		}
	}
</style>
</head> 
<body>
<nav class="navbar navbar-default navbar-expand-lg navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#"><b> MIDAL</b> App</a>  		
		<!-- <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button> -->
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<!-- <ul class="nav navbar-nav">
			<li class="nav-item"><a href="#" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="#" class="nav-link">About</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" class="dropdown-item">Web Design</a></li>
					<li><a href="#" class="dropdown-item">Web Development</a></li>
					<li><a href="#" class="dropdown-item">Graphic Design</a></li>
					<li><a href="#" class="dropdown-item">Digital Marketing</a></li>
				</ul>
			</li>
			<li class="nav-item active"><a href="#" class="nav-link">Pricing</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
		</ul> -->
		<!-- <form class="navbar-form form-inline search-form">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form> -->
		<ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Login</a>
				<ul class="dropdown-menu">
					<li>
                        <form class="form-inline login-form" action="control.php" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <button name="login" type="submit" class="btn btn-primary">Login</button>
                        </form>                        
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<div class="container">
    <div class="jumbotron">
        <h2>MIDAL App</h2>
        <p class="lead"><b> Aplikasi Monitoring Administrasi Pelayanan Internal</b></p>
        <!-- <p class="lead">Dalam sistem ini anda dapat membuat permintaan perbaikan alat pengolah data, BHP, pengelolaan gedung dan lainnya. <a href="#" target="_blank">MIDAL.localhost</a> you will learn the essential web development technologies along with real life practice examples, so that you can create your own website to connect with the people around the world.</p>
        <p><a href="#" class="btn btn-success btn-lg">Get started today</a></p> -->
    </div>
    <!-- <div class="row">
        <div class="col-md-4">
            <h2>HTML</h2>
            <p>HTML is the standard markup language for describing the structure of the web pages. Our HTML tutorials will help you to understand the basics of latest HTML5 language, so that you can create your own web pages or website.</p>
            <p><a href="https://www.tutorialrepublic.com/html-tutorial/" target="_blank" class="btn btn-success">Learn More »</a></p>
        </div>
        
    </div>-->

    <hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2019-<?php echo date("Y");?> am.doating</p>
            </div>
            <!-- <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div> -->
        </div>
    </footer>
</div>
</body>
</html>                                                                                                                