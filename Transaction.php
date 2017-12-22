<?php

/**
 *
 */
class Transaction
{

  static function newTransaction($from, $to, $money, $private_key_pem)
  {
    //data you want to sign
    sleep(1);
    $id = uniqid();
    $d = compact("id", "from", "to", "money");
    $data = json_encode($d);

    //create signature
    openssl_sign($data, $signature, $private_key_pem, OPENSSL_ALGO_SHA256);
    return compoact('data', 'signature');
  }
  static function verify($data, $signature, $public_key_pem) {
    //verify signature
    $r = openssl_verify($data, $signature, $public_key_pem, "sha256WithRSAEncryption");
    var_dump($r);
  }

}
