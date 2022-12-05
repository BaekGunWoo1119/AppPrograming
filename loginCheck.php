<?php
    session_start();
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    $host = 'localhost';
	$user = 'qorrjsdn668';
	$pw = '0124';
	$dbName = 'main_db';
    $mysqli = new mysqli($host, $user, $pw, $dbName);

    $id = $_POST['Email']; // 아이디
    $pwd = $_POST['Password']; // 패스워드

    $query = "select * from User where Email='$id' and Password='$pwd'";

    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);

    $userid = $row['Email'];
    $username = $row['UserNick'];
    $usertype = $row['UserType'];
    $userfav = $row['Favorite'];
    $userpw = $row['Password'];
   if($id == null){ // id 또는 pw가 비어있으면 admin_login 폼으로

        echo "<script> alert('ID를 입력하세요!'); </script>";
        echo "<script> history.back(); </script>";

    }else if($pwd == null){

        echo "<script> alert('비밀번호를 입력하세요!'); </script>";
        echo "<script> history.back(); </script>";
    }else if($id==$userid && $pwd==$userpw){ // id와 pw가 맞다면 login
        $_SESSION['id'] = $userid;
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['userfav'] = $userfav;
        $_SESSION['userpw'] = password_hash($userpw);

        echo "<script> alert('로그인 성공'); </script>";
        echo "<script> location.href = 'success.html'; </script>";

    }else{ // id 또는 pw가 다르다면 admin_login 폼으로

        echo "<script> alert('로그인 실패'); </script>";
        echo "<script> history.back(); </script>";

    }
?>