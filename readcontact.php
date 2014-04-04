<?php
//    File name : readcontact.php
//    Author's name : Zhixiang Hu
//    Web site name : Zhixiang Hu Tech Space
//    This is business contact page of the web site

// this php page return contact object in JSON format, query parameter is in format : id=1

$output = "{\"contact\": [{ \"Name\":\"David\" , \"Organization\":\"Abc Corp.\" , \"Number\":\"633-888-9999\" , \"Address\":\"333 Sunset Road\" , \"Postal\":\"M4T9M9\" }]}";
//echo $output;

$db = new PDO("mysql:host=127.0.0.1;dbname=test", "player", "password");
$rs = $db->query("select * from contact where id=" . $_GET["id"]);

if ($row = $rs->fetch())
{   // if player id found
    
    $name= $row["Name"];
    $organization = $row["Organization"];
    $number = $row["Number"];
    $address = $row["Address"];
    $postal = $row["Postal"];

    
$output = "{\"contact\": [{ \"Name\":\"" . $name . "\" , \"Organization\":\" " . $organization 
                        . "\" , \"Number\":\" " . $number . "\" , \"Address\":\"" . $address 
                        . "\" , \"Postal\":\" " . $postal . "\" }]}";

}
echo $output;

?>
