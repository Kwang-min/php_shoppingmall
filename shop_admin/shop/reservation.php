<?php
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

  $l[1] = "주문접수";
  $l[2] = "입금확인";
  $l[3] = "배송중";
  $l[4] = "배송완료";
  $l[5] = "주문접수";
  $l[0] = "주문취소";

?>
<a href="list.php">제품목록</a>
<a href="basket.php">장바구니</a>

<form action="<?=$_SERVER['PHP_SELF']?>">
<li>이름:<input type="text" name="name"></li>
<li>비밀번호:<input type="password" name="password"></li>
<input type="submit" value="배송조회">
</form>

<?php
  if($_GET['name']){
?>

<table width=100% border=1>
    <tr>
      <td>주문자</td>
      <td>배송번호</td>
      <td>주문일</td>
      <td>금액</td>
      <td>현재위치</td>
      
    </tr>


<?php
  $query="select * from shop_list where name='{$_GET['name']}' and password='{$_GET['password']}'";
  $result = mysqli_query($conn,$query);
  while($data = mysqli_fetch_array($result)) {
?>
  <tr>
    <td><?=$data['name']?></td>
    <td><?=$data['order_id']?></td>
    <td><?=date("Y/m/d H:i:s",$data['regdate'])?></td>
    <td><?=$data['total']?></td>
    <td><?=$l[$data['location']]?></td>
  </tr>
<?php
  }
?>
</table>
<?php
  }
?>