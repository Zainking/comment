<?php
	header("Content-Type: text/html;charset=utf-8"); 
	header('Access-Control-Allow-Origin:http://comment.zain.red');
	$mysqli = new mysqli('wzy88665.gotoftp5.com','wzy88665','61457155','wzy88665');
	if($mysqli->errno > 0){
		echo "Error!";
		echo $mysqli->errno;
		exit;
	}
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$id = $_POST["id"];
		$query = "DELETE FROM commentarea_comment WHERE id = '{$id}' ";
		$result = $mysqli->query($query);

		echo json_encode($result);
	}