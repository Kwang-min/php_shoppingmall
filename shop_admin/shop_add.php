<?php
  include "lib.php"
?>
상품추가페이지입니다
<form action="shop_add_post.php" method="post" enctype=multipart/form-data>
<table width=100% border=1>
  <tr>
    <td>
      상품명
    </td>
    <td>
      <input type="text" name='name' size=30 />
    </td>
  </tr>
  <tr>
    <td>
      짧은설명
    </td>
    <td>
      <input type="text" name='comment' size=50 />
    </td>
  </tr>
  <tr>
    <td>
      금액
    </td>
    <td>
      <input type="text" name='price' size=10 />
    </td>
  </tr>
  <tr>
    <td>
      설명
    </td>
    <td>
      <textarea name='memo' cols=50 rows=10 ></textarea>
    </td>
  </tr>
  <tr>
    <td>
      사진
    </td>
    <td>
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