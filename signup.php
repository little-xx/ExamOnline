<?php
	header("COntent-type:text/html;charset=utf-8");
	$server = "localhost";
	$user = "root";
	$pass = "";
	$con = mysqli_connect($server, $user, $pass);
	if ( !$con ) {
		echo "无法连接数据库: ".mysqli_error();
	}

	function _post($str) {
		$ret = !empty($_POST[$str]) ? $_POST[$str] : null;
		return $ret;
	}

	$username = _post('username');
	$stu_id = _post('stu_id');
	
?>