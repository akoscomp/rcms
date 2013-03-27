<?php
	$auth_db_link = mysql_connect($config['database']['server'], $config['database']['username'], $config['database']['password'])
		or trigger_error("MySQL error: " . mysql_error());
	mysql_select_db($config['database']['db'])
		or trigger_error("MySQL error: " . mysql_error());
		
	function check_auth($sessionid)
	{
		global $config;
		$auth_sql = "SELECT * FROM `{$config['tables']['users']}` WHERE `cookie` = '$sessionid'";
		$result = mysql_query($auth_sql)
			or trigger_error(mysql_error());
		if(mysql_num_rows($result)==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function log_event($event)
	{
		global $config;
		$log_sql = "INSERT INTO `{$config['tables']['log']}` (`event_time`,`event`,`url`,`username`,`ip_address`) VALUES(NOW(),'$event','{$_SERVER['REQUEST_URI']}','{$_SESSION['user']['username']}','{$_SERVER['REMOTE_ADDR']}')";
		mysql_query($log_sql)
			or trigger_error(mysql_error());
	}
	
	function get_user($username)
	{
		global $config;
		$username = mysql_real_escape_string($username);
		$auth_sql = "SELECT * FROM `{$config['tables']['users']}` WHERE `username` = '$username'";
		$result = mysql_query($auth_sql)
			or trigger_error(mysql_error());
		return mysql_fetch_assoc($result);
	}
	
	function login($username,$sessionid)
	{
		global $config;
		$auth_sql = "UPDATE `{$config['tables']['users']}` SET `cookie` = '$sessionid' WHERE `username` = '$username'";
		mysql_query($auth_sql)
			or trigger_error(mysql_error());
	}
	
	function logout($sessionid)
	{
		global $config;
		$logout_sql = "UPDATE `{$config['tables']['users']}` SET `cookie` = NULL WHERE `cookie` = '$sessionid'";
		mysql_query($logout_sql)
			or trigger_error(mysql_error());
	}
?>