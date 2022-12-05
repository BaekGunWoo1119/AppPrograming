<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

    include "db/db_conn.php"; 

	$email = $_POST['email'];
    $password = $_POST['password'];  
	$usertype = $_POST['usertype'];  
	$usernick = $_POST['usernick'];  
	$favorite = $_POST['favorite'];  

	$sql = "insert into User (
			Email,
			Password,
			UserType,
			UserNick,
			Favorite
	)";
	
	$sql = $sql. "values (
			'$email',
			'$password',
			'$usertype',
			'$usernick',
			'$favorite'
	)";

	if($mysqli->query($sql)){ 
	  echo '<script>alert("회원가입이 완료되었습니다.")</script>'; 
	}else{ 
	  echo '<script>alert("알 수 없는 이유로 회원가입에 실패했습니다.")</script>';
	}

	mysqli_close($mysqli);
  
?>

<script>
	location.href = "index_main.php";
</script>
</html>