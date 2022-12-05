<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

	$host = 'localhost';
	$user = 'qorrjsdn668';
	$pw = '0124';
	$dbName = 'main_db';
    $mysqli = new mysqli($host, $user, $pw, $dbName);
    
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

	$data_email = $_POST['inputEmail'];
	$data_email = addslashes($data_email);
    $data_password = $_POST['inputPassword'];
    $data_password = addslashes($data_password);
    $data_usertype = $_POST['gridRadios'];
	$data_usertype = addslashes($data_usertype);
    $data_usernick = $_POST['inputUserNick'];
	$data_usernick = addslashes($data_usernick);
    $data_favorite = $_POST['gridChecks'];
    $data_favorite = addslashes($data_favorite);

	$sql = "insert into User (
			Email,
			Password,
			UserType,
			UserNick,
            Favorite
	)";
	
	$sql = $sql. "values (
			'$data_email',
			'$data_password',
			'$data_usertype',
			'$data_usernick',
            '$data_favorite'
	)";

	if($mysqli->query($sql)){ 
	  echo '<script>alert("회원가입이 완료되었습니다.")</script>'; 
	}else{ 
	  echo '<script>alert("fail to insert sql")</script>';
	}

	mysqli_close($mysqli);
  
?>

<script>
	location.href = "signin.html";
</script>
</html>