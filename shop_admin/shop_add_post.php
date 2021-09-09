<?php
  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');
  

  if ($_FILES['img']['tmp_name']) {
    move_uploaded_file($_FILES['img']['tmp_name'],__DIR__."/shop/{$_FILES['img']['name']}");

  }
  
  // $query = "insert into shop_data(name, comment, price, memo, img)
  //           values(
  //             '{$_POST['name']}', '{$_POST['comment']}', 
  //             '{$_POST['price']}', '{$_POST['memo']}', 
  //             '{$_FILES['img']['name']}'
  //           )";
  
  // $query = "INSERT INTO shop_data(name, comment, price, memo, img)
  // VALUES
  // (
  //   'sdaf', 'dsfa', 
  //   'dsfa', 'fdas', 
  //   'sdf'
  // )";
  // $result = mysqli_query($conn, $query);
  // var_dump($result);
  
?>
<!-- <script>
  location.href='shop_add.php'
</script> -->