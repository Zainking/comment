<?php
	header("Content-Type: text/html;charset=utf-8"); 
	header('Access-Control-Allow-Origin:http://comment.zain.red/');
	$mysqli = new mysqli('wzy88665.gotoftp5.com','wzy88665','61457155','wzy88665');
	if($mysqli->errno > 0){
		echo "Error!";
		echo $mysqli->errno;
		exit;
	}
	if($_SERVER['REQUEST_METHOD']=="GET"){
		$query = 'SELECT id, username, comment, time FROM commentarea_comment ORDER by id DESC LIMIT 10';
		$result = $mysqli->query($query);
		$results = array();
		while($results[] = $result->fetch_row()){}
		array_pop($results);
		$str = json_encode($results);
		echo $str;
	}else if($_SERVER['REQUEST_METHOD']=="POST"){
		$username = $_POST['username'];
		$common = $_POST['common'];
		$time = time();
		$query = "INSERT INTO `commentarea_comment` (`username`, `comment`, `time`) VALUES ('{$username}','{$common}', '{$time}')";
		$final = $mysqli->query($query);
		$res = array('id'=>mysqli_insert_id($mysqli),'time'=>$time);

		echo json_encode($res);
	}else if($_SERVER['REQUEST_METHOD']=="DELETE"){
		$id = explode('?',$_SERVER['REQUEST_URI'])[1];
		$query = "DELETE FROM commentarea_comment WHERE id = '{$id}' ";
		$result = $mysqli->query($query);
		echo $id.json_encode($result);
	}