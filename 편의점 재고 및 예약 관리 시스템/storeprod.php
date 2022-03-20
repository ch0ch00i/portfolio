<?php session_start();  ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
</head>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<style media="screen">
body
{
  margin: 0 auto;
  background-image: url('back.jpg');
  background-size: 100%;

  background-attachment: scroll;
  <!-- background-repeat: no-repeat;-->

}

.white
{
  width: 100%;
  height: auto;
  background-color: white;
  margin-top: 40px;
  margin-bottom: 40px;
}
.in{

  display: block;
  margin: 0 auto;
  width: 989px;
}

.login{
  float: right;
  font-size: 1.0em;
  color:grey;
  margin-top: 20px;
  margin-left: 10px;
}
.center{
  margin: 0 auto;
  display: block;
}
@in.panel{
  display: table;
  max-width: 100%;
  margin: 0 auto;
  width:50px;
}
.text{
  text-align: center;
}
a { text-decoration: none; }
a:visited{text-decoration: none; color: grey;}
nav ul {
margin-left: 40px;
margin-top: -50px;
}

nav ul li {
  display: inline-block;
  position: relative;
}

nav ul li a {
  color: grey; /*글자색*/
  display: block;
  font-size: 20px;
  padding: 15px 14px;
  transition: 0.3s linear;
  width: 180px;
}

nav ul li:hover { background:#EAEAEA; }

nav ul li ul {
  font-size: 0;
  margin: 0;
  padding: 0;
  border-bottom: 15px solid #FFD9FA;
  display: none;
  position: absolute;
  width: 210px;  z-index: 10000;
}


nav ul li ul li:first-child { border-top: none; }

nav ul li ul li a {
  background: white;
  display: block;

}

nav ul li ul li a:hover { /*background: blue;*/
animation-duration: 1s; animation-name: rainbowLink; animation-iteration-count: infinite;
 }
 @keyframes rainbowLink {
  0% { color:pink;}
  25% { color: #00D8FF;/*쨍한하늘*/ }
  50% { color:#FAED7D; /*연한노랑*/}
  70% { color:#B7F0B1; }
  100% { color: pink; }
 }
.font{
  color: grey; /*글자색*/
  display: block;
  margin: 0 auto;
  font-size: 15px;
  text-align: center;

}
.font2{
  color: #BDBDBD; /*글자색*/
  display: block;
  margin: 0 auto;
  font-size: 15px;
  text-align: center;
  margin-top: 10px;
}
.font3{
  color: grey; /*글자색*/
  display: block;
  margin: 0 auto;
  font-size: 15px;
  margin-top: 140px;
  margin-left: 14px
}
.font3{
  color: black; /*글자색*/
  display: block;
  margin: 0 auto;
  font-size: 30px;
  text-align: center;

}
.id{
  color: #BDBDBD; /*글자색*/
  display: block;
  margin: 0 auto;
  font-size: 15px;
  text-align: left;
  margin-top: 30px;
}
.idline{
  width: 460px;
border: 10px solid white;
border-bottom: 1px solid grey;
}

.reserbutton{
  width: 100px;
  height: 30px;
  margin-left: 40px;
  margin-top: 20px;
  background-color:#E4F7BA;
  color: grey;
  font-size: 12px;
  text-align: center;
  line-height: 30px;
  border-radius: 5px;
}
.reserbutton:hover{
  background-color:#FFD8D8;
  animation-duration: 1s; animation-name: rainbowLink; animation-iteration-count: infinite;
}

td, th{
        padding: 10px;
        border-bottom: 1px solid #dadada;
border-right : 1px solid #dadada;
}
h2{
  float: right;
  font-size: 1.0em;
  color:grey;
  margin-top: 20px;
  margin-left: 10px;
}
.logout{
  background-color:#E4F7BA;
  color: grey;
  text-align: center;
}
.cen{
display: grid;
margin: 0 auto;
margin-right: 50px;
}
</style>


<body>
  <div class="white">
  <div class="in">
<h2><a href="logout.php"><input type="button" class="logout" value="로그아웃" /></a></h2>
<?php
    echo "<h2>{$_SESSION['client_id']} 님 환영합니다.</h2>";
?>

    <br/><br />
    <img class="cen" src="logo (2).png" width="600px"/>

    <img class="panel" src="panel.png" />
    <nav>
        <ul class="text">

          <li> <a href="storeprod.php">상품보기<i class=''></i></a></li>
          <li> <a href="reser.html">예약하기<i class=''></i></a></li>
          <li> <a href="reser_check.php">예약확인<i class=''></i></a></li>
		  <li> <a href="admin_check.php">상품관리<i class=''></i></a></li>
        </ul>
        </nav>
<br/>



<h1  align="center"><mark> 현재 사이트에 있는 상품목록입니다.</mark> </h1>
<br/><br/>
<!-- 여기서부터 db테이블-->
<table width=900 border=1 align=center class="ttd">

  <thead>
    <tr align=center class="ttd">
      <td>상품코드</td>
      <td>상 품 명</td>
      <td>  물 량  </td>
      <?php
      if( ($_SESSION['client_id'])=='admin'){?>
        <td>예약수량</td>
<?php
      }
      ?>

    </tr>
    </thead>
    <tbody>
  <?php
  $jb_connect = mysqli_connect("localhost", "root", "09160122", "testip") or die("fail");
  $jb_result = mysqli_query($jb_connect,"SELECT pro_code, pro_name, pro_count, pro_reser FROM prod");
  $n = 1;
  while( $row = mysqli_fetch_array( $jb_result ) ){
  echo "<tr >";
  echo "<td>" . $row['pro_code'] . "</td>";
  echo "<td>" . $row['pro_name'] . "</td>";
  echo "<td>" . $row['pro_count'] . "</td>";
  if( ($_SESSION['client_id'])=='admin'){
    echo "<td>" . $row['pro_reser'] . "</td>";
  }
  echo "</tr>";
  $n++;
            }
            ?>
  </tbody>

</table>



<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>

$('nav li').hover(
  function() {
	  $('ul', this).stop().slideDown(200);
  },
	function() {
    $('ul', this).stop().slideUp(200);
  }
);

</script>
</body>

</html>
