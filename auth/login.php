<?php
	session_start();
	$config = parse_ini_file("./auth.ini",true);

	if($_REQUEST['action']=="Login")
	{
		require_once "auth_database.php";
		require_once "crypt_hmac.php";
		
		$user_record = get_user($_REQUEST['username']);
		$authenticated = false;

		if($config['options']['use_oath'] != 'true')
		{
			if($_REQUEST['no_js']==1)
			{
				$password = md5(mysql_real_escape_string($_REQUEST['password']));
				$encrypted_pw = $user_record['password'];
			}		
			else
			{
				$password = mysql_real_escape_string($_REQUEST['crypt_password']);
				$obj_crypt = new Crypt_HMAC($user_record['password']);
				$encrypted_pw = $obj_crypt->hash($_SESSION['challenge']);
			}
			$authenticated = $encrypted_pw==$password;
		}
		else
		{
			require "./oath.php";
			$oath = new oath;
			$authenticated = $oath->check_key(base64_decode($user_record['oath_key']),$_REQUEST['oath_response']);
		}
		
		if($authenticated)
		{
			login($user_record['username'],session_id());
			$_SESSION['user'] = $user_record;			
			if($config['log']['login'] == 'true')
			{
				log_event('login');
			}
			$_SESSION['logged_in'] = true;							

			if(!empty($_REQUEST['url']))
			{
				header("Location: {$_REQUEST['url']}");
			}
			else
			{
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
			exit;
		}
		else
		{
			if($config['log']['failed'] == 'true')
			{
				log_event('failure');
			}
			$error = "Login failed";
		}
	}
		require_once "rKeyGen.php";
		$_SESSION['challenge'] = rKeyGen(16);
		$bottom = "";
		if(strrchr($_SERVER['PATH_INFO'],'/')=='/login.php')
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
?>
		<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" onsubmit="submitForm()" id="login_form">
			<h1>Login</h1>
			<script type="text/javascript" src="md5.js"></script>
			<script type="text/javascript">
				function submitForm()
				{
					pw_challenge = '<?php echo $_SESSION['challenge'];?>';
					text_pw = document.getElementById('text_password');
					crypt_pw = document.getElementById('crypt_password');
					crypt_pw.value = hex_hmac_md5(hex_md5(text_pw.value), pw_challenge);
					text_pw.value = null;
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
				<?php echo "<p>{$error}</p>";?>
				<input type="hidden" name="url" id="url" value="<?php echo $_REQUEST['url'];?>"/>
				<input type="hidden" name="crypt_password" id="crypt_password" />
				<div id="login" class="field">
					<span id="login_prompt" class="prompt">Login</span>
					<input type="text" name="username" id="username" class="field_data"/>
				</div>
				<?php
					switch($config['options']['use_oath'])
					{
						case 'true':
				?>
				<div id="oath_response" class="field">
					<span id="response_prompt" class="prompt">Token</span>
					<input type="text" name="oath_response" id="text_oath_response" class="field_data"/>
				</div>
				<?php
						break;
						default:
				?>
				<div id="password" class="field">
					<span id="password_prompt" class="prompt">Password</span>
					<input type="password" name="password" id="text_password" class="field_data"/>
				</div>
				<?php
						break;
					}
				?>
				<input type="submit" name="action" value="Login" id="login_button" />
			</div>
		</form>

<?php
	echo $bottom;
?>