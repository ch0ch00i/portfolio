
<?php session_start();

        $connect = mysqli_connect("localhost", "root","09160122", "testip") or die("fail");

        //입력 받은 값 저장
		    $pro_code=$_GET['pro_code'];
        $pro_name=$_GET['pro_name'];
        $pro_reser=$_GET['pro_reser'];

        if($pro_code =="")
            {
             echo("
             <script> alert('상품코드를 입력하지 않았습니다. 다시 입력해주세요.')
             history.go(-1)
             </script>
            ");
    		exit;
    		}

    		if($pro_name =="")
            {
             echo("
             <script> alert('상품명을 입력하지 않았습니다. 다시 입력해주세요.')
             history.go(-1)
             </script>
            ");
    		exit;
    		}

    		if($pro_reser <= 0)
            {
             echo("
             <script> alert('올바른 예약수량을 입력해주세요. ')
             history.go(-1)
             </script>z
            ");
    		exit;
    		}

  

    $query = "select * from prod where pro_name='$pro_name'";
        $result = $connect->query($query);
        #$rn = mysql_real_escape_string(stripslashes($_SESSION]['client_id']));
        $list_string = serialize($_SESSION['client_id']);
        //검사 및 데이터 추가
        if(mysqli_num_rows($result)==1) {
	        mysqli_query($connect,"UPDATE prod SET pro_reser = pro_reser++$pro_reser WHERE pro_name='$pro_name' ");
          mysqli_query($connect,"INSERT INTO total SET t_id = '$list_string', t_code=$pro_code, t_name='$pro_name', t_reser=$pro_reser ");
		?><script>
                                        alert("예약되었습니다.");
                                        location.replace("./reser.html");
                          </script>
<?php
}
else{
?>
<script>
alert("존재하지 않는 물품입니다. 물품명을 확인해주세요.");
history.back();
</script>
<?php
}
?>
