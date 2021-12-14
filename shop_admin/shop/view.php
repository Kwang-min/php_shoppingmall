<?php
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');
  $query = "select * from shop_data where no={$_GET['no']}";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($result);
?>
<form action="basket_post.php" method="post">
  <input type="hidden" name="no" value="<?=$_GET['no']?>">
<table width=100% border=1>
  <tr>
    <td>
        <img src="data/<?=$data['img']?>" width=150 >
    </td>
    <td>
      <b><?=$data['name']?></b><br/>
      <?=$data['comment']?><br/>
      ￦<?=number_format($data['price'])?><br>
      수량:
      <select name="count" >
        <option value="1">1개</option>
        <option value="2">2개</option>
        <option value="3">3개</option>
        <option value="4">4개</option>
        <option value="5">5개</option>
        <option value="6">6개</option>
        <option value="7">7개</option>
        <option value="8">8개</option>
        <option value="9">9개</option>
        <option value="10">10개</option>
      </select><br>
      <input type="submit" value="장바구니담기">
    </td>
  </tr>
  <tr>
    <td colspan=2>
    <?=nl2br($data['memo'])?>
    </td>
  </tr>
</table>
<a href="list.php">[목록으로]</a>
</form>