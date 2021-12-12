<?php
  include "lib.php";
  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

  $query = "select * from shop_data";

  $result = mysqli_query($conn,$query);
?>

<table border=1 width=100%>
  <tr>
    <td>상품명</td>
    <td>이미지</td>
    <td>금액</td>
    <td>기타</td>
  </tr>
<?php
  while($row = mysqli_fetch_array($result)) {
?>
  <tr>
    <td><?=$row['name']?></td>
    <td><img src="shop/data/<?=$row['img']?>" height=40></td>
    <td><?=$row['price']?></td>
    <td><a href="shop_edit.php?no=<?=$row['no']?>">수정</a></td>
  </tr>
<?php
  }
?>
</table>