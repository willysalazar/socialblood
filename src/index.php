<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login with Facebook</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

	</head>
<body>
  <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container">
<div class="hero-unit">
  <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
  </div>
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
	<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<li class="nav-header">Facebook Email</li>
<li><?php echo $_SESSION['EMAIL']; ?></li>
<div><a href="logout.php">Logout</a></div>
</ul></div></div>



<?php
	$arrayFriends = $_SESSION['FRIENDSFB']; 
	
	foreach ($arrayFriends['data'] as $i => $value) {?>
		
		<img src="https://graph.facebook.com/<?php echo $value->id; ?>/picture" />
		<span><?php echo $value->name; ?></span>
		
	<?php
	}
	
?>




    <?php else: ?>     <!-- Before login --> 
<div class="container">
<h1>Login with Facebook (deploy via deployhq.com)</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>	 
	  </div>
      </div>
    <?php endif ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
