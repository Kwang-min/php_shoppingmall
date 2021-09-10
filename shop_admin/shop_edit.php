<?php
  include "lib.php";
  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');
  $query = "select * from shop_data where no={$_GET['no']}";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);
?>
상품수정페이지입니다
<form action="shop_edit_post.php" method="post" enctype=multipart/form-data>
<input type="hidden" name="no" value="<?=$_GET['no']?>">
<input type="hidden" name="old_name" value="<?=$row['img']?>">
<table width=100% border=1>
  <tr>
    <td>
      상품명
    </td>
    <td>
      <input type="text" name='name' size=30 value=<?=$row['name']?>/>
    </td>
  </tr>
  <tr>
    <td>
      짧은설명
    </td>
    <td>
      <input type="text" name='comment' size=50 value=<?=$row['comment']?>/>
    </td>
  </tr>
  <tr>
    <td>
      금액
    </td>
    <td>
      <input type="text" name='price' size=10 value=<?=$row['price']?>>
    </td>
  </tr>
  <tr>
    <td>
      설명
    </td>
    <td>
      <textarea name='memo' cols=50 rows=10 ><?=$row['memo']?></textarea>
    </td>
  </tr>
  <tr>
    <td>
      사진
    </td>
    <td>
      <img src="shop/data/<?=$row['img']?>" height=40>
      <input type='file' name='img' size=10 />
    </td>
  </tr>
  <tr>
    <td colspan=2>
      <input type="submit" value="등록하기" />
    </td>
  </tr>
</table>
</form>