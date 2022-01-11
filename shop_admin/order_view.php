<?php
session_start();
$session_id = session_id();

include "lib.php";

$conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

$l[1] = "주문접수";
$l[2] = "입금확인";
$l[3] = "배송중";
$l[4] = "배송완료";
$l[5] = "주문접수";
$l[0] = "주문취소";

?>
<li>장바구니 내역</li>
<table width=100% border=1>
  <tr>
    <td>제품명</td>
    <td>금액</td>
    <td>수량</td>
    <td>합계</td>
  </tr>
<?php

  $query = "select * from shop_order where order_id='{$_GET['order_id']}'";
  $result = mysqli_query($conn,$query);
  while($data=mysqli_fetch_array($result)){
?>
  <tr>
    <td><?=$data['name']?></td>
    <td><?=$data['price']?></td>
    <td><?=$data['count']?></td>
    <td><?=$data['money']?></td>
  </tr>
<?php
  }
?>
</table>

<?php

$query = "select * from shop_list where order_id = '{$_GET['order_id']}'";

$result = mysqli_query($conn,$query);

$data = mysqli_fetch_array($result);

?>
<br>
<li>주문자정보</li>
<table border=1 width=100%>
  <tr>
    <td>
      주문번호
    </td>
    <td><?=$data['order_id']?></td>
  </tr>
  <tr>
    <td>
      주문시각
    </td>
    <td><?=date("Y/m/d H:i:s",$data['regdate'])?></td>
  </tr> 
  <tr>
    <td>
      이름
    </td>
    <td><?=$data['name']?></td>
  </tr> 
  <tr>
    <td>
      전화번호
    </td>
    <td><?=$data['phone']?></td>
  </tr>
  <tr>
    <td>
      휴대폰번호
    </td>
    <td><?=$data['hphone']?></td>
  </tr>
  <tr>
    <td>
      주소
    </td>
    <td><?=$data['zip']?><br><?=$data['address1']?><?=$data['address2']?></td>
  </tr>
  <tr>
    <td>
      총액
    </td>
    <td><?=$data['total']?></td>
  </tr> 
  <tr>
    <td>
      이메일
    </td>
    <td><?=$data['email']?></td>
  </tr> 
  <tr>
    <td>
      비밀번호
    </td>
    <td><?=$data['password']?></td>
  </tr> 
  <tr>
    <td>
      요구사항
    </td>
    <td><?=nl2br($data['memo'])?></td>
  </tr> 

</table>