<?php
////// Connection initialisation /////
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fearless_playerreport";
//////////////////////////////////////
/// Setup mysql connection to the DB. ($dbName)
$conn = new mysqli($servername, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection has failed: " . $conn->connect_error);
}

function retrieveReportsSQL()
{

}