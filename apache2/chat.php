<?php
//ini_set("display_errors", "1");
#!/usr/bin/php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

session_start();
if(!isset($_SESSION['Verified']))
{
	//$errors = "Attempted to access a member's only page.";
	//$id = "fe";
	//logErrors($errors, $id);
        header("Location: marketLogin.html");
}
else {
        $username = $_SESSION['username'];
	if(isset($_GET['submit'])) {
		if(isset($_GET['message'])){

			$msg = $_GET['message'];
			$date = date("n/j/Y");
			$time = date("g:i:s A");
			$chat = chatMessage($username, $msg, $time, $date);
		}
	}
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
<title>Home</title>
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" id="logo" href="./">Market Hub |</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                        <li class="nav-item active"><a class="nav-link" href="chat.php">Chat<span class="sr-only">(current)</span></a></li>
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

<?php
echo "<textarea rows='10' cols='70' class='chat' id='chat' readonly>";

foreach($chat as $line){
	print_r($line);
}
echo "</textarea>";
?>
<form>
<textarea rows="5" cols="50" class="message" id="message" name="message" required></textarea>
<button type="submit" name="submit">Send</button>
</form>
<div class="footer">
        <span class="text-muted">IT490 Farmer's Market Hub</span>
</div>

<!--JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<script>
	var textarea = document.getElementById('chat');
	textarea.scrollTop = textarea.scrollHeight;
</script>
