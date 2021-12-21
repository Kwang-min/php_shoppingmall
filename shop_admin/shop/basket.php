<?php
  session_start();
  $session_id = session_id();

  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

?>

<a href="basket.php">[장바구니]</a>
<table border=1 width=100%>
  <tr>
    <td>상품명</td>
    <td>수량</td>
    <td>금액</td>
    <td>합계</td>
    <td>기타</td>
  </tr>
  <?php
    $query = "select * from shop_temp where session_id='{$session_id}' ";
    $result = mysqli_query($conn,$query);
    $total = 0;
    while($data = mysqli_fetch_array($result)){  
  ?>
  <tr>
    <td><?=$data['name']?></td>
    <td><?=$data['count']?></td>
    <td>￦<?=number_format($data['price'])?></td>
    <td>￦<?=number_format($data['money'])?></td>
    <td>
      <a href="basket_del.php?no=<?=$data['no']?>" onclick="return confirm('정말 삭제할거에요?')" >
      [삭제]
      </a>
    </td>
  </tr>
  <?php
    $total += $data['money'];
    }
  ?>
  <tr>
    <td>합계</td>
    <td>&nbsp</td>
    <td>&nbsp</td>
    <td>￦<?=number_format($total)?></td>
  </tr>
</table>

<a href="list.php">[상품 목록으로]</a>
<a href="order.php">[주문하기]</a>