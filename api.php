<?php

class VKAPI {

  private $token;
  private $token2;

  public function __construct($token, $token2) {
    $this->token = $token; $this->token2 = $token2;
  }

  public function query($method, $params, $tokentype) {
    if($tokentype == 0) { $seltoken = $this->token; }
    else { $seltoken = $this->token2; }
    $params["access_token"] = $seltoken;
    $params = http_build_query($params);
    $url = "https://api.vk.com/method/{$method}?{$params}";
    return file_get_contents($url);
  }

}
