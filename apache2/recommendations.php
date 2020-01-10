<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

session_start();
if(!isset($_SESSION['Verified']))
{
//	$errors = "Attempted to access a member's only page.";
  //      $id = "fe";
    //    logErrors($errors, $id);
        header("Location: ./");
}
else {
        $username = $_SESSION["username"];

        $profile = displayProfile($username);

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
<title>Recommendations</title>
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
                                        <a class="nav-link" href="dashboard.php"><span data-feather="user"></span>Profile</a></li>
                                <li class="nav-item">
                                        <a class="nav-link" href="preferences.php"><span data-feather="settings"></span>Preferences</a></li>
                                <li class="nav-item">
                                        <a class="nav-link active" href="#"><span data-feather="user-plus"></span>Shopping List
					<span class="sr-only">(current)</span></a></li>
                        </ul>
                </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                </div>
                <strong><u>Shopping List</u></strong><br><br>
               	<?php
                $userList = displayUserList($username, $zip);
                $items = count($userList);
                $item = 0;
                if($items > 0){
			while($item < $items){
				echo $userList[$item]."<br>";
				$item++;
                        }
                        $item2 = 0;

                        echo "<br><strong><u>Here are some recommendations based on your shopping list</u></strong><br>";

                        while ($item2<$items) {
                        //Rec Set1:  Plants in containers * Trees, shrubs * Cut flowers
                                if( ($userList[$item2]== "Plants in containers")) {

                                        if( (!in_array("Trees, shrubs", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Trees, shrubs. <br>");}
                                        if( (!in_array("Cut flowers", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may Cut flowers. <br>");}
                                }

                                else if( ($userList[$item2] =="Trees, shrubs")) {
                                        if( (!in_array("Plants in containers", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Plants in containers. <br>");}

                                        if( (!in_array("Cut flowers" , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Cut flowers. <br>");} 
                                }
                                else if( ($userList[$item2] =="Cut flowers")) {

                                        if( (!in_array("Plants in containers", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Plants in containers. <br>");}

                                        if( (!in_array("Trees, shrubs" , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Trees, shrubs. <br>");}
                                }
                        //Rec Set2: Fresh fruits * Juices and or non-alcoholic ciders * Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc. 
                                else if( ($userList[$item2] =="Fresh fruits")) {

                                        if( (!in_array("Juices and or non-alcoholic ciders", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Juices and or non-alcoholic ciders. <br>");}

                                        if( (!in_array("Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc." , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.. <br>");} 
                                }
                                else if( ($userList[$item2] =="Juices and or non-alcoholic ciders")) {

                                        if( (!in_array("Fresh fruits", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Fresh fruits. <br>");}

                                        if( (!in_array("Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc." , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.. <br>");}
                                }
                                else if( ($userList[$item2] =="Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.")) {

                                        if( (!in_array("Fresh fruits", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Fresh fruits. <br>");}

                                        if( (!in_array("Juices and or non-alcoholic ciders" , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Juices and or non-alcoholic ciders. <br>");}
                                }
                        //Rec Set3: Fresh vegetables * Mushrooms * Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc. * Fresh and/or dried herbs
                                else if( ($userList[$item2] =="Fresh vegetables")) {

                                        if( (!in_array("Mushrooms", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Mushrooms. <br>");}

                                        if( (!in_array("Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc." , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.. <br>");} 

                                        if( (!in_array("Fresh and/or dried herbs", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Fresh and/or dried herbs. <br>");}

                                }
                                else if( ($userList[$item2] =="Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.")) {

                                        if( (!in_array("Fresh vegetables", $userList)) )
                                                {print_r("You have ". $userList[$item2] . " . You may like Fresh vegetables. <br>");}

                                        if( (!in_array("Fresh and/or dried herbs" , $userList)) )
                                                {print_r("You have ". $userList[$item2] . " . You may like Fresh and/or dried herbs. <br>");}

					if( (!in_array("Mushrooms", $userList)) )
                                                {print_r("You have ". $userList[$item2] . " . You may like Mushrooms. <br>");}

                                }

                                else if( ($userList[$item2] =="Mushrooms")) {

                                        if( (!in_array("Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.. <br>");}

                                        if( (!in_array("Fresh vegetables", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Fresh vegetables. <br>");}

                                        if( (!in_array("Fresh and/or dried herbs" , $userList)) )
                                                {print_r("You have". $userList[$item2] . ". You may like Fresh and/or dried herbs. <br>");}

                                }
                                else if( ($userList[$item2] =="Fresh and/or dried herbs")) {

                                        if( (!in_array("Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.. <br>");}

                                        if( (!in_array("Fresh vegetables", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Fresh vegetables. <br>");}

                                        if( (!in_array("Mushrooms" , $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like mushrooms. <br>");}
                                
                                }
                        // Rec Set4: Eggs * Cheese and/or dairy products
                                else if( ($userList[$item2] =="Eggs")) {

                                        if( (!in_array("Cheese and/or dairy products", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Cheese and/or dairy products. <br>");}
                                }
                                // Rec Set4.2 Cheese and/or dairy products * Wine, beer, hard cider
                                else if( ($userList[$item2] =="Cheese and/or dairy products")) {

                                        if( (!in_array("Eggs", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Eggs. <br>");}
                                
                                        if( (!in_array("Wine, beer, hard cider", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Wine, beer, hard cider. <br>");}

                                }

                        // Rec Set5: Honey * Maple syrup and/or maple products
                                else if( ($userList[$item2] =="Honey")) {

                                        if( (!in_array("Maple syrup and/or maple products", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Maple Syrup and/or maple products. <br>");}
                                }
                                else if( ($userList[$item2] =="Maple syrup and/or maple products")) {

                                        if( (!in_array("Honey", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Honey. <br>");}
                                }
                        // Rec Set8: Meat * Poultry  
                                else if( ($userList[$item2] =="Meat")) {

                                        if( (!in_array("Poultry", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Poultry. <br>");}
                                }
                                else if( ($userList[$item2] =="Poultry")) {

                                        if( (!in_array("Meat", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Meat. <br>");}
                                }
                        // Rec Set 7 Baked goods * Prepared foods (for immediate consumption) * Coffee and or tea
                                else if( ($userList[$item2] =="Baked goods")) {

                                        if( (!in_array("Prepared foods (for immediate consumption)", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Prepared foods for immediate consumption. <br>");}
                                        if( (!in_array("Coffee and or tea", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like coffee and or tea. <br>");}

                                }
                                else if( ($userList[$item2] =="Prepared foods for (immediate consumption)")) {

                                        if( (!in_array("Baked goods", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Baked goods. <br>");}
                                }
                        // Rec Set 8 Dry beans * Grains/flour 
                                else if( ($userList[$item2] =="Dry beans")) {

                                        if( (!in_array("Grains/flour", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Grains/flour. <br>");}
                                }
                                else if( ($userList[$item2] =="Grains/flours")) {

                                        if( (!in_array("Dry beans", $userList)) )
                                                {print_r("You have ". $userList[$item2] . ". You may like Dry beans. <br>");}
                                }

                        $item2++;

                        }
		}else{
			echo "Please <a href='search.php'>search for markets</a> in your area to get a populated products list and then <a href='preferences.php'>update your preferences</a>.";
//			$errors = "No recommendations available for ".$username;
  //      		$id = "be";
    //    		logErrors($errors, $id);
		}
		?>
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
