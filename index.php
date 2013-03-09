<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <!--<link rel="shortcut icon" href="favicon.ico">-->
        <script language="JavaScript" src="status.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
      <center>
        <div class="container" id="page">
        <h2><font color='darkblue'>Liceul Teoretic „Gheorghe Lazăr”</font></h2>
        <hr size="1" color="#8e9cbf" noshade>
        <table>
            <tr>
                <td>
                    <div class="title"><strong>Restart:</strong></div>
                    <div class="button">
                        <button name="restart_info1" type="button" onclick="run('restart_info1');">Info 1</button>
                        <button name="restart_info3" type="button" onclick="run('restart_info3');">Info 3</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="title"><strong>Shutdown:</strong></div>
                    <div class="button">
                        <button name="shutdown_info1" type="button" onclick="run('shutdown_info1');">Info 1</button>
                        <button name="shutdown_info3" type="button" onclick="run('shutdown_info3');">Info 3</button>
                    </div>
                </td>
            </tr>
        </table>
        <hr size="1" color="#8e9cbf" noshade>
        <div class="title">Progress/Ouput:</div>
        <div id="output" class="output" >&nbsp;&nbsp;Please select one of the above <strong> actions </strong> and click that button.</div>
        </div>
      </center>
    </body>
</html>
