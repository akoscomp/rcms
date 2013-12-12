<?php
include_once("config.php");
if(loggedIn()):
	header('Location: index.php');
endif;
if(isset($_POST["submit"])):
  if(!($row = checkPass($_POST["login"], $_POST["password"]))):
    echo "<p>Incorrect login/password, try again</p>";
    exit;
  endif;
  cleanMemberSession($_POST["login"], $_POST["password"]);
  header("Location: members.php");
endif;
?>
<html>
<head>
	<title>rcms login</title>
	<link href = "css/bootstrap.min.css" rel = "stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<div class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-brand">rcms</div>
	</div>
</div>

<div class="container">
	<form class="form-horizontal" role="form" name="form1" method="post" action="<?=$_SERVER["PHP_SELF"];?>" autocomplete="off">
	  <div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-4">
		  <input type="text" name="login" value="<?= isset($_POST["login"]) ? $_POST["login"] : "" ; ?>" id="username" placeholder="username" pattern="[a-zA-Z0-9]{4,}" title="Minmimum 4 letters or numbers required." class="form-control">
		</div>
	  </div>
	  <div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
		  <input type="password" name="password" id="password" placeholder="Password" pattern=".{4,}" title="Minmimum 4 letters or numbers required." class="form-control">
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
		</div>
	  </div>
	</form>
</div>

</body>
</html>
