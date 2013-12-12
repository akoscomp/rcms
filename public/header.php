<!DOCTYPE html>
<?php
include_once("config.php");

if(!loggedIn()):
	header('Location: login.php');
endif;
?>

<html>
    <head>
        <title>rcms2-sync</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href = "css/bootstrap.css" rel = "stylesheet">
            <link href = "css/tablesorter.css" rel = "stylesheet">
            <link href = "css/style.css" rel = "stylesheet">
    </head>
    <body>

    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/functions.js"></script>

        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                
                <a href="index.php" class="navbar-brand">rcms</a>
                
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar">Icon bar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="collapse navbar-collapse navHeaderCollapse">
                    
                    <ul class = "nav navbar-nav navbar-right">
                        
                        <li class="active"><a href="index.php">Home</a></li>
                        
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">Computers <b class = "caret"></b></a>
                            <ul class = "dropdown-menu">
                                <li><a href="compRoom.php" id="roomAll">All</a></li>
                                <li><a href="compRoom.php" id="roomRest">Rest</a></li>
                            </ul>
                        </li>

                        <li><a href="ring.php">Bell</a></li>
                        
                        <li><a href="#contact" data-toggle="modal">Contact Me</a></li>
						<?php
							if(!loggedIn()) {
								echo '<li><a href="join.php">Register</a></li>';
								echo '<li><a href="login.php">Login</a></li>';
							}
							else
							{
								echo '<li><a href="logout.php">Logout</a></li>';
							}
						?>
                    </ul>
                
                </div>
            </div>
        </div>

        <div class="modal fade" id="contact" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Contact Tech Site</h4>
                    </div>
                    <div class="modal-body">
                        <p>Text text text text text text text text text text text text text</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Send</a>
                        <a class="btn btn-primary" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
