<?php
function xmlToJson($xmlFile) {
    $xml = simplexml_load_file($xmlFile);
    $json = json_encode($xml);
    return $json;
}

header('Content-Type: application/json');
echo xmlToJson('example.xml'); // Replace with the path to your XML file
?>
