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

$query = "select * from shop_list";

$result = mysqli_query($conn,$query);

?>
<table width=100% border=1>
  <tr>
    <td>주문번호</td>
    <td>주문자</td>
    <td>전체금액</td>
    <td>현재상태</td>
    <td>기타</td>
  </tr>
<?php
  while($data=mysqli_fetch_array($result)){
?>
  <tr>
    <td><a href="order_view.php?order_id=<?=$data['order_id']?>"><?=$data['order_id']?></a></td>
    <td><?=$data['name']?></td>
    <td><?=$data['total']?></td>
    <td><?=$l[$data['location']]?></td>
    <td><a href="step.php?step=-1&no=<?=$data['no']?>">←</a>
    <a href="step.php?step=1&no=<?=$data['no']?>">→</a></td>
  </tr>
<?php
  }
?>
</table>