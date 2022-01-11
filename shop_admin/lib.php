<?php
  $id = "root";
  $pw = "111111";

  function auth() {
    header("WWW-authenticate:basic realm=\"관리자모드\"");
    header("HTTP/1.0 401 unauthorized");
    echo "
      <script>
        alert('관리자만 접근가능');
        history.back(1);
      </script>
    ";
    exit;
  }

  if(!$_SERVER['PHP_AUTH_USER'] or !$_SERVER['PHP_AUTH_PW']) {
    auth();
    
  } else {
    if ($id != $_SERVER['PHP_AUTH_USER'] or $pw != $_SERVER['PHP_AUTH_PW']) {
      auth();
    } else {
      # code...
    }
    
  }
?>