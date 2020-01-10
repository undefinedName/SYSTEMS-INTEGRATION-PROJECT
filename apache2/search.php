<?php

//ini_set("display_errors", "1");
require('myfunctions.php');
require('apiCalls.php');

session_start();
if(isset($_SESSION['Verified']))
{
        $username = $_SESSION['username'];
        $sidval = session_id();
}

if(isset($_GET['submit']))
{
	$zipsrch = $_GET['zip'];

	$marketList = marketList($zipsrch);
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
<title>Search</title>
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
                        <li class="nav-item active"><a class="nav-link" href="search.php">Search<span class="sr-only">(current)</span></a></li>
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

<form class="form-inline mt-2 mt-md-0" method="GET" action="">
	<input class="form-control mr-sm-2" name="zip" type="number" required placeholder="Enter zip code" aria-label="Search">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search">Search</button>
</form>
<br>
<div id="searchresults">
<?php
foreach($marketList['results'] as $market)
{
	if($market['id'] == "Error")
	{
		echo "<button type='button' class='collapsible'>".$market['marketname']."</button>";
		$id = "api";
		$errors = $market['marketname'];
		logErrors($errors, $id);
		exit();
	}
	echo "<button type='button' class='collapsible'>".$market['marketname']."</button>";
	echo "<div class='content'>"."<br><strong>Market ID:</strong> ".$market['id']."<br>";

	$id = $market['id'];

	$marketDetail = marketDetail($id);

	foreach($marketDetail as $detail)
	{
		echo "<strong>Address:</strong> ".$detail['Address']."<br>";
		echo "<strong>Google Link:</strong> "."<a href=".$detail['GoogleLink']." target='_blank'>Map</a>"."<br>";
		echo "<strong>Products:</strong> ".$detail['Products']."<br>";
		echo "<strong>Schedule:</strong> ".str_replace(';', '', $detail['Schedule'])."<br>";
		if(strlen($detail['Products']) > 0){
			$market_products[] = explode("; ", $detail['Products']);
		}
	}
	echo "</div>";
}

$all_products = array();
foreach($market_products as $every_market)
{
	foreach($every_market as $every_product)
	{
		if(!in_array($every_product, $all_products))
		{
			$all_products[] = $every_product;
		}
	}
}
/*
foreach($all_products as $onepiece)
{
	echo $onepiece ."<br>";
}*/
if(count($all_products) > 0){
	addApiList($zipsrch, $all_products);
}
?>
</div>

<div class="footer">
        <span class="text-muted">IT490 Farmer's Market Hub</span>
</div>

<!--JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i=0; i < coll.length; i++)
{
	coll[i].addEventListener("click", function(){
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		/*if (content.style.display == "block"){
			content.style.display = "none";
		} else{
			content.style.display = "block";
		}*/
		if (content.style.maxHeight){
			content.style.maxHeight = null;
		} else {
			content.style.maxHeight = content.scrollHeight + "px";
		}
	});
}
</script>
</html>
