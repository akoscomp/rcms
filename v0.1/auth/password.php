<?php
	session_start();
	$config = parse_ini_file("./auth.ini",true);

	if($_REQUEST['action']=="Change Password")
	{
		require_once "auth_database.php";
		require_once "crypt_hmac.php";
		if($_REQUEST['no_js'] ==1)
		{
			$confirm_password = md5(mysql_real_escape_string($_REQUEST['confirm_password']));
			$new_password = md5(mysql_real_escape_string($_REQUEST['new_password']));
		}
		else
		{
			$confirm_password = mysql_real_escape_string($_REQUEST['crypt_confirm_password']);
			$new_password = mysql_real_escape_string($_REQUEST['crypt_new_password']);
		}
		if($new_password == $confirm_password)
		{
			$username = mysql_real_escape_string($_REQUEST['username']);

			$auth_sql = "SELECT * FROM `{$config['tables']['users']}` WHERE `username` = '$username'";
			$result = mysql_query($auth_sql);
			$user_record = mysql_fetch_assoc($result);

			if($_REQUEST['no_js']==1)
			{
				$old_password = md5(mysql_real_escape_string($_REQUEST['old_password']));
				$old_encrypted_pw = $user_record['password'];
			}
			else
			{
				$old_password = mysql_real_escape_string($_REQUEST['crypt_old_password']);
				$obj_crypt = new Crypt_HMAC($user_record['password']);
				$old_encrypted_pw = $obj_crypt->hash($_SESSION['challenge']);
			}
			if($old_encrypted_pw==$old_password)
			{
				$change_sql = "UPDATE `{$config['tables']['users']}` SET `password` = '$new_password', `password_last_changed`= NOW() WHERE `username` = '$username'";
				mysql_query($change_sql)
					or trigger_error(mysql_error());
				$message = "Password changed!";
				$success = true;
			}
			else
			{
				$message = "Username or old password is incorrect";
				$success = false;
			}
		}
		else
		{
			$message = "New passwords do not match.";
			$success = false;
		}
	}
		require_once "rKeyGen.php";
		$_SESSION['challenge'] = rKeyGen(16);
		$bottom = "";
		if(strrchr($_SERVER['PATH_INFO'],'/')=='/password.php')
		{
			echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
			echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
			echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
			echo "\t<head>\n";
			echo "\t\t<title>Login</title>\n";
			echo "\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"auth.css\"></link>\n";
			echo "\t</head>\n";
			echo "\t<body>\n";
			$bottom = "</body>\n</html>";
		}
		if(!$success)
		{
?>
		<form action="<?php echo $_SERVER['SCRIPT_URI'];?>" method="post" onsubmit="submitForm()" id="password_form">
			<h1>Change Password</h1>
			<script type="text/javascript" src="md5.js"></script>
			<script type="text/javascript">
				function submitForm()
				{
					pw_challenge = '<?php echo $_SESSION['challenge'];?>';
					text_old_pw = document.getElementById('text_old_password');
					crypt_old_pw = document.getElementById('crypt_old_password');
					crypt_old_pw.value = hex_hmac_md5(hex_md5(text_old_pw.value), pw_challenge);
					text_old_pw.value = null;
					
					text_new_pw = document.getElementById('text_new_password');
					crypt_new_pw = document.getElementById('crypt_new_password');
					crypt_new_pw.value = hex_md5(text_new_pw.value);
					text_new_pw.value = null;
					
					text_confirm_pw = document.getElementById('text_confirm_password');
					crypt_confirm_pw = document.getElementById('crypt_confirm_password');
					crypt_confirm_pw.value = hex_md5(text_confirm_pw.value);
					text_confirm_pw.value = null;
					
				}
			</script>
			<noscript>
				<div id="no_js_warning">
					<div id="warning_message">
						THIS CONNECTION IS NOT SECURE.
					</div>
					<div id="warning_details">
						You do not have Javascript enabled.  Javascript is necessary to encrypt your password for submission.  You may continue at your own risk.
					</div>
					<input type="hidden" name="no_js" id="no_js" value="1"/>
				</div>
			</noscript>
			<div id="login_form_body">
				<input type="hidden" name="crypt_old_password" id="crypt_old_password" />
				<input type="hidden" name="crypt_new_password" id="crypt_new_password" />
				<input type="hidden" name="crypt_confirm_password" id="crypt_confirm_password" />
				<div id="login" class="field">
					<span id="login_prompt" class="prompt">Login</span>
					<input type="text" name="username" id="username" class="field_data"/>
				</div>
				<div id="old_password" class="field">
					<span id="old_password_prompt" class="prompt">Password</span>
					<input type="password" name="old_password" id="text_old_password" class="field_data"/>
				</div>
				<div id="new_password" class="field">
					<span id="new_password_prompt" class="prompt">New Password</span>
					<input type="password" name="new_password" id="text_new_password" class="field_data"/>
				</div>
				<div id="confirm_password" class="field">
					<span id="confirm_password_prompt" class="prompt">Confirm Password</span>
					<input type="password" name="confirm_password" id="text_confirm_password" class="field_data"/>
				</div>
				<input type="submit" name="action" value="Change Password" id="change_button" />
			</div>
		</form>

<?php
	}
		echo "<b>$message</b>";
		echo $bottom;
?>