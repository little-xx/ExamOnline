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
	$password = _post('password');
	
	mysqli_select_db($con, "databaseclass");
	$sql = "select `password` from `user` where `name` = '$username'";

	$jsOk = <<<JSOK
	<script>
	alert("登陆成功");
	location = "http://www.baidu.com";
	</script>
JSOK;
	$jsFail = <<<JSFail
	<script>
	alert("密码与账号不匹配！");
	location = "index.html";
	</script>
JSFail;
	$noUser = <<<NOUSER
	<script>
	alert("账户名不存在！请重试！");
	location = "index.html";
	</script>
NOUSER;

	$result = mysqli_query($con, $sql);
	if ( $result ) {
		$row = mysqli_fetch_array($result);
		if ( $row['password'] == $password ) {
			echo $jsOk;
		} else {
			echo $jsFail;
		}
	} else {
		echo $noUser;
	}
	mysqli_close($con);
?>