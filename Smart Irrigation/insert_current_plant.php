<?php

$file_to_write = "current_plant.txt";
$file_open = fopen($file_to_write, "w");
$username = $_GET['username'];
$flower = $_GET['flower'];
fwrite($file_open, $username . ";" . $flower);
fclose($file_open);

?>