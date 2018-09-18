<?php

/////////////////////////////////////////////////
/// Basic functionality
/////////////////////////////////////////////////


///Description: Function to get all reports
///Last Revision: 18-9-18
///Returns: Array of all reports.
function getAllReports($conn)
{
    $retArrayValue = array();

    $reportSql = "SELECT * FROM fearless_playerreports.reports";
    $reportResult = $conn->query($reportSql);

    if($reportResult->num_rows > 0)
    {
        $index = 0;
        while($row = $reportResult->fetch_assoc())
        {
            $report = new Report($row["ID"], $row["report_title"],
                $row["report_player_name"], $row["report_player_steamid"],
                $row["report_timestamp"], $row["report_gameserver"],
                $row["report_description"], $row["report_status"]);


            $retArrayValue[$index] = $report;
            $index++;
        }
    }
    else
    {
        echo 'The SELECT query returned no results';
    }


    return $retArrayValue;
    $conn->close();
}