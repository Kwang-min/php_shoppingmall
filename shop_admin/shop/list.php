<?php
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

?>
<a href="basket.php">장바구니</a>
<a href="reservation.php">배송조회</a>
<table border=1 width=100%>

<?php
  $query = "select * from shop_data";
  $result = mysqli_query($conn,$query);
  while($data = mysqli_fetch_array($result)) {
?>
  <tr>
    <td>
      <a href="view.php?no=<?=$data['no']?>">
        <img src="data/<?=$data['img']?>" width=150 >
      </a>
    </td>
    <td>
      <b><a href="view.php?no=<?=$data['no']?>"><?=$data['name']?></a></b><br/>
      <?=$data['comment']?><br/>
      ￦<?=number_format($data['price'])?>
    </td>
  </tr>
<?php
  }
?>
</table>