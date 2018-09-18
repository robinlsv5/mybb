<?php

///////////////////////////////////////
/// WIP
/// Dynamic page of the report with all possible options (admins and players)

require("./playerreport/php/classes.php");
require("./playerreport/php/sql_data.php");
require("./playerreport/php/functions.php");

$reports_array = getReports($conn);
$report_current = null;

foreach($reports_array as $item) {
    if($item->getId() == $_GET("id"))
    {
        $report_current = $item;
    }
}
?>

<div class="modal-text">
    <?php echo $report_current->getTitle() ?>
</div>
