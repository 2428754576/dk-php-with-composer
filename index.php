<?php
require __DIR__.'/vendor/autoload.php';

$key = 'some-secret-for-hmac';
$alg = 'HS256';

$token = new \Gamegos\JWT\Token();
$token->setClaim('sub', 'someone@example.com'); // alternatively you can use $token->setSubject('someone@example.com') method
$token->setClaim('exp', time() + 60*5);

$encoder = new \Gamegos\JWT\Encoder();
$encoder->encode($token, $key, $alg);
echo $token->getJWT();
