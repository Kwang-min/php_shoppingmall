<?php
session_start();
$session_id = session_id();

include "lib.php";

$conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

$query = "update shop_list set location=location+{$_GET['step']} where no={$_GET['no']}";
mysqli_query($conn,$query);
?>
<script>
  location.href = 'order_list.php';
</script>