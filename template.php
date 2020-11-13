<?php
define("TOKEN", "");
define("CONF", "");
define("OK", "ok");
define("ERR", "error");

if($data = json_decode(file_get_contents("php://input"), true) and $data["secret"] == "ad2ha92dha29d8ah2d9a2028njsv") {
switch($data["type"]) {

  case "confirmation":
    die(CONF);
    break;

  default:
    die(OK);
    break;

  case "message_new":
    $obj = $data["object"]["message"];

    die(OK);
    break;

}
} else die(ERR);

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
