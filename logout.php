<?php
  	session_start();
	$userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $usertype = $_SESSION['usertype'];
    $userfav = $_SESSION['userfav'];
    $userpw = $_SESSION['userpw'];
    unset($userid);
    unset($username);
    unset($usertype);
    unset($userfav);
    unset($userpw);
    if(!$userid){
        echo "<script> alert('로그아웃 되었습니다.'); </script>";
        echo "<script> location.href = 'index.html'; </script>";
    }
?>