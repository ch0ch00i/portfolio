<?php

        session_start();

        $connect = mysqli_connect("localhost", "root", "09160122", "testip") or die("fail");
        $jb_result = mysqli_query($jb_connect,"SELECT * FROM seller where seller_id='admin' ");
        while( $row != mysqli_fetch_array( $jb_result ) ){

          
        }

        //입력 받은 id와 password
        $client_id=$_GET['client_id'];
        $client_pw=$_GET['client_pw'];

        //아이디가 있는지 검사
        $query = "select * from client where client_id = '$client_id'";
        $result = $connect->query($query);



        //아이디가 있다면 비밀번호 검사
        if(mysqli_num_rows($result)==1) {

                $row=mysqli_fetch_assoc($result);

                //비밀번호가 맞다면 세션 생성
                if($row['client_pw']==$client_pw){
                        $_SESSION['client_id']=$client_id;		//'id'는 db에서의 id
                        if(isset($_SESSION['client_id'])){s
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("./storeprod.php");
                                </script>
<?php
                        }
                        else{
                                echo "session fail";
                        }
                }

                else {
        ?>              <script>
                                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                                history.back();
                        </script>
        <?php
                }

        }

                else{
?>              <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        history.back();
                </script>
<?php
        }


?>
