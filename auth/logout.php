<?php
	session_start();
	$config = parse_ini_file("auth.ini",true);
	require_once "auth_database.php";

	if(!check_auth(session_id()))
	{
		header("Location: {$config['auth']['base_dir']}/login.php?url={$_SERVER['REQUEST_URI']}");
		exit;
	}
	else
	{
		if($config['log']['logout'] == 'true')
		{
			log_event('logout');
		}
		logout(session_id());
		
		session_destroy();
		echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
		echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
		echo "\t<head>\n";
		echo "\t\t<title>Logged out</title>\n";
		echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"auth.css\"></link>\n";
		echo "\t</head>\n";
		echo "\t<body>\n";
		echo "\t\t<p>You have been logged out. <a href=\"{$_SERVER['HTTP_REFERER']}\">Return</a></p>\n";
		echo "\t</body>\n";
		echo "</html>";

	}
?>