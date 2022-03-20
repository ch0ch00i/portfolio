<!DOCTYPE html>
<html>
<title>  </title>
<body>
<center>
<?php 
	$pro_code = $_POST['pro_code'];
	$pro_name = $_POST['pro_name'];
	$pro_count = $_POST['pro_count'];	
	
	if($pro_count < 0)
	{
		echo ("<script> alert ('재고량은 0이상으로 입력이 가능합니다.')
		history.go(-1)
		</script>"
		);		
		exit;
	}
	if($pro_name =="")
      {
        echo("
        <script>
        alert('상품명을 입력하지 않았습니다. 다시 입력해주세요.')
        history.go(-1)
        </script>
        ");
        exit;
      }
	  if($pro_code =="")
      {
        echo("
        <script>
        alert('상품코드를 입력하지 않았습니다. 다시 입력해주세요.')
        history.go(-1)
        </script>
        ");
        exit;
      }
	    if($pro_count =="")
      {
        echo("
        <script>
        alert('재고량을 입력하지 않았습니다. 다시 입력해주세요.')
        history.go(-1)
        </script>
        ");
        exit;
      }

	$conn = mysqli_connect("localhost","root","09160122", "testip");
	if(!$conn)
		echo "connection failed! <br>";
	$sql = "insert into prod (pro_code, pro_name, pro_count) ";
	$sql = $sql . " values ('$pro_code', '$pro_name', '$pro_count');";

	$result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, "select * from prod");
	
	mysqli_free_result($result);
	mysqli_close($conn);
?><script>
                                        alert("등록되었습니다.");
                                        location.replace("./storeprod.php");
                          </script>
</center>
</body>
</html>