simple PHP authentication v1.1
by Brent Maxwell <brent@thebrent.net>
Description:
	This is a simple PHP system for securely authenticating users against a MySQL database.

Features:
	- Passwords stored as md5 hashes
	- ability to use OATH compliant HOTP tokens
	- Client sends hashed passwords
		- When login script is accessed, it generates a challenge that is stored in a session 
		  variable and sent to the client.  When the client submits the form, the script uses this 
		  challenge value to compute a one way hash of the password's md5 hash, and blanks the 
		  password field to prevent it from being sent.  The challenge is not sent back to the
		  server.
		- The server script computes the the same hash from the md5 hash in the database and the 
		  challenge value stored in the session variable.
	- Stylesheet
		- Login form utilizes CSS id and class tags to be fully customizable
	- Ability to be included in other pages
		- The login form can be utilized stand-alone, or included in another page with zero
		  modification.

Use:
	Copy the files into a directory on the web server.  Edit the 'auth_config.php' file to set the
	proper values for the database and the script's location.

	Import the 'auth_db.sql' file into the database.

	Add your users with your favorite database management utility.  Make sure that the passwords in the
	database are stored as md5 hashes! (a web-based javascript md5 hashing utility is included).

	On any page that you wish to secure, include the 'secure.php' file with the require statement:

		require "auth_dir/secure.php";
	
	where auth_dir is the directory that the script was installed.

	If OATH HOTP keys are desired, place the base64 encoded key in the oath_key field of the auth_users table.
	
	That's it!

Todo:
	- Individual page permissions
	- User access levels
