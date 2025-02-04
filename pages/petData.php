<?php

$petDataRaw = file_get_contents('../data/petData.json');
if ($petDataRaw === false) {
    die('Error reading the JSON file');
}
$petData = json_decode($petDataRaw);