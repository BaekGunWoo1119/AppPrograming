<?php
	$host = 'localhost';
	$user = 'qorrjsdn668';
	$pw = '0124';
	$dbName = 'main_db';
    $mysqli = new mysqli($host, $user, $pw, $dbName);
    $mysqli->set_charset("utf8");

    function mq($sql)
	{
		global $mysqli;
		return $mysqli->query($sql);
	}
?>