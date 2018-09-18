
<?php
////// Connection initialisation /////
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fearless_playerreport";
//////////////////////////////////////
/// Determine rank (player/admin)
$_SESSION['IS_ADMIN'] = false;

if($mybb->usergroup['cancp'])
{
	$_SESSION['IS_ADMIN'] = true;
}
//////////////////////////////////////
/// Setup mysql connection to the DB. ($dbName)
$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection has failed: " . $conn->connect_error);
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

            $reportSql = "SELECT * FROM fearless_playerreports.reports";
            $reportResult = $conn->query($reportSql);

            if($reportResult->num_rows > 0)
            {
                while($row = $reportResult->fetch_assoc())
                {
                    $htmlPrint =
                        '
                            <div class="box">
                                <p>'. $row["ID"] .'</p>
                                <p>'. $row["report_timestamp"] .'</p>
                                <p>'. $row["report_player_name"] .'</p>
                                <p>'. $row["report_title"] .'</p>
                                <p>'. $row["report_gameserver"] .'</p>
                                <a href="#"><span></span></a>
                            </div>
                        
                        ';

                    echo $htmlPrint;
                }
            }
            else
            {
                echo 'The SELECT query returned no results';
            }

            $conn->close();
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
	</body>
	
	
	
</html>