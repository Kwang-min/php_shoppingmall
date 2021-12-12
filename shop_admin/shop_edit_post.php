<?php
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

  if ($_FILES['img']['tmp_name']) {
    unlink(__DIR__."/shop/data/".$_POST['old_name']);
    move_uploaded_file($_FILES['img']['tmp_name'],__DIR__."/shop/data/{$_FILES['img']['name']}");
    $tmp = " img = '{$_FILES['img']['name']}', ";
  }
  
  $query = "update shop_data set
            name = '{$_POST['name']}',
            comment = '{$_POST['comment']}',
            {$tmp}
            price = '{$_POST['price']}',
            memo = '{$_POST['memo']}'
            where no='{$_POST['no']}' ";

  mysqli_query($conn,$query);

?>
<script>
  location.href='shop_add.php'
</script>