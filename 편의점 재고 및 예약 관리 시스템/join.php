<!DOCTYPE html>
<html>
<title>  </title>
<body>
<center>
<?php 
	$client_id = $_POST['client_id'];
	$client_pw = $_POST['client_pw'];
	$pwc = $_POST['pwc'];
	$client_bd = $_POST['client_bd'];
	
	if($client_pw != $pwc)
	{
		echo ("<script> alert ('비밀번호 확인이 맞지않습니다. 다시 입력해주세요.')
		history.go(-1)
		</script>"
		);		
		exit;
	}
	
	$conn = mysqli_connect("localhost","root","09160122", "testip");
	if(!$conn)
		echo "connection failed! <br>";
	$sql = "insert into client (client_id, client_pw,client_bd) ";
	$sql = $sql . " values ('$client_id', '$client_pw', '$client_bd');";

	$result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, "select * from client");
	
	mysqli_free_result($result);
	mysqli_close($conn);
	
?><script>
                                        alert("회원가입이 완료되었습니다.");
										alert("로그인해서 서비스를 이용하세요.");
                                        location.replace("./login.html");
                          </script>
	
</center>
</body>
</html>