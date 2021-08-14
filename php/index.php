<?php

  $OAUTH2_CLIENT_ID = '';
  $OAUTH2_REDIRECT_URI = 'http://localhost:8080/callback.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OAuth2-examples</title>
  </head>
  <body>
    <h1>OAuth2-examples</h1>
    <p>경북소프트웨어고 통합 로그인 시스템의 예제입니다.</p>
    
    <article>
      <?php
        if (strlen($OAUTH2_CLIENT_ID) > 0) { ?>
          <a href="<?php echo 'https://auth.gbsw.hs.kr/auth?client_id=' . $OAUTH2_CLIENT_ID . '&redirect_uri=' . $OAUTH2_REDIRECT_URI . '&response_type=code' ?>">로그인</a>
        <?php } else { ?>
          <p>OAUTH2_CLIENT_ID 설정이 진행되지 않았습니다. index.php에서 설정하십시오.</p>
        <?php }
      ?>
    </article>
  </body>
</html>