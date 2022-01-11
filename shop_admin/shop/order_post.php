<?php

session_start();
$session_id = session_id();

include "../lib.php";

$conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

$order_id = date("Ymdhis");
$regdate = time();

$phone = "{$_POST['phone1']}-{$_POST['phone2']}-{$_POST['phone3']}";
$hphone = "{$_POST['hphone1']}-{$_POST['hphone2']}-{$_POST['hphone3']}";

$query = "select sum(price*count) from shop_temp where session_id='{$session_id}'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_array($result);

$total = $data[0];

$query = "insert into shop_list(order_id, name, address1, address2, phone,
          hphone, email, password, zip, memo, total, regdate)
          values('{$order_id}','{$_POST['name']}', '{$_POST['address1']}', '{$_POST['address2']}',
          '{$phone}','{$hphone}','{$_POST['email']}','{$_POST['password']}','{$_POST['zip']}',
          '{$_POST['memo']}','{$total}','{$regdate}') ";
mysqli_query($conn,$query);

$body2 = "<table width=600 border=1>";

$query = "select * from shop_temp where session_id='{$session_id}' ";
$result = mysqli_query($conn,$query);



while($data = mysqli_fetch_array($result)) {

  $q = "insert into shop_order(order_id, name, parent, count, price, money, regdate)
        values('{$order_id}','{$data['name']}','{$data['parent']}','{$data['count']}',
        '{$data['price']}','{$data['money']}','{$data['regdate']}')";
  
  $body2 .= "
  <tr>
    <td>{$data['name']}</td>
    <td>{$data['price']}</td>
    <td>{$data['count']}</td>
    <td>{$data['money']}</td> 
  </tr>
  ";
  mysqli_query($conn,$q);
}

$body = "{$_POST['name']}님의 구매내역입니다";
$body .= "<table width=600 border=1>
<tr><td>이름</td><td>{$_POST['name']}</td></tr>
<tr><td>연락처</td><td>{$phone},{$hphone}</td></tr>
<tr><td>수령지주소</td><td>{$_POST['address1']},{$_POST['address2']}</td></tr>
<tr><td>요구사항</td><td>{$_POST['memo']}</td></tr></table>
";

$body .= $body2;

$header = "From: 생선가게 <singsinghae@gmail.com>\n";
$header .= "Content-Type: text/html\n";

mail($_POST['email'],"{$_POST['name']}님 제품 구매를 감사드립니다.",$body,);

$query = "delete from shop_temp where session_id='{$session_id}'" ;
$result = mysqli_query($conn,$query);

?>

<script>
  location.href = "order_completed.php";
</script>