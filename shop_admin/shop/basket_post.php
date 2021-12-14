<?php

  session_start();
  $session_id = session_id();

  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');
  $query = "select * from shop_data where no={$_POST['no']}";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($result);

  $money = $data['price'] * $_POST['count'];

  $regdate = time();
  
  $query = "insert into shop_temp(session_id, parent, name, price, count, money, regdate)
  values('{$session_id}','{$data['no']}','{$data['name']}',
  '{$data['price']}','{$_POST['count']}','{$money}','{$regdate}')
  ";
  mysqli_query($conn,$query);
?>

<script>
  location.href = 'basket.php';
</script>