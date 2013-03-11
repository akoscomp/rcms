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
        <script>
            function refreshList() {
                alert('Frissul a lista');
            }

            function getIP() {
                var gepAdatok;
                gepAdatok = {ipAddress: '10.0.0.1', hostName: 'cs54-na' };
                alert(gepAdatok.hostName);
            }
            
        </script>
        
        <ul>
            <li class="selected">I1</li>
            <li>I2</li>
            <li>I3</li>
        </ul>

        <table id="complist" cellspacing="1">
            <thead>
                <tr>
                    <th>IP address</th><th>Computer name</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr onclick="getIP()" id="cs54-na">
                    <td class="ip">10.0.0.1</td>
                    <td class="host">cs54-na</td>
                    <td>stop</td>
                </tr>
                <tr onclick="getIP()" id="cs54-na2">
                    <td class="ip">10.0.0.2</td>
                    <td class="host">cs54-na2</td>
                    <td>stop</td>
                </tr>
            </tbody>
            <tfoot>
            <th colspan="3">Finish</th>
            </tfoot>
        </table>

        <div style="float:right">
            <img id="spin" style="vertical-align: middle; visibility: hidden;" src="spin.gif"></img>
            <input id="refreshb" type="button" onclick="refreshList()" value="Refresh"></input>
        </div>

    </body>
</html>
