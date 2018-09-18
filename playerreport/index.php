
<?php
require("./playerreport/php/classes.php");
require("./playerreport/php/sql_data.php");
require("./playerreport/php/functions.php");

////// Connection initialisation /////

//////////////////////////////////////
/// Determine rank (player/admin)
$_SESSION['IS_ADMIN'] = false;

if($mybb->usergroup['cancp']) {
    $_SESSION['IS_ADMIN'] = true;
}
?>


<html>
	<head>
        <?php
		if($_SESSION['IS_ADMIN'])
		{
		?>
			<h1>Welcome to the testing version of the Player report tool.</h1>
			<h3>Below you will find the administrator options to manage the player reports.</h3>
			
		<?php
		}
		else
		{
		?>
			<h1>Welcome to the testing version of the Player report tool.</h1>
			<h3>Below you will find the options to create a player report and also to manage your reports.</h3>
		<?php
		}
		?>
	</head>
	
	<body>
		<?php
		if($_SESSION['IS_ADMIN'])
		{
		?>
		<div id="admin_center">
            <?php
            getReports($conn);
            ?>
		</div>
		<?php
		}
		else
		{
		?>
			<div id="player_center">
				<!-- TODO: Player navigation for creating reports. -->
			</div>
		<?php
		}
		?>

        <input class="modal-state" id="modal-1" type="checkbox" />
        <div class="modal">
            <label class="modal__bg" for="modal-1"></label>
            <div class="modal__inner">
                <label class="modal__close" for="modal-1"></label>
                <h2 id="report_title"></h2>
                <p id="report_timestamp"></p>
                <p id="report_description"></p>
            </div>
        </div>
	</body>
	
	
	
</html>