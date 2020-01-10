<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

session_start();
if(!isset($_SESSION['Verified']))
{
//	$errors = "Attempted to access a member's only page.";
//        $id = "fe";
//        logErrors($errors, $id);
        header("Location: ./");
}
else {
        $username = $_SESSION["username"];
	$profile = displayProfile($username);

        $username = print_r($profile['username'], true);
        $email = print_r($profile['email'], true);
        $zip = print_r($profile['zip'], true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/fmarket.css">
<title>Dashboard</title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" id="logo" href="./">Market Hub |</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="./">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="chat.php">Chat</a></li>
			<li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>
		<?php if (!isset($_SESSION['Verified'])){?>
			<li class="nav-item"><a class="nav-link" href="marketLogin.html">Login</a></li>
			<li class="nav-item"><a class="nav-link" href="marketCreate.html">Register</a></li>
		<?php } else {?>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="dashboard.php">Dashboard</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="marketLogout.php">Logout</a>
				</div>
			</li>
		<?php }?>
		</ul>
	</div>
</nav>

<div class="container-fluid">
	<nav class="col-md-2 d-none d-md-block bg-light sidebar">
		<div class="sidebar-sticky">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="dashboard.php"><span data-feather="user"></span>Profile
					<span class="sr-only">(current)</span></a></li>
				<li class="nav-item">
					<a class="nav-link" href="preferences.php"><span data-feather="settings"></span>Preferences</a></li>
				<li class="nav-item">
					<a class="nav-link" href="recommendations.php"><span data-feather="user-plus"></span>Shopping List</a></li>
			</ul>
		</div>
	</nav>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        		<h1 class="h2">Dashboard</h1>
		</div>
		<form class="profileForm" action="updateProfile.php" method="post">
			<strong><u>Update Information</u></strong><br><br>
			Username: <input type="username" name="username" value="<?php echo $username;?>" readonly><br>
			Email:    <input type="email" name="email" value="<?php echo $email;?>"><br>
			Zip Code: <input type="zip" name= "zip" value="<?php echo $zip;?>"><br><br>
			<!--Enable Notifications? <input type="checkbox" id="notify" checked><br><br>-->
			Password: <input type="password" name="password" required><br><br>
			<button type="submit" class="button">Update</button>
		</form>

</div>

<div class="footer">
	<span class="text-muted">IT490 Farmer's Market Hub</span>
</div>

<!--JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</body>
</html>
<script>
	feather.replace()
</script>
