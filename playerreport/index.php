
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
            $report_array = getAllReports($conn);


            echo '<div class="card-deck">';
            foreach($report_array as $value)
            {
               echo $value->getReadablePanel();
            }
            echo '</div>';
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



        <!-- WIP: Modal for the showing of the report -->
        <div class="modal fade" id="bootstrap-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Bootstrap Dynamic Modal
                            Content</h4>
                    </div>
                    <div id="report-modal"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
	</body>
	
	
	
</html>