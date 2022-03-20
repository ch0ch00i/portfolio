<?php session_start(); ?>

<head>
	<meta charset="utf-8" />
	<title>메인페이지</title>
</head>

	<?php
	$connect = mysqli_connect("localhost", "root","09160122", "testip") or die("fail");

	if( ($_SESSION['client_id'])=='admin'){
	?>
	<script>
	alert("관리자 인증 성공");
	location.replace("./storeprod_ad.html");</script>
	<?php
	}
	else{
		echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
	} 
	?>
