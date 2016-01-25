<?php
error_reporting(0);

$link = mysqli_connect("localhost","root","","questionnaire");
mysqli_select_db($link,"expertus");
mysqli_query ($link,"set_client='utf8'");
mysqli_query ($link,"set character_set_results='utf8'");
mysqli_query ($link,"set collation_connection='utf8_lithuanian_ci'");
mysqli_query ($link,"SET NAMES utf8");

?>