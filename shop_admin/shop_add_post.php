<?php

  // error_reporting(E_ALL);
  // ini_set('display_errors',1);
  // 위 두줄은 라이브 서버가 아닐 때 로그 찍어보는 코드 
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

  if ($_FILES['img']['tmp_name']) {

    var_dump(move_uploaded_file($_FILES['img']['tmp_name'],__DIR__."/shop/data/{$_FILES['img']['name']}"));
    var_dump($_FILES['img']['error']);
  }
  
  $query = "insert into shop_data(name, comment, price, memo, img)
            values(
              '{$_POST['name']}', '{$_POST['comment']}', 
              '{$_POST['price']}', '{$_POST['memo']}', 
              '{$_FILES['img']['name']}'
            )";

  mysqli_query($conn,$query);
  
  
?>
<script>
  location.href='shop_add.php'
</script>