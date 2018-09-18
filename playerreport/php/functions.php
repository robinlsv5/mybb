<?php

///Function to get all reports
function getReports($conn)
{
    $reportSql = "SELECT * FROM fearless_playerreports.reports";
    $reportResult = $conn->query($reportSql);

    if($reportResult->num_rows > 0)
    {
        while($row = $reportResult->fetch_assoc())
        {
            $report = new Report($row["ID"], $row["report_title"],
                $row["report_player_name"], $row["report_player_steamid"],
                $row["report_timestamp"], $row["report_gameserver"], $row["report_description"]);


            $htmlPrint =
                    '
                         <div class="report_view">
                               <p>'. $row["ID"] .'</p>
                               <p>'. $row["report_timestamp"] .'</p>
                               <p>'. $row["report_player_name"] .'</p>
                               <p>'. $row["report_title"] .'</p>
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
}