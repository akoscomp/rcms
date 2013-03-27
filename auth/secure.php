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
		if($config['log']['access'] == 'true')
		{
			log_event('access');
		}
	}
?>