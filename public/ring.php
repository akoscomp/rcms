<?php
    include('header.php');
?>

<script>
	$(document).ready(function() {
		bellStop();
    });
</script>

<div class="container">
    <div class="jumbotron text-center">
        <h1>Bell</h1>
            <a id="ringStartStop" class="btn btn-lg btn-default btn-success" onclick="bellStartStop(this)">Start</a>
    </div>
</div>
	
<?php
    include('footer.php');
?>
