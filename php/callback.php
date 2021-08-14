<?php

  $OAUTH2_CLIENT_ID = '';
  $OAUTH2_CLIENT_SECRET = '';
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
      <pre>
        <?php

          if (strlen($OAUTH2_CLIENT_ID) > 0 && strlen($OAUTH2_CLIENT_SECRET) > 0) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://auth.gbsw.hs.kr/api/ident');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
              '{"client_id":"' . $OAUTH2_CLIENT_ID
                . '","client_secret":"' .  $OAUTH2_CLIENT_SECRET
                . '","redirect_uri":"' . $OAUTH2_REDIRECT_URI
                . '","grant_type":"authorization_code",'
                . '"code":"' . $_GET['code'] . '"}');

            $data = curl_exec($ch);

            curl_close($ch);

            echo $data;
          } else echo "OAUTH2_CLIENT_* 설정이 진행되지 않았습니다. callback.php에서 설정하십시오.";

        ?>
      </pre>
      <a href="/">돌아가기</a>
    </article>
  </body>
</html>