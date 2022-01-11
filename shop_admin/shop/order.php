<?php
session_start();
$session_id = session_id();

include "lib.php";

$conn = mysqli_connect('localhost', 'root', '111111', 'php_shoppingmall');

?>

<head>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
  function chk_form() {
    var f = document.order_info;
  
    if(!f.password.value) {
      alert('비밀번호를 입력해주세요');
      f.password.focus();
      return false;
    }

    if(!f.name.value) {
      alert('이름을 입력해주세요');
      return false;
      
    }
    
    return true;
  }
</script>
<li>주문정보 입력</li>

<form action="order_post.php" method="post" name="order_info" onsubmit="return chk_form();">
  <table width="100%" border="1">
    <tr>
      <td>비밀번호</td>
      <td><input type="password" name="password" size="10"></td>
    </tr>
    <tr>
      <td>이름</td>
      <td><input type="text" name="name" size="10"></td>
    </tr>
    <tr>
      <td>이메일</td>
      <td><input type="text" name="email" size="20"></td>
    </tr>
    <tr>
      <td>전화번호</td>
      <td><input type="text" name="phone1" size="3">-
      <input type="text" name="phone2" size="4">-
      <input type="text" name="phone3" size="4"></td>
    </tr>
    <tr>
      <td>휴대폰번호</td>
      <td><input type="text" name="hphone1" size="3">-
      <input type="text" name="hphone2" size="4">-
      <input type="text" name="hphone3" size="4"></td>
    </tr>
    <tr>
      <td>우편번호</td>
      <td><input type="text" name="zip" size="5">
      <button type="button" style="width:60px; height:32px;" onclick="openZipSearch()">검색</button><br>
      </td>
    </tr>
    <tr>
      <td>주소</td>
      <td><input type="text" name="address1" size="50"></td>
    </tr>
    <tr>
      <td>상세주소</td>
      <td><input type="text" name="address2" size="50"></td>
    </tr>
    <tr>
      <td>요구사항</td>
      <td><textarea name="memo" cols="50" rows="3"></textarea></td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="주문하기">
      </td>
    </tr>
  </table>
</form>

<script>

function openZipSearch() {
	new daum.Postcode({
		oncomplete: function(data) {
			$('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
			$('[name=address1]').val(data.address);
			$('[name=address2]').val(data.buildingName);
		}
	}).open();
}

</script>