<?php
include_once("config.php");
if(loggedIn()):
header('Location: members.php');
endif;
if(isset($_POST["submit"])):
	if(!($_POST["password"] == $_POST["password2"])):
		echo "<p>Your passwords did not match</p>";
		exit;
	endif;
	
    $query = $coll->findOne(array('login' => $_POST['login']));

	if(empty($query)):
		newUser($_POST["login"], $_POST["password"]);
		cleanMemberSession($_POST["login"], $_POST["password"]);
		header("Location: members.php");
	else:
	  echo '<p>Username already exists, please choose another username.</p>';
	endif;
endif;
?>

<html>
<head>
        <title>rcms join</title>
        <link href = "css/bootstrap.min.css" rel = "stylesheet">
        <link href = "css/style.css" rel = "stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <form action="<?=$_SERVER["PHP_SELF"];?>" method="POST" role="form" class="form-style">
      <h2 class="text-center">Sing Up</h2>
      <div class="form-group">
        <label for="inputUsername">Username</label>
        <input type="text" class="form-control" name="login" placeholder="Username" value="<?php print isset($_POST["login"]) ? $_POST["login"] : "" ; ?>">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="E-Mail" size=30>
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" size=30>
      </div>
      <div class="form-group">
        <label for="inputPassword">Repeat Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Password (repeat)" size=30>
      </div>
      <button class="btn btn-large btn-primary" type="submit" name="submit" value="Submit">Sign Up</button>
   </form>
</body>
</html>
