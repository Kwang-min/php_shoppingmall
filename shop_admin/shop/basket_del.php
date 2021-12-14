<?php
  session_start();
  $session_id = session_id();

  include "lib.php";

  $conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

  $query = "delete from shop_temp where no = '{$_GET['no']}' and session_id = '{$session_id}'";

  mysqli_query($conn,$query);
?>

<script>
  location.href = 'basket.php'
</script>